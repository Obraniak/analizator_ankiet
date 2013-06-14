<?php
require_once ('data_entity.php');
/**
 *
 */
class Form_model extends  CI_Model {

	function __construct() {
		parent::__construct();
		$this -> load -> database();
	}

	public function getTestForms($id) {

		$res = array();

		$sql = "SELECT a.ID_Ankieta,s.Nazwa as Status ,a.Nazwa,k.Nazwa as Kurs,t.Koniec FROM ankieta a
				JOIN `status` s ON a.StatusID_Status = s.ID_Status
				JOIN `kurs` k ON a.KursID_Kurs = k.ID_Kurs
				JOIN `termin` t ON a.ID_Ankieta = t.AnkietaID_Ankieta
				JOIN `grupaankietowa_termin` tg ON tg.TerminID_Termin = t.ID_Termin
				JOIN `student_grupaankietowa` sga ON sga.GrupaAnkietowaID_GrupaAnkietowa = tg.GrupaAnkietowaID_GrupaAnkietowa
				JOIN `zapisy` z ON z.StudentID_Student = sga.StudentID_Student AND z.KursID_Kurs = a.KursID_Kurs
				WHERE sga.StudentID_Student = ? ";

		$query = $this -> db -> query($sql, array($id));

		foreach ($query -> result_array() as $row) {

			$tmp = new FormData();
			$tmp -> course = $row['Kurs'];
			$tmp -> name = $row['Nazwa'];
			$tmp -> date = $row['Koniec'];
			$tmp -> status = $row['Status'];
			$tmp -> id = $row['ID_Ankieta'];

			array_push($res, $tmp);
		}

		return $res;
	}

	public function getTestForm($id) {

		$sql = "SELECT a.ID_Ankieta,s.Nazwa as Status ,a.Temat,a.Nazwa,a.Uwagi,k.Nazwa as Kurs,t.Koniec FROM ankieta a
				JOIN `status` s ON a.StatusID_Status = s.ID_Status
				JOIN `kurs` k ON a.KursID_Kurs = k.ID_Kurs
				JOIN `termin` t ON a.ID_Ankieta = t.AnkietaID_Ankieta
				WHERE a.ID_Ankieta = ? ";

		$query = $this -> db -> query($sql, array($id));

		foreach ($query -> result_array() as $row) {

			$tmp = new FormData();
			$tmp -> course = $row['Kurs'];
			$tmp -> name = $row['Nazwa'];
			$tmp -> date = $row['Koniec'];
			$tmp -> status = $row['Status'];
			$tmp -> id = $row['ID_Ankieta'];
			$tmp -> title = $row['Temat'];
			$tmp -> description = $row['Uwagi'];

			return $tmp;
		}

		return null;
	}

	public function getTestFormSummary($id_form) {

		$tmp = new FormSummary();

		$tmp -> answer_close = 0;
		$tmp -> answer_open = 0;
		$tmp -> open_count = 0;
		$tmp -> close_count = 0;

		foreach ($this -> getTestFormQustions($id_form) as $item) {

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

	public function getTestFormQustions($id_form) {

		$res = array();

		$tmp = new FormQuestionData();
		$tmp -> type = -1;

		array_push($res, $tmp);

		$sql = "SELECT  p.ID_Pytanie,a.Nazwa,p.Tekst,COUNT(z.ID_Zamkniete) as type
				FROM ankieta a
				JOIN `szablonankiety` sz ON a.SzablonAnkietyID_SzablonAnkiety = sz.ID_SzablonAnkiety
				JOIN `pytanie` p ON sz.ID_SzablonAnkiety = p.SzablonAnkietyID_SzablonAnkiety
				LEFT JOIN `zamkniete` z ON z.PytanieID_Pytanie = p.ID_Pytanie
				WHERE a.ID_Ankieta = ?
				GROUP BY p.ID_Pytanie,a.Nazwa,p.Tekst";

		$query = $this -> db -> query($sql, array($id_form));

		foreach ($query -> result_array() as $row) {

			$tmp = new FormQuestionData();
			$tmp -> name = $row['Nazwa'];
			$tmp -> question = $row['Tekst'];
			$tmp -> id = $row['ID_Pytanie'];

			if ($row['type'] > 0) {
				$tmp -> type = 1;
			} else {
				$tmp -> type = 0;
			}

			array_push($res, $tmp);
		}

		return $res;
	}

	public function getTestFormQuestion($id_form, $id) {

		$sql = "SELECT  p.ID_Pytanie,a.Nazwa,p.Tekst,COUNT(z.ID_Zamkniete) as type
				FROM ankieta a
				JOIN `szablonankiety` sz ON a.SzablonAnkietyID_SzablonAnkiety = sz.ID_SzablonAnkiety
				JOIN `pytanie` p ON sz.ID_SzablonAnkiety = p.SzablonAnkietyID_SzablonAnkiety
				LEFT JOIN `zamkniete` z ON z.PytanieID_Pytanie = p.ID_Pytanie
				WHERE a.ID_Ankieta = ? AND p.ID_Pytanie = ?
				GROUP BY p.ID_Pytanie,a.Nazwa,p.Tekst";

		$query = $this -> db -> query($sql, array($id_form, $id));

		foreach ($query -> result_array() as $row) {

			$tmp = new FormQuestionData();
			$tmp -> name = $row['Nazwa'];
			$tmp -> question = $row['Tekst'];
			$tmp -> id = $row['ID_Pytanie'];

			if ($row['type'] > 0) {
				$tmp -> type = 1;
			} else {
				$tmp -> type = 0;
			}

			return $tmp;
		}

		return null;
	}

	public function getTestFormQuestionOpenDetails($id_form, $id) {

		$tmp = new FormQuestionDetailsData();
		$tmp -> id = $id;

		$sql = "SELECT  p.ID_Pytanie, p.Tekst
				FROM pytanie p
				WHERE p.ID_Pytanie = ?";

		$query = $this -> db -> query($sql, array($id));

		foreach ($query -> result_array() as $row) {
			$tmp -> text = $row['Tekst'];
		}

		return $tmp;
	}

	public function getTestFormQustionOpenDetail($id) {

		// $sql = "SELECT  p.ID_Pytanie, p.Tekst
		// FROM pytanie p
		// WHERE p.ID_Pytanie = ?";
		//
		// $query = $this -> db -> query($sql, array($id));
		//
		// foreach ($query -> result_array() as $row) {
		//
		// $tmp = new FormQuestionDetailsData();
		// $tmp -> id = $row['ID_Pytanie'];
		// $tmp -> text = $row['Tekst'];
		//
		// return $tmp;
		// }

		return null;
	}

	public function getTestFormQustionCloseDetails($id_form, $id) {

		$res = array();

		$sql = "SELECT  z.ID_Zamkniete,oo.Nazwa
				FROM zamkniete z
				JOIN `opcjaodpowiedzi` oo ON z.OpcjaOdpowiedziID_OpcjaOdpowiedzi = oo.ID_OpcjaOdpowiedzi 
				WHERE z.PytanieID_Pytanie = ?";

		$query = $this -> db -> query($sql, array($id));

		foreach ($query -> result_array() as $row) {

			$tmp = new FormQuestionDetailsData();
			$tmp -> id = $row['ID_Zamkniete'];
			$tmp -> text = $row['Nazwa'];

			array_push($res, $tmp);
		}

		return $res;
	}

	public function getTestFormQustionCloseDetail($id) {

		// $sql = "SELECT  z.ID_Zamkniete,oo.Nazwa,oo.ID_OpcjaOdpowiedzi
		// FROM zamkniete z
		// JOIN `opcjaodpowiedzi` oo ON z.ID_Zamkniete = oo.ID_OpcjaOdpowiedzi
		// WHERE z.ID_Zamkniete = ?";
		//
		// $query = $this -> db -> query($sql, array($id));
		//
		// foreach ($query -> result_array() as $row) {
		//
		// $tmp = new FormQuestionDetailsData();
		// $tmp -> id = $row['ID_Zamkniete'];
		// $tmp -> option = $row['ID_OpcjaOdpowiedzi'];
		// $tmp -> text = $row['Nazwa'];
		//
		// return $tmp;
		// }

		return null;
	}

}
?>