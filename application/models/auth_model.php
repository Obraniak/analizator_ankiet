<?php
require_once ('data_entity.php');
/**
 *
 */
class Auth_model extends  CI_Model {

	function __construct() {
		parent::__construct();
		$this -> load -> database();
	}

	public function isExist($login) {

		$sql = "SELECT ID_Student FROM student WHERE Email = ? ";

		$query = $this -> db -> query($sql, array($login));

		foreach ($query -> result_array() as $row) {
			return $row['ID_Student'];
		}

		return -2;
	}

}
?>