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
		$tmp -> course = 'Anliaza matematyczna';
		$tmp -> name = 'Ankieta 2';
		$tmp -> date = '2013-06-10';
		$tmp -> status = 'Nowa';
		$tmp -> id = '001';

		array_push($res, $tmp);

		$tmp = new FormData();
		$tmp -> course = 'Podstawy programowania';
		$tmp -> name = 'Ankieta 7';
		$tmp -> date = '2013-05-14';
		$tmp -> status = 'Zakonczona';
		$tmp -> id = '002';

		array_push($res, $tmp);

		$tmp = new FormData();
		$tmp -> course = 'Statystyka';
		$tmp -> name = 'Ankieta 3';
		$tmp -> date = '2013-06-01';
		$tmp -> status = 'Rozpoczeta';
		$tmp -> id = '003';

		array_push($res, $tmp);

		$tmp = new FormData();
		$tmp -> course = 'Grafika komputerowa';
		$tmp -> name = 'Ankieta 10';
		$tmp -> date = '2013-06-18';
		$tmp -> status = 'Nowa';
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