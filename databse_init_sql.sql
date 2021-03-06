-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Wersja serwera:               5.5.24-log - MySQL Community Server (GPL)
-- Serwer OS:                    Win64
-- HeidiSQL Wersja:              8.0.0.4413
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Zrzut struktury bazy danych psi_ankietyzacja
DROP DATABASE IF EXISTS `psi_ankietyzacja`;
CREATE DATABASE IF NOT EXISTS `psi_ankietyzacja` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `psi_ankietyzacja`;


-- Zrzut struktury tabela psi_ankietyzacja.ankieta
DROP TABLE IF EXISTS `ankieta`;
CREATE TABLE IF NOT EXISTS `ankieta` (
  `ID_Ankieta` int(10) NOT NULL AUTO_INCREMENT,
  `StatusID_Status` int(10) NOT NULL,
  `Temat` varchar(255) NOT NULL,
  `Nazwa` varchar(255) NOT NULL,
  `Uwagi` varchar(1000) NOT NULL,
  `SzablonAnkietyID_SzablonAnkiety` int(10) NOT NULL,
  `KursID_Kurs` int(10) NOT NULL,
  PRIMARY KEY (`ID_Ankieta`),
  KEY `FKAnkieta695978` (`SzablonAnkietyID_SzablonAnkiety`),
  KEY `FKAnkieta973992` (`StatusID_Status`),
  KEY `FKAnkieta791412` (`KursID_Kurs`),
  CONSTRAINT `FKAnkieta791412` FOREIGN KEY (`KursID_Kurs`) REFERENCES `kurs` (`ID_Kurs`),
  CONSTRAINT `FKAnkieta695978` FOREIGN KEY (`SzablonAnkietyID_SzablonAnkiety`) REFERENCES `szablonankiety` (`ID_SzablonAnkiety`),
  CONSTRAINT `FKAnkieta973992` FOREIGN KEY (`StatusID_Status`) REFERENCES `status` (`ID_Status`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Dumping data for table psi_ankietyzacja.ankieta: ~4 rows (około)
DELETE FROM `ankieta`;
/*!40000 ALTER TABLE `ankieta` DISABLE KEYS */;
INSERT INTO `ankieta` (`ID_Ankieta`, `StatusID_Status`, `Temat`, `Nazwa`, `Uwagi`, `SzablonAnkietyID_SzablonAnkiety`, `KursID_Kurs`) VALUES
	(1, 1, 'Ocena jakosci ksztalcenia', 'Ankieta 2', 'Bardzo wazny opis przeczytaj przed przystapieniem do wypelniana ankiety', 1, 1),
	(5, 2, 'Ocena jakosci ksztalcenia', 'Ankieta 7', 'Bardzo wazny opis przeczytaj przed przystapieniem do wypelniana ankiety', 1, 2),
	(7, 3, 'Ocena jakosci ksztalcenia', 'Ankieta 3', 'Bardzo wazny opis przeczytaj przed przystapieniem do wypelniana ankiety', 1, 4),
	(11, 1, 'Ocena jakosci ksztalcenia', 'Ankieta 10', 'Bardzo wazny opis przeczytaj przed przystapieniem do wypelniana ankiety', 1, 3);
/*!40000 ALTER TABLE `ankieta` ENABLE KEYS */;


-- Zrzut struktury tabela psi_ankietyzacja.grupaankietowa
DROP TABLE IF EXISTS `grupaankietowa`;
CREATE TABLE IF NOT EXISTS `grupaankietowa` (
  `ID_GrupaAnkietowa` int(10) NOT NULL AUTO_INCREMENT,
  `Nazwa` varchar(200) NOT NULL,
  PRIMARY KEY (`ID_GrupaAnkietowa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table psi_ankietyzacja.grupaankietowa: ~1 rows (około)
DELETE FROM `grupaankietowa`;
/*!40000 ALTER TABLE `grupaankietowa` DISABLE KEYS */;
INSERT INTO `grupaankietowa` (`ID_GrupaAnkietowa`, `Nazwa`) VALUES
	(1, 'Ankiety semestralne');
/*!40000 ALTER TABLE `grupaankietowa` ENABLE KEYS */;


-- Zrzut struktury tabela psi_ankietyzacja.grupaankietowa_termin
DROP TABLE IF EXISTS `grupaankietowa_termin`;
CREATE TABLE IF NOT EXISTS `grupaankietowa_termin` (
  `GrupaAnkietowaID_GrupaAnkietowa` int(10) NOT NULL,
  `TerminID_Termin` int(10) NOT NULL,
  PRIMARY KEY (`GrupaAnkietowaID_GrupaAnkietowa`,`TerminID_Termin`),
  KEY `FKGrupaAnkie437672` (`GrupaAnkietowaID_GrupaAnkietowa`),
  KEY `FKGrupaAnkie769455` (`TerminID_Termin`),
  CONSTRAINT `FKGrupaAnkie769455` FOREIGN KEY (`TerminID_Termin`) REFERENCES `termin` (`ID_Termin`),
  CONSTRAINT `FKGrupaAnkie437672` FOREIGN KEY (`GrupaAnkietowaID_GrupaAnkietowa`) REFERENCES `grupaankietowa` (`ID_GrupaAnkietowa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table psi_ankietyzacja.grupaankietowa_termin: ~4 rows (około)
DELETE FROM `grupaankietowa_termin`;
/*!40000 ALTER TABLE `grupaankietowa_termin` DISABLE KEYS */;
INSERT INTO `grupaankietowa_termin` (`GrupaAnkietowaID_GrupaAnkietowa`, `TerminID_Termin`) VALUES
	(1, 7),
	(1, 8),
	(1, 9),
	(1, 10);
/*!40000 ALTER TABLE `grupaankietowa_termin` ENABLE KEYS */;


-- Zrzut struktury tabela psi_ankietyzacja.kurs
DROP TABLE IF EXISTS `kurs`;
CREATE TABLE IF NOT EXISTS `kurs` (
  `ID_Kurs` int(10) NOT NULL AUTO_INCREMENT,
  `Nazwa` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_Kurs`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table psi_ankietyzacja.kurs: ~4 rows (około)
DELETE FROM `kurs`;
/*!40000 ALTER TABLE `kurs` DISABLE KEYS */;
INSERT INTO `kurs` (`ID_Kurs`, `Nazwa`) VALUES
	(1, 'Anliaza matematyczna'),
	(2, 'Podstawy programowania'),
	(3, 'Statystyka'),
	(4, 'Grafika komputerowa');
/*!40000 ALTER TABLE `kurs` ENABLE KEYS */;


-- Zrzut struktury tabela psi_ankietyzacja.odpowiedz
DROP TABLE IF EXISTS `odpowiedz`;
CREATE TABLE IF NOT EXISTS `odpowiedz` (
  `ID_Odpowiedz` int(10) NOT NULL AUTO_INCREMENT,
  `Tekst` varchar(100) NOT NULL,
  `AnkietaID_Ankieta` int(10) NOT NULL,
  `StudentID_Student` int(10) DEFAULT NULL,
  `PytanieID_Pytanie` int(10) NOT NULL,
  PRIMARY KEY (`ID_Odpowiedz`),
  KEY `FKOdpowiedz482032` (`AnkietaID_Ankieta`),
  KEY `FKOdpowiedz198353` (`StudentID_Student`),
  KEY `FKOdpowiedz512676` (`PytanieID_Pytanie`),
  CONSTRAINT `FKOdpowiedz512676` FOREIGN KEY (`PytanieID_Pytanie`) REFERENCES `pytanie` (`ID_Pytanie`),
  CONSTRAINT `FKOdpowiedz198353` FOREIGN KEY (`StudentID_Student`) REFERENCES `student` (`ID_Student`),
  CONSTRAINT `FKOdpowiedz482032` FOREIGN KEY (`AnkietaID_Ankieta`) REFERENCES `ankieta` (`ID_Ankieta`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table psi_ankietyzacja.odpowiedz: ~2 rows (około)
DELETE FROM `odpowiedz`;
/*!40000 ALTER TABLE `odpowiedz` DISABLE KEYS */;
INSERT INTO `odpowiedz` (`ID_Odpowiedz`, `Tekst`, `AnkietaID_Ankieta`, `StudentID_Student`, `PytanieID_Pytanie`) VALUES
	(2, 'bcbcb', 1, 1, 3),
	(3, 'dfhdfhdfh', 1, 1, 6);
/*!40000 ALTER TABLE `odpowiedz` ENABLE KEYS */;


-- Zrzut struktury tabela psi_ankietyzacja.opcjaodpowiedzi
DROP TABLE IF EXISTS `opcjaodpowiedzi`;
CREATE TABLE IF NOT EXISTS `opcjaodpowiedzi` (
  `ID_OpcjaOdpowiedzi` int(10) NOT NULL AUTO_INCREMENT,
  `Nazwa` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_OpcjaOdpowiedzi`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table psi_ankietyzacja.opcjaodpowiedzi: ~4 rows (około)
DELETE FROM `opcjaodpowiedzi`;
/*!40000 ALTER TABLE `opcjaodpowiedzi` DISABLE KEYS */;
INSERT INTO `opcjaodpowiedzi` (`ID_OpcjaOdpowiedzi`, `Nazwa`) VALUES
	(3, 'Łatwy'),
	(4, 'Przecietny'),
	(5, 'Trudny'),
	(6, 'Nie mam zdania');
/*!40000 ALTER TABLE `opcjaodpowiedzi` ENABLE KEYS */;


-- Zrzut struktury tabela psi_ankietyzacja.pytanie
DROP TABLE IF EXISTS `pytanie`;
CREATE TABLE IF NOT EXISTS `pytanie` (
  `ID_Pytanie` int(10) NOT NULL AUTO_INCREMENT,
  `Tekst` varchar(500) NOT NULL,
  `SzablonAnkietyID_SzablonAnkiety` int(10) NOT NULL,
  PRIMARY KEY (`ID_Pytanie`),
  KEY `FKPytanie352390` (`SzablonAnkietyID_SzablonAnkiety`),
  CONSTRAINT `FKPytanie352390` FOREIGN KEY (`SzablonAnkietyID_SzablonAnkiety`) REFERENCES `szablonankiety` (`ID_SzablonAnkiety`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table psi_ankietyzacja.pytanie: ~4 rows (około)
DELETE FROM `pytanie`;
/*!40000 ALTER TABLE `pytanie` DISABLE KEYS */;
INSERT INTO `pytanie` (`ID_Pytanie`, `Tekst`, `SzablonAnkietyID_SzablonAnkiety`) VALUES
	(2, 'Co sadzisz na temat przedmiotu ?', 1),
	(3, 'Co sadzisz na temat prowadzacego ?', 1),
	(4, 'Co sadzisz na temat zadań ?', 1),
	(6, 'Co sadzisz na temat kolokwium ?', 1);
/*!40000 ALTER TABLE `pytanie` ENABLE KEYS */;


-- Zrzut struktury tabela psi_ankietyzacja.status
DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `ID_Status` int(10) NOT NULL AUTO_INCREMENT,
  `Nazwa` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_Status`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table psi_ankietyzacja.status: ~3 rows (około)
DELETE FROM `status`;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` (`ID_Status`, `Nazwa`) VALUES
	(1, 'N'),
	(2, 'Z'),
	(3, 'R');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;


-- Zrzut struktury tabela psi_ankietyzacja.student
DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `ID_Student` int(10) NOT NULL AUTO_INCREMENT,
  `Email` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_Student`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table psi_ankietyzacja.student: ~1 rows (około)
DELETE FROM `student`;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` (`ID_Student`, `Email`) VALUES
	(1, '174288@student.pwr.wroc.pl');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;


-- Zrzut struktury tabela psi_ankietyzacja.student_grupaankietowa
DROP TABLE IF EXISTS `student_grupaankietowa`;
CREATE TABLE IF NOT EXISTS `student_grupaankietowa` (
  `StudentID_Student` int(10) NOT NULL,
  `GrupaAnkietowaID_GrupaAnkietowa` int(10) NOT NULL,
  PRIMARY KEY (`StudentID_Student`,`GrupaAnkietowaID_GrupaAnkietowa`),
  KEY `FKStudent_Gr118634` (`StudentID_Student`),
  KEY `FKStudent_Gr336940` (`GrupaAnkietowaID_GrupaAnkietowa`),
  CONSTRAINT `FKStudent_Gr336940` FOREIGN KEY (`GrupaAnkietowaID_GrupaAnkietowa`) REFERENCES `grupaankietowa` (`ID_GrupaAnkietowa`),
  CONSTRAINT `FKStudent_Gr118634` FOREIGN KEY (`StudentID_Student`) REFERENCES `student` (`ID_Student`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table psi_ankietyzacja.student_grupaankietowa: ~1 rows (około)
DELETE FROM `student_grupaankietowa`;
/*!40000 ALTER TABLE `student_grupaankietowa` DISABLE KEYS */;
INSERT INTO `student_grupaankietowa` (`StudentID_Student`, `GrupaAnkietowaID_GrupaAnkietowa`) VALUES
	(1, 1);
/*!40000 ALTER TABLE `student_grupaankietowa` ENABLE KEYS */;


-- Zrzut struktury tabela psi_ankietyzacja.szablonankiety
DROP TABLE IF EXISTS `szablonankiety`;
CREATE TABLE IF NOT EXISTS `szablonankiety` (
  `ID_SzablonAnkiety` int(10) NOT NULL AUTO_INCREMENT,
  `Naglowek` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_SzablonAnkiety`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table psi_ankietyzacja.szablonankiety: ~1 rows (około)
DELETE FROM `szablonankiety`;
/*!40000 ALTER TABLE `szablonankiety` DISABLE KEYS */;
INSERT INTO `szablonankiety` (`ID_SzablonAnkiety`, `Naglowek`) VALUES
	(1, 'Szablon Semestralny');
/*!40000 ALTER TABLE `szablonankiety` ENABLE KEYS */;


-- Zrzut struktury tabela psi_ankietyzacja.termin
DROP TABLE IF EXISTS `termin`;
CREATE TABLE IF NOT EXISTS `termin` (
  `ID_Termin` int(10) NOT NULL AUTO_INCREMENT,
  `Powiadomienie` datetime NOT NULL,
  `Koniec` datetime NOT NULL,
  `Start` datetime NOT NULL,
  `AnkietaID_Ankieta` int(10) NOT NULL,
  PRIMARY KEY (`ID_Termin`),
  KEY `FKTermin372094` (`AnkietaID_Ankieta`),
  CONSTRAINT `FKTermin372094` FOREIGN KEY (`AnkietaID_Ankieta`) REFERENCES `ankieta` (`ID_Ankieta`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Dumping data for table psi_ankietyzacja.termin: ~4 rows (około)
DELETE FROM `termin`;
/*!40000 ALTER TABLE `termin` DISABLE KEYS */;
INSERT INTO `termin` (`ID_Termin`, `Powiadomienie`, `Koniec`, `Start`, `AnkietaID_Ankieta`) VALUES
	(7, '2013-06-14 12:14:46', '2013-06-14 12:14:48', '2013-06-14 12:14:49', 1),
	(8, '2013-06-14 12:22:15', '2013-06-14 12:22:18', '2013-06-14 12:22:20', 5),
	(9, '2013-06-14 12:22:27', '2013-06-14 12:22:29', '2013-06-14 12:22:30', 7),
	(10, '2013-06-14 12:22:36', '2013-06-14 12:22:37', '2013-06-14 12:22:38', 11);
/*!40000 ALTER TABLE `termin` ENABLE KEYS */;


-- Zrzut struktury tabela psi_ankietyzacja.wybor
DROP TABLE IF EXISTS `wybor`;
CREATE TABLE IF NOT EXISTS `wybor` (
  `ID_Wybor` int(10) NOT NULL AUTO_INCREMENT,
  `AnkietaID_Ankieta` int(10) NOT NULL,
  `StudentID_Student` int(10) DEFAULT NULL,
  `ZamknieteID_Zamkniete` int(10) NOT NULL,
  PRIMARY KEY (`ID_Wybor`),
  KEY `FKWybor17257` (`AnkietaID_Ankieta`),
  KEY `FKWybor670654` (`StudentID_Student`),
  KEY `FKWybor17730` (`ZamknieteID_Zamkniete`),
  CONSTRAINT `FKWybor17730` FOREIGN KEY (`ZamknieteID_Zamkniete`) REFERENCES `zamkniete` (`ID_Zamkniete`),
  CONSTRAINT `FKWybor17257` FOREIGN KEY (`AnkietaID_Ankieta`) REFERENCES `ankieta` (`ID_Ankieta`),
  CONSTRAINT `FKWybor670654` FOREIGN KEY (`StudentID_Student`) REFERENCES `student` (`ID_Student`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table psi_ankietyzacja.wybor: ~2 rows (około)
DELETE FROM `wybor`;
/*!40000 ALTER TABLE `wybor` DISABLE KEYS */;
INSERT INTO `wybor` (`ID_Wybor`, `AnkietaID_Ankieta`, `StudentID_Student`, `ZamknieteID_Zamkniete`) VALUES
	(8, 1, 1, 4),
	(9, 1, 1, 9);
/*!40000 ALTER TABLE `wybor` ENABLE KEYS */;


-- Zrzut struktury tabela psi_ankietyzacja.wykladowcy
DROP TABLE IF EXISTS `wykladowcy`;
CREATE TABLE IF NOT EXISTS `wykladowcy` (
  `ID_Wykladowcy` int(10) NOT NULL AUTO_INCREMENT,
  `Imie` varchar(10) NOT NULL,
  `Nazwisko` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_Wykladowcy`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table psi_ankietyzacja.wykladowcy: ~4 rows (około)
DELETE FROM `wykladowcy`;
/*!40000 ALTER TABLE `wykladowcy` DISABLE KEYS */;
INSERT INTO `wykladowcy` (`ID_Wykladowcy`, `Imie`, `Nazwisko`) VALUES
	(1, 'Wykladowca', 'Pierwszy'),
	(2, 'Wykładowca', 'Drugi'),
	(3, 'Wykladowca', 'Trzeci'),
	(4, 'Wykladowca', 'Czwarty');
/*!40000 ALTER TABLE `wykladowcy` ENABLE KEYS */;


-- Zrzut struktury tabela psi_ankietyzacja.wykladowcy_kurs
DROP TABLE IF EXISTS `wykladowcy_kurs`;
CREATE TABLE IF NOT EXISTS `wykladowcy_kurs` (
  `WykladowcyID_Wykladowcy` int(10) NOT NULL,
  `KursID_Kurs` int(10) NOT NULL,
  PRIMARY KEY (`WykladowcyID_Wykladowcy`,`KursID_Kurs`),
  KEY `FKWykladowcy135346` (`WykladowcyID_Wykladowcy`),
  KEY `FKWykladowcy668391` (`KursID_Kurs`),
  CONSTRAINT `FKWykladowcy668391` FOREIGN KEY (`KursID_Kurs`) REFERENCES `kurs` (`ID_Kurs`),
  CONSTRAINT `FKWykladowcy135346` FOREIGN KEY (`WykladowcyID_Wykladowcy`) REFERENCES `wykladowcy` (`ID_Wykladowcy`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table psi_ankietyzacja.wykladowcy_kurs: ~4 rows (około)
DELETE FROM `wykladowcy_kurs`;
/*!40000 ALTER TABLE `wykladowcy_kurs` DISABLE KEYS */;
INSERT INTO `wykladowcy_kurs` (`WykladowcyID_Wykladowcy`, `KursID_Kurs`) VALUES
	(1, 1),
	(2, 3),
	(3, 4),
	(4, 2);
/*!40000 ALTER TABLE `wykladowcy_kurs` ENABLE KEYS */;


-- Zrzut struktury tabela psi_ankietyzacja.zamkniete
DROP TABLE IF EXISTS `zamkniete`;
CREATE TABLE IF NOT EXISTS `zamkniete` (
  `ID_Zamkniete` int(10) NOT NULL AUTO_INCREMENT,
  `PytanieID_Pytanie` int(10) NOT NULL,
  `OpcjaOdpowiedziID_OpcjaOdpowiedzi` int(10) NOT NULL,
  PRIMARY KEY (`ID_Zamkniete`),
  KEY `FKZamkniete454632` (`PytanieID_Pytanie`),
  KEY `FK_zamkniete_opcjaodpowiedzi` (`OpcjaOdpowiedziID_OpcjaOdpowiedzi`),
  CONSTRAINT `FK_zamkniete_opcjaodpowiedzi` FOREIGN KEY (`OpcjaOdpowiedziID_OpcjaOdpowiedzi`) REFERENCES `opcjaodpowiedzi` (`ID_OpcjaOdpowiedzi`),
  CONSTRAINT `FKZamkniete454632` FOREIGN KEY (`PytanieID_Pytanie`) REFERENCES `pytanie` (`ID_Pytanie`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Dumping data for table psi_ankietyzacja.zamkniete: ~8 rows (około)
DELETE FROM `zamkniete`;
/*!40000 ALTER TABLE `zamkniete` DISABLE KEYS */;
INSERT INTO `zamkniete` (`ID_Zamkniete`, `PytanieID_Pytanie`, `OpcjaOdpowiedziID_OpcjaOdpowiedzi`) VALUES
	(3, 2, 5),
	(4, 2, 4),
	(5, 2, 3),
	(6, 2, 6),
	(7, 4, 3),
	(9, 4, 5),
	(10, 4, 4),
	(11, 4, 6);
/*!40000 ALTER TABLE `zamkniete` ENABLE KEYS */;


-- Zrzut struktury tabela psi_ankietyzacja.zapisy
DROP TABLE IF EXISTS `zapisy`;
CREATE TABLE IF NOT EXISTS `zapisy` (
  `StudentID_Student` int(10) NOT NULL,
  `KursID_Kurs` int(10) NOT NULL,
  `Od` datetime NOT NULL,
  `Do` datetime DEFAULT NULL,
  PRIMARY KEY (`StudentID_Student`,`KursID_Kurs`),
  KEY `FKZapisy929469` (`StudentID_Student`),
  KEY `FKZapisy981294` (`KursID_Kurs`),
  CONSTRAINT `FKZapisy929469` FOREIGN KEY (`StudentID_Student`) REFERENCES `student` (`ID_Student`),
  CONSTRAINT `FKZapisy981294` FOREIGN KEY (`KursID_Kurs`) REFERENCES `kurs` (`ID_Kurs`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table psi_ankietyzacja.zapisy: ~4 rows (około)
DELETE FROM `zapisy`;
/*!40000 ALTER TABLE `zapisy` DISABLE KEYS */;
INSERT INTO `zapisy` (`StudentID_Student`, `KursID_Kurs`, `Od`, `Do`) VALUES
	(1, 1, '2013-02-14 12:16:24', '2013-06-14 12:16:26'),
	(1, 2, '2013-02-14 12:17:01', '2013-06-14 12:17:05'),
	(1, 3, '2013-02-14 12:17:25', '2013-06-14 12:17:27'),
	(1, 4, '2013-02-14 12:16:24', '2013-06-14 12:16:49');
/*!40000 ALTER TABLE `zapisy` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
