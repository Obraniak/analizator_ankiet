<?php
require_once ('data_entity.php');
/**
 *
 */
class Form_model extends  CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function getTestForms() {

		$res = array();

		$tmp = new FormData();
		$tmp -> course = 'Anliaza matematyczna';
		$tmp -> name = 'Ankieta 2';
		$tmp -> date = '2013-06-10';
		$tmp -> status = 0;
		$tmp -> id = '001';
		$tmp -> title = 'Ocena jakosci ksztalcenia';
		$tmp -> description = 'Bardzo wazny opis przeczytaj przed przystapieniem do wypelniana ankiety';

		array_push($res, $tmp);

		$tmp = new FormData();
		$tmp -> course = 'Podstawy programowania';
		$tmp -> name = 'Ankieta 7';
		$tmp -> date = '2013-05-14';
		$tmp -> status = 2;
		$tmp -> id = '002';
		$tmp -> title = 'Ocena jakosci ksztalcenia';
		$tmp -> description = 'Bardzo wazny opis przeczytaj przed przystapieniem do wypelniana ankiety';

		array_push($res, $tmp);

		$tmp = new FormData();
		$tmp -> course = 'Statystyka';
		$tmp -> name = 'Ankieta 3';
		$tmp -> date = '2013-06-01';
		$tmp -> status = 1;
		$tmp -> id = '003';
		$tmp -> title = 'Ocena jakosci ksztalcenia';
		$tmp -> description = 'Bardzo wazny opis przeczytaj przed przystapieniem do wypelniana ankiety';

		array_push($res, $tmp);

		$tmp = new FormData();
		$tmp -> course = 'Grafika komputerowa';
		$tmp -> name = 'Ankieta 10';
		$tmp -> date = '2013-06-18';
		$tmp -> status = 0;
		$tmp -> id = '004';
		$tmp -> title = 'Ocena jakosci ksztalcenia';
		$tmp -> description = 'Bardzo wazny opis przeczytaj przed przystapieniem do wypelniana ankiety';

		array_push($res, $tmp);

		return $res;
	}

	public function getTestForm($id) {

		foreach ($this -> getTestForms() as $item) {

			if ($item -> id == $id) {
				return $item;
			}
		}

		return $null;
	}

	public function getTestFormSummary() {

		$tmp = new FormSummary();

		$tmp -> answer_close = 0;
		$tmp -> answer_open = 0;
		$tmp -> open_count = 0;
		$tmp -> close_count = 0;

		foreach ($this -> getTestFormQustions() as $item) {

			switch($item -> type ) {
				case 0 : {
					$tmp -> open_count = $tmp -> open_count + 1;
					break;
				}case 1 : {
					$tmp -> close_count = $tmp -> close_count + 1;
					break;
				}
			}
		}

		return $tmp;

	}

	public function getTestFormQustions() {

		$res = array();

		$tmp = new FormQuestionData();
		$tmp -> type = -1;

		array_push($res, $tmp);

		$tmp = new FormQuestionData();
		$tmp -> name = 'Ankieta 1';
		$tmp -> question = 'Co sadzisz na temat przedmiotu ?';
		$tmp -> id = '001';
		$tmp -> type = 1;

		array_push($res, $tmp);

		$tmp = new FormQuestionData();
		$tmp -> name = 'Ankieta 2';
		$tmp -> question = 'Co sadzisz na temat prowadzacego ?';
		$tmp -> id = '002';
		$tmp -> type = 1;

		array_push($res, $tmp);

		$tmp = new FormQuestionData();
		$tmp -> name = 'Ankieta 3';
		$tmp -> question = 'Co sadzisz na temat zadań ?';
		$tmp -> id = '003';
		$tmp -> type = 0;

		array_push($res, $tmp);

		$tmp = new FormQuestionData();
		$tmp -> name = 'Ankieta 4';
		$tmp -> question = 'Co sadzisz na temat kolokwium ?';
		$tmp -> id = '004';
		$tmp -> type = 0;

		array_push($res, $tmp);

		return $res;
	}

	public function getTestFormQuestion($id) {

		foreach ($this -> getTestFormQustions() as $item) {

			if ($item -> id == $id) {
				return $item;
			}
		}

		return $null;
	}

	public function getTestFormQuestionOpenDetails() {

		$res = array();

		$tmp = new FormQuestionDetailsData();
		$tmp -> id = "001";
		$tmp -> text = "";

		array_push($res, $tmp);

		$tmp = new FormQuestionDetailsData();
		$tmp -> id = "002";
		$tmp -> text = "";

		array_push($res, $tmp);

		$tmp = new FormQuestionDetailsData();
		$tmp -> id = "003";
		$tmp -> text = "";

		array_push($res, $tmp);

		$tmp = new FormQuestionDetailsData();
		$tmp -> id = "004";
		$tmp -> text = "";

		array_push($res, $tmp);

		return $res;
	}

	public function getTestFormQustionOpenDetail($id) {

		foreach ($this -> getTestFormQuestionOpenDetails() as $item) {

			if ($item -> id == $id) {
				return $item;
			}
		}

		return $null;
	}

	public function getTestFormQustionCloseDetails() {

		$res = array();

		$tmp = array();

		$tmpd = new FormQuestionDetailsData();
		$tmpd -> id = "001";
		$tmpd -> option = "1";
		$tmpd -> text = "Odpowiedz 1";

		array_push($tmp, $tmpd);

		$tmpd = new FormQuestionDetailsData();
		$tmpd -> id = "002";
		$tmpd -> option = "2";
		$tmpd -> text = "Odpowiedz 2";

		array_push($tmp, $tmpd);

		$tmpd = new FormQuestionDetailsData();
		$tmpd -> id = "003";
		$tmpd -> option = "3";
		$tmpd -> text = "Odpowiedz 3";

		array_push($tmp, $tmpd);

		$tmpd = new FormQuestionDetailsData();
		$tmpd -> id = "004";
		$tmpd -> option = "3";
		$tmpd -> text = "Odpowiedz 4";

		array_push($tmp, $tmpd);

		$res['001'] = $tmp;
		$res['003'] = $tmp;
		$res['004'] = $tmp;

		return $res;
	}

	public function getTestFormQustionCloseDetail($id) {

		$res = $this -> getTestFormQustionCloseDetails();

		return $res[$id];
	}

}
?>