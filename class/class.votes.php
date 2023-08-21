<?php
/**
 * TMultyPolls - polls class
 * Usage: $poll = new TMultyPolls($poll_id);
 * if $poll_id is not empty this class will work in single poll mode, else in multy poll
 */

class TMultyPolls{
	/**
	 * Poll ID
	 *
	 * @var integer
	 * @access private
	 */
	var $poll_id;
	
	/**
	 * Poll answers
	 *
	 * @var MIXED
	 * @access private
	 */
	var $poll_answers = array();
	
	/**
	 * Flag to control vote process
	 *
	 * @var boolean
	 */
	var $control_votes = 0;
	
	/**
	 * Period when between first and next vote ability
	 *
	 * @var integer
	 */
	var $user_block_time = 0;
	
	/**
	 * Constructor
	 *
	 * @param integer $poll_id
	 * @param boolean $need_control
	 * @param integer $block_time default is 86400 - 24 hrs
	 * @return TMultyPolls
	 */
	function TMultyPolls($poll_id = 0, $need_control = 1, $block_time = 86400){
		$this->poll_id = $poll_id;
		if(!empty($this->poll_id)){
			$this->poll_answers = $this->get_poll_answers();
		}
		
		$this->control_votes = $need_control;
		$this->user_block_time = $block_time;
	}
	
	/**
	 * Returns all answers for given poll
	 *
	 * @param integer $poll_id
	 * @return MIXED
	 */
	function get_poll_answers($poll_id = 0){
		if(empty($poll_id)){
			$poll_id = $this->poll_id;
		}
		
		$sql = "SELECT * FROM polls_answers WHERE polls_idpolls = {$poll_id} ORDER BY idpolls_answers ASC";
		$result = mysql_query($sql);
		$answ = array();
		if(!empty($result)){
			while($r = mysql_fetch_array($result)){
				$answ[] = $r;
			}
		}
		return $answ;
	}
	
	/**
	 * Returns poll list for given member
	 *
	 * @param integer $member_id
	 * @param integer $cat_id
	 * @param boolean $active_only
	 * @return MIXED
	 */
	function get_member_polls($member_id, $cat_id = 0, $active_only = 0){
		$sql = "SELECT p.* FROM polls p WHERE p.owner_id = {$member_id}";
		if(!empty($cat_id)){
			$sql .= " AND p.polls_categories_idpolls_categories = {$cat_id}";
		}
		if(!empty($active_only)) {
			$sql .= " AND p.is_active = 1"; 
		}
		$sql .= " ORDER BY p.date_created DESC";
		$result = mysql_query($sql);
		$res = array();
		if(!empty($result)){
			while($r = mysql_fetch_array($result)){
				$res[] = $r;
			}
		}
		return $res;
	}
	
	/**
	 * Returns poll list for all members
	 *
	 * @param integer $member_id
	 * @return MIXED
	 */
	function get_polls($catid = 0, $active_only = 0){
		$sql = "SELECT * FROM polls WHERE 1=1";
		if(!empty($catid)){
			$sql .= " AND polls_categories_idpolls_categories = {$catid}";
		}
		
		if(!empty($active_only)){
			$sql .= " AND is_active = 1";
		}
		$sql .= " ORDER BY date_created DESC";
		$result = mysql_query($sql);
		$res = array();
		if(!empty($result)){
			while($r = mysql_fetch_array($result)){
				$res[] = $r;
			}
		}
		return $res;
	}
	
	/**
	 * Changes poll default mode
	 *
	 * @param integer $member_id
	 * @param integer $poll_id
	 * @return boolean
	 */
	function toggle_poll_default_mode($member_id, $poll_id = 0){
		if(empty($poll_id)){
			$poll_id = $this->poll_id;
		}
		$default_poll_id = $this->user_has_default_poll($member_id);
		if(!empty($default_poll_id) && $default_poll_id != $poll_id){
			/*mark all default poll as non default*/
			$this->toggle_poll_default_mode($member_id, $default_poll_id);
		}
		$sql = "UPDATE polls SET is_default = 1 - is_default WHERE owner_id = {$member_id} AND idpolls = {$poll_id}";
		//echo $sql;
		$result = mysql_query($sql);
		return mysql_affected_rows();
	}
	
	/**
	 * Add/Update poll. If $poll_id is not empty updates given poll, else create new poll
	 *
	 * @param integer $member_id
	 * @param string $question
	 * @param MIXED $answers
	 * @param integer $category_id
	 * @param integer $poll_id
	 * @param integer $is_active
	 * @param integer $is_default
	 * @return boolean
	 */
	function set_poll($member_id, $question, $answers, $category_id, $poll_id = 0, $is_active = 1, $is_default = 0){
		if(!is_array($answers)){
			return false;
		}
		
		if(empty($poll_id)){
			if(!$this->user_has_polls($member_id)){
				$is_default = 1;
			} else {
				$is_default = 0;
			}
			
			$sql = "INSERT INTO polls 
									(polls_categories_idpolls_categories,
									question, 
									date_created,
									owner_id,
									is_default,
									is_active
									) 
							VALUES 
									({$category_id},
									'{$question}',
									NOW(),
									{$member_id},
									{$is_default},
									{$is_active})";
		} else {
			if(!empty($is_default)){
				$default_poll_id = $this->user_has_default_poll($member_id);
				if(!empty($default_poll_id)){
					/*mark all default poll as non default*/
					$this->toggle_poll_default_mode($member_id, $default_poll_id);
				}
			}
			$sql = "UPDATE polls SET 	question = '{$question}',
										polls_categories_idpolls_categories = {$category_id}
							WHERE owner_id = {$member_id} AND idpolls = {$poll_id}";
		}
		
		$result = mysql_query($sql);
		if(!mysql_errno()){
			if(empty($poll_id)){
				$poll_id = mysql_insert_id();
				$rem_answ_res = true;
			} else {
				$rem_answ_res = $this->remove_answers($member_id, $poll_id);
			}
			if($rem_answ_res){
				/**
				 * add answers
				 */
				$add_answ_res = $this->add_answers($answers, $poll_id);
				if(!empty($add_answ_res)){
					return true;
				} else {
					/**
					 * rem poll ?
					 */
					return false;
				}
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	
	/**
	 * Removes answers for poll
	 *
	 * @param integer $member_id
	 * @param integer $poll_id
	 * @return boolean
	 */
	function remove_answers($member_id, $poll_id = 0){
		if(empty($poll_id)){
			$poll_id = $this->poll_id;
		}
		$sql = "DELETE FROM polls_answers WHERE polls_idpolls = {$poll_id}";
		$result = mysql_query($sql);
		return (!mysql_errno())?true:false;
	}
	
	/**
	 * Removes poll by ID
	 *
	 * @param integer $member_id
	 * @param integer $poll_id
	 * @return boolean
	 */
	function remove_poll($member_id, $poll_id = 0){
		if(empty($poll_id)){
			$poll_id = $this->poll_id;
		}
		
		if($this->remove_answers($member_id, $poll_id)){
			$sql = "DELETE FROM polls WHERE idpolls = {$poll_id} AND owner_id = {$member_id}";
			$result = mysql_query($sql);
			
			/**
			 * set new default poll
			 */
			if(!$this->get_default_user_poll($member_id) && $this->user_has_polls($member_id)){
				$poll = $this->get_polls(0, 1);
				if(!empty($poll)){
					$this->toggle_poll_default_mode($member_id, $poll[0]['idpolls']);
				}
			}
			
			$sql = "DELETE FROM polls_log WHERE polls_idpolls = {$poll_id}";
			$result = mysql_query($sql);
			
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * Adds answers to the DB
	 *
	 * @param MIXED $answers
	 * @param integer $poll_id
	 */
	function add_answers($answers, $poll_id){
		$nID = 0;
		for($i = 0; $i < count($answers); $i++){
			$nID = $this->add_answer($answers[$i], $poll_id);
			if(empty($nID)){
				return false;
			}
		}
		return true;
	}
	
	/**
	 * Adds answer to the DB
	 *
	 * @access private
	 * @param string $answer_txt
	 * @param integer $poll_id
	 * @return integer
	 */
	function add_answer($answer_txt, $poll_id){
		$sql = "INSERT INTO polls_answers (
											polls_idpolls, 
											poll_answ_txt, 
											poll_answ_votes
										) VALUES (
											{$poll_id}, 
											'{$answer_txt}', 
											0)";
		$result = mysql_query($sql);
		$answID = 0;
		if(!mysql_errno()){
			$answID = mysql_insert_id();
		}
		return $answID;
	}
	
	/**
	 * Changes poll activity status
	 *
	 * @param integer $member_id
	 * @param integer $poll_id
	 * @return boolean
	 */
	function toggle_poll_activity($member_id, $poll_id = 0){
		if(empty($poll_id)){
			$poll_id = $this->poll_id;
		}
		$default_poll_id = $this->user_has_default_poll($member_id);
		if($default_poll_id == $poll_id){
			/* choose another poll */
			$user_polls = $this->get_member_polls($member_id, 0, 1);
			if(!empty($user_polls)){
				for($i = 0; $i < count($user_polls); $i++){
					if($user_polls[$i]['idpolls'] != $poll_id){
						$this->toggle_poll_default_mode($member_id, $user_polls[$i]['idpolls']);
						break;
					}
				}
			}
		}
		$sql = "UPDATE polls SET is_active = 1 - is_active WHERE owner_id = {$member_id} AND idpolls = {$poll_id}";
		$result = mysql_query($sql);
		return mysql_affected_rows();
	}
	
	/**
	 * Main vote mechanizm
	 *
	 * @param integer $member_id
	 * @param integer $answer_id
	 * @param integer $poll_id
	 * @return boolean
	 */
	function vote($member_id, $answer_id, $poll_id = 0){
		//echo 1;
		if(empty($poll_id)){
			$poll_id = $this->poll_id;
		}
		
		if($this->can_member_vote($member_id, $poll_id)){
			if($this->check_poll_and_answer($poll_id, $answer_id)){
				$sql = "UPDATE polls_answers SET poll_answ_votes = poll_answ_votes + 1 WHERE polls_idpolls = {$poll_id} AND idpolls_answers = {$answer_id}";
				$result = mysql_query($sql);
				if(!mysql_errno()){
					$this->write_vote_log($member_id, $poll_id, $answer_id);
				} else {
					return false;
				}
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	
	/**
	 * writes vote log
	 *
	 * @access private
	 * @param integer $member_id
	 * @param integer $poll_id
	 * @param integer $answer_id
	 * @return boolean
	 */
	function write_vote_log($member_id, $poll_id, $answer_id){
		$voter_ip = ip2long($_SERVER['REMOTE_ADDR']);
		$sql = "INSERT INTO polls_log (
										polls_answers_idpolls_answers, 
										polls_idpolls, 
										vote_datetime, 
										voter_id, 
										voter_ip)
								VALUES (
										{$answer_id},
										{$poll_id},
										NOW(),
										{$member_id},
										{$voter_ip})";
		$result = mysql_query($sql);
		if(!mysql_errno()){
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * checks that given poll and it's answer exist in DB
	 *
	 * @access private
	 * @param integer $poll_id
	 * @param integer $answer_id
	 * @return boolean
	 */
	function check_poll_and_answer($poll_id, $answer_id){
		$sql = "SELECT pa.* FROM polls_answers pa, polls p WHERE pa.polls_idpolls = {$poll_id} AND pa.idpolls_answers = {$answer_id} AND p.idpolls = pa.polls_idpolls AND p.is_active = 1";
		//echo $sql;
		$result = mysql_query($sql);
		if(!empty($result) && mysql_num_rows($result)){
			return true;
		}
		return false;
	}
	
	/**
	 * Returns true if user can vote, else returns false
	 *
	 * @access private
	 * @param integer $member_id
	 * @param integer $poll_id
	 * @return boolean
	 */
	function can_member_vote($member_id, $poll_id){
		if(empty($poll_id)){
			$poll_id = $this->poll_id;
		}
		
		if(empty($this->control_votes)){
			return true;
		}
		
		$sql = "SELECT pl.*, UNIX_TIMESTAMP(pl.vote_datetime) AS vote_ts, pls.owner_id FROM polls_log pl, polls pls WHERE pl.voter_id = {$member_id} AND pl.polls_idpolls = {$poll_id} AND pl.polls_idpolls = pls.idpolls AND pls.is_active = 1 ORDER BY vote_datetime DESC LIMIT 0,1";
		$result = mysql_query($sql);
		if(!empty($result) && mysql_num_rows($result)){
			$r = mysql_fetch_array($result);
			if($r['owner_id'] == $member_id){
				return false;
			}
			$vote_timestamp = $r['vote_ts'];
			$now = time();
			if(($now - $vote_timestamp) >= $this->user_block_time){
				return true;
			} else {
				return false;
			}
		} else {
			$owner_id = $this->get_poll_owner($poll_id);
			if($member_id == $owner_id){
				return false;
			}
			return true;
		}
	}
	
	/**
	 * Returns poll's owner_id
	 *
	 * @param integer $poll_id
	 * @return integer
	 */
	function get_poll_owner($poll_id){
		$sql = "SELECT owner_id FROM polls WHERE idpolls = {$poll_id}";
		$result = mysql_query($sql);
		$owner_id = 0;
		if(!empty($result)){
			$r = mysql_fetch_array($result);
			$owner_id = $r['owner_id'];
		}
		return $owner_id;
	}
	
	/**
	 * returns poll
	 *
	 * @param integer $member_id
	 * @param integer $get_default
	 * @param integer $poll_id
	 * @param boolean $use_member
	 * @return TPollStructure
	 */
	function get_poll($member_id, $poll_id = 0, $use_member = 1){
		if(empty($poll_id)){
			$poll_id = $this->poll_id;
		}
		
		$returned_poll = new TPollStructure;
		
		$sql = "SELECT COUNT(*) AS vCnt FROM polls_log WHERE polls_idpolls = {$poll_id}";
		$result = mysql_query($sql);
		$returned_poll->total_votes_cnt = 0;
		if(!empty($result)){
			$r = mysql_fetch_array($result);
			$returned_poll->total_votes_cnt = intval($r['vCnt']);
		}
		
		$sql = "SELECT * FROM polls WHERE idpolls = {$poll_id}";
		if(!empty($use_member)) {
			$sql .= " AND owner_id = {$member_id}";
		}
		$result = mysql_query($sql);
		if(!empty($result) && mysql_num_rows($result)){
			$r = mysql_fetch_array($result);
			$returned_poll->poll_id = $poll_id;
			$returned_poll->poll_state = $r['is_active'];
			$returned_poll->poll_type = $r['is_default'];
			$returned_poll->date_created = $r['date_created'];
			$returned_poll->question = $r['question'];
			$returned_poll->owner_id = $r['owner_id'];
			$returned_poll->category_id = $r['polls_categories_idpolls_categories'];
			if(!empty($returned_poll->category_id)){
				$returned_poll->category_name = $this->get_category_name($returned_poll->category_id);
			} else {
				$returned_poll->category_name = "Not in category";
			}
		} else {
			return null;
		}
		
		$returned_poll->answers = $this->get_poll_answers($poll_id);
		
		return $returned_poll;
	}
	
	/**
	 * Returns default poll for given user
	 *
	 * @param integer $member_id
	 * @return TPollStructure
	 */
	function get_default_user_poll($member_id){
		$poll_id = $this->user_has_default_poll($member_id);
		if(!empty($poll_id)){
			return $this->get_poll($member_id, $poll_id);
		} else {
			return null;
		}
	}
	
	/**
	 * Add/Update poll category
	 *
	 * @param integer $cat_id
	 * @param string $cat_name
	 * @param string $cat_desc
	 * @return boolean
	 */
	function set_category($cat_id, $cat_name, $cat_desc = ''){
		/**
		 * @todo parse cat_name and cat_desc
		 */
		if(empty($cat_id)){
			$sql = "INSERT INTO polls_categories (cat_name, cat_desc) VALUES ('{$cat_name}', '{$cat_desc}')";
		} else {
			$sql = "UPDATE polls_categories SET cat_name = '{$cat_name}', cat_desc = '{$cat_desc}' WHERE idpolls_categories = {$cat_id}";
		}
		$result = mysql_query($sql);
		if(!mysql_errno()){
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * Gets category list
	 *
	 * @return MIXED
	 */
	function get_category_list(){
		$sql = "SELECT * FROM polls_categories ORDER BY cat_name ASC";
		$result = mysql_query($sql);
		$res = array();
		if(!empty($result)){
			while($r = mysql_fetch_array($result)){
				$res[] = $r;
			}
		}
		return $res;
	}
	
	/**
	 * Returns category name by ID
	 *
	 * @param integer $cat_id
	 * @return String
	 */
	function get_category_name($cat_id){
		$sql = "SELECT cat_name FROM polls_categories WHERE idpolls_categories = {$cat_id}";
		$result = mysql_query($sql);
		$res = "";
		if(!empty($result)){
			$r = mysql_fetch_array($result);
			$res = $r['cat_name'];
		}
		return $res;
	}
	
	/**
	 * Removes category
	 *
	 * @param integer $cat_id
	 * @return boolean
	 */
	function remove_category($cat_id){
		$sql = "DELETE FROM polls_categories WHERE idpolls_categories = {$cat_id}";
		$result = mysql_query($sql);
		if(!mysql_errno()){
			$sql = "UPDATE polls SET polls_categories_idpolls_categories = NULL WHERE polls_categories_idpolls_categories = {$cat_id}";
			mysql_query($sql);
			return true;
		}
		return false;
	}
	
	/**
	 * Returns count of given user polls
	 *
	 * @param integer $owner_id
	 * @return integer
	 */
	function user_has_polls($owner_id){
		$sql = "SELECT COUNT(*) AS pCnt FROM polls WHERE owner_id = {$owner_id}";
		$result = mysql_query($sql);
		$polls_cnt = 0;
		if(!empty($result)){
			$r = mysql_fetch_array($result);
			$polls_cnt = $r['pCnt'];
		}
		return $polls_cnt;
	}
	
	/**
	 * Returns ID of given user default poll
	 *
	 * @param integer $owner_id
	 * @return integer
	 */
	function user_has_default_poll($owner_id){
		$sql = "SELECT idpolls FROM polls WHERE owner_id = {$owner_id} AND is_default = 1 AND is_active = 1";
		$result = mysql_query($sql);
		$poll_id = 0;
		if(!empty($result)){
			$r = mysql_fetch_array($result);
			$poll_id = $r['idpolls'];
		}
		return $poll_id;
	}
}

/**
 * Poll structure class
 *
 */
class TPollStructure{
	var $poll_id;
	var $answers;
	var $poll_state;
	var $poll_type;
	var $total_votes_cnt;
	var $date_created;
	var $question;
	var $category_name;
	var $category_id;
	var $owner_id;
}
?>