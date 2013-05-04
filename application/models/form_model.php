<?php
require_once ('form_data.php');
/**
 *
 */
class Form_model extends  CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function getTestForm() {

		$res = array();

		$tmp = new FormData();
		$tmp -> name = 'Formularz Test Anliza matematyczna';
		$tmp -> id = '001';

		array_push($res, $tmp);

		$tmp = new FormData();
		$tmp -> name = 'Formularz Test Jezyk Angielski';
		$tmp -> id = '002';

		array_push($res, $tmp);

		$tmp = new FormData();
		$tmp -> name = 'Formularz Test Systemy wspomagania decyzji';
		$tmp -> id = '003';

		array_push($res, $tmp);

		$tmp = new FormData();
		$tmp -> name = 'Formularz Test Logika';
		$tmp -> id = '004';

		array_push($res, $tmp);

		return $res;
	}

	public function getTestFormQustions($id) {

		$res = array();

		$tmp = new FormQuestionData();
		$tmp -> text = 'Pytanie 1';
		$tmp -> id = '001';

		array_push($res, $tmp);

		$tmp = new FormQuestionData();
		$tmp -> text = 'Pytanie 2';
		$tmp -> id = '002';

		array_push($res, $tmp);

		$tmp = new FormQuestionData();
		$tmp -> text = 'Pytanie 3';
		$tmp -> id = '003';

		array_push($res, $tmp);

		$tmp = new FormQuestionData();
		$tmp -> text = 'Pytanie 4';
		$tmp -> id = '004';

		array_push($res, $tmp);

		return $res;
	}

	public function getTestFormQustionsDetails($id) {

		$tmp = new FormQuestionData();

		switch ($id) {
			case '001' :
				$tmp -> text = 'Pytanie otwarte: Jak oceniasz warto¶æ merytoryczna przedmiotu :) ?';
				break;
			case '002' :
				$tmp -> text = 'Pytanie otwarte: Czy jestes zadowolny z kierunku :) ?';
				break;
			case '003' :
				$tmp -> text = 'Pytanie otwarte: Co bys zmieni³ w toku nauczania ?';
				break;
			default :
				$tmp -> text = 'Pytanie otwarte: Co oceniasz negatwnie ?';
				break;
		}

		return $tmp;
	}

}
?>