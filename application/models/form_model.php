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

	public function getTestFormSummary($id_form, $user_id) {

		$tmp = new FormSummary();

		$tmp -> answer_close = 0;
		$tmp -> answer_open = 0;
		$tmp -> open_count = 0;
		$tmp -> close_count = 0;

		foreach ($this -> getTestFormQustions($id_form) as $item) {

			switch($item -> type ) {
				case 0 : {
					$tmp -> open_count = $tmp -> open_count + 1;

					$data = $this -> getTestFormQuestionOpenAnswer($user_id, $id_form, $item -> id);

					if ($data -> id > 0) {
						$tmp -> answer_open = $tmp -> answer_open + 1;
					}

					break;
				}case 1 : {
					$tmp -> close_count = $tmp -> close_count + 1;
					
					$data = $this -> getTestFormQuestionCloseAnswer($user_id, $id_form, $item -> id);

					if ($data -> id > 0) {
						$tmp -> answer_close = $tmp -> answer_close + 1;
					}
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

		$sql = "SELECT   p.ID_Pytanie,a.Nazwa,p.Tekst,COUNT(z.ID_Zamkniete) as type
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

	public function getTestFormQuestionOpenAnswer($id_user, $id_form, $id_question) {

		$tmp = new FormQuestionDetailsData();
		$tmp -> id = -1;

		$sql = "SELECT o.ID_Odpowiedz,o.Tekst
				FROM odpowiedz o
				WHERE o.StudentID_Student = ? AND o.PytanieID_Pytanie = ? AND o.AnkietaID_Ankieta = ?";

		$query = $this -> db -> query($sql, array($id_user, $id_question, $id_form));

		foreach ($query -> result_array() as $row) {
			$tmp -> id = $row['ID_Odpowiedz'];
			$tmp -> text = $row['Tekst'];
		}

		return $tmp;
	}

	public function getTestFormQuestionCloseAnswer($id_user, $id_form, $id_question) {

		$tmp = new FormQuestionDetailsData();
		$tmp -> id = -1;

		$sql = "SELECT w.ID_Wybor FROM wybor w
				JOIN zamkniete z ON z.ID_Zamkniete = w.ZamknieteID_Zamkniete
				WHERE w.StudentID_Student = ? AND w.AnkietaID_Ankieta = ?  AND z.PytanieID_Pytanie = ?";

		$query = $this -> db -> query($sql, array($id_user, $id_form, $id_question));

		foreach ($query -> result_array() as $row) {
			$tmp -> id = $row['ID_Wybor'];
		}

		return $tmp;
	}

	public function getTestFormQustionCloseAnswer($id_user, $id_form, $id_question) {

		$tmp = new FormQuestionDetailsData();
		$tmp -> id = -1;

		$sql = "SELECT w.ZamknieteID_Zamkniete AS ID_Zamkniete
				FROM wybor w
				JOIN zamkniete z ON z.ID_Zamkniete = w.ZamknieteID_Zamkniete
				WHERE w.StudentID_Student = ? 
						AND z.PytanieID_Pytanie = ? 
						AND w.AnkietaID_Ankieta = ?";

		$query = $this -> db -> query($sql, array($id_user, $id_question, $id_form));

		foreach ($query -> result_array() as $row) {
			$tmp -> id = $row['ID_Zamkniete'];
		}

		return $tmp;
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

	public function updateOpenAnswerDetails($form_id, $user_id, $question_id, $text) {

		$old = $this -> getTestFormQuestionOpenAnswer($form_id, $user_id, $question_id);

		if ($old -> id > 0) {

			$sql = "UPDATE odpowiedz SET Tekst = ?  WHERE ID_Odpowiedz = ? ";
			$this -> db -> query($sql, array($text, $old -> id));

		} else {

			$sql = "INSERT INTO odpowiedz (
			Tekst,
			AnkietaID_Ankieta,
			StudentID_Student,
			PytanieID_Pytanie
			) VALUES (?,?,?,?)";
			$this -> db -> query($sql, array($text, $form_id, $user_id, $question_id));
		}

	}

	public function updateClosedAnswerDetails($form_id, $user_id, $question_id, $option) {

		$old = $this -> getTestFormQuestionCloseAnswer($form_id, $user_id, $question_id);

		if ($old -> id > 0) {

			$sql = "UPDATE wybor SET ZamknieteID_Zamkniete = ?  WHERE ID_Wybor = ? ";
			$this -> db -> query($sql, array($option, $old -> id));

		} else {

			$sql = "INSERT INTO wybor (
			AnkietaID_Ankieta,
			StudentID_Student,
			ZamknieteID_Zamkniete
			) VALUES (?,?,?)";
			$this -> db -> query($sql, array($form_id, $user_id, $option));
		}

	}

}
?>