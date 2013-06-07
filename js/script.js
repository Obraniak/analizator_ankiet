/**
 * @author Marcin
 */

function begin() {
	document.forms["navi"]["item"].value = "begin";
	return true;
}

function end() {
	document.forms["navi"]["item"].value = "end";
	return true;
}

function next() {
	document.forms["navi"]["item"].value = new Number(document.forms["navi"]["item"].value) + 1;
	return true;
}

function before() {
	document.forms["navi"]["item"].value = new Number(document.forms["navi"]["item"].value) - 1;
	return true;
}