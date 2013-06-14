-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Wersja serwera:               5.5.24-log - MySQL Community Server (GPL)
-- Serwer OS:                    Win32
-- HeidiSQL Wersja:              8.0.0.4396
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table psi_ankietyzacja.ankieta: ~0 rows (około)
/*!40000 ALTER TABLE `ankieta` DISABLE KEYS */;
/*!40000 ALTER TABLE `ankieta` ENABLE KEYS */;


-- Zrzut struktury tabela psi_ankietyzacja.grupaankietowa
DROP TABLE IF EXISTS `grupaankietowa`;
CREATE TABLE IF NOT EXISTS `grupaankietowa` (
  `ID_GrupaAnkietowa` int(10) NOT NULL AUTO_INCREMENT,
  `Nazwa` varchar(200) NOT NULL,
  PRIMARY KEY (`ID_GrupaAnkietowa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table psi_ankietyzacja.grupaankietowa: ~0 rows (około)
/*!40000 ALTER TABLE `grupaankietowa` DISABLE KEYS */;
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

-- Dumping data for table psi_ankietyzacja.grupaankietowa_termin: ~0 rows (około)
/*!40000 ALTER TABLE `grupaankietowa_termin` DISABLE KEYS */;
/*!40000 ALTER TABLE `grupaankietowa_termin` ENABLE KEYS */;


-- Zrzut struktury tabela psi_ankietyzacja.kurs
DROP TABLE IF EXISTS `kurs`;
CREATE TABLE IF NOT EXISTS `kurs` (
  `ID_Kurs` int(10) NOT NULL AUTO_INCREMENT,
  `Nazwa` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_Kurs`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table psi_ankietyzacja.kurs: ~0 rows (około)
/*!40000 ALTER TABLE `kurs` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table psi_ankietyzacja.odpowiedz: ~0 rows (około)
/*!40000 ALTER TABLE `odpowiedz` DISABLE KEYS */;
/*!40000 ALTER TABLE `odpowiedz` ENABLE KEYS */;


-- Zrzut struktury tabela psi_ankietyzacja.opcjaodpowiedzi
DROP TABLE IF EXISTS `opcjaodpowiedzi`;
CREATE TABLE IF NOT EXISTS `opcjaodpowiedzi` (
  `ID_OpcjaOdpowiedzi` int(10) NOT NULL AUTO_INCREMENT,
  `Nazwa` varchar(20) NOT NULL,
  `ZamknieteID_Zamkniete` int(10) NOT NULL,
  PRIMARY KEY (`ID_OpcjaOdpowiedzi`),
  KEY `FKOpcjaOdpow11752` (`ZamknieteID_Zamkniete`),
  CONSTRAINT `FKOpcjaOdpow11752` FOREIGN KEY (`ZamknieteID_Zamkniete`) REFERENCES `zamkniete` (`ID_Zamkniete`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table psi_ankietyzacja.opcjaodpowiedzi: ~0 rows (około)
/*!40000 ALTER TABLE `opcjaodpowiedzi` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table psi_ankietyzacja.pytanie: ~0 rows (około)
/*!40000 ALTER TABLE `pytanie` DISABLE KEYS */;
/*!40000 ALTER TABLE `pytanie` ENABLE KEYS */;


-- Zrzut struktury tabela psi_ankietyzacja.status
DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `ID_Status` int(10) NOT NULL AUTO_INCREMENT,
  `Nazwa` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_Status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table psi_ankietyzacja.status: ~0 rows (około)
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
/*!40000 ALTER TABLE `status` ENABLE KEYS */;


-- Zrzut struktury tabela psi_ankietyzacja.student
DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `ID_Student` int(10) NOT NULL AUTO_INCREMENT,
  `Email` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_Student`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table psi_ankietyzacja.student: ~0 rows (około)
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
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

-- Dumping data for table psi_ankietyzacja.student_grupaankietowa: ~0 rows (około)
/*!40000 ALTER TABLE `student_grupaankietowa` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_grupaankietowa` ENABLE KEYS */;


-- Zrzut struktury tabela psi_ankietyzacja.szablonankiety
DROP TABLE IF EXISTS `szablonankiety`;
CREATE TABLE IF NOT EXISTS `szablonankiety` (
  `ID_SzablonAnkiety` int(10) NOT NULL AUTO_INCREMENT,
  `Naglowek` int(100) NOT NULL,
  PRIMARY KEY (`ID_SzablonAnkiety`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table psi_ankietyzacja.szablonankiety: ~0 rows (około)
/*!40000 ALTER TABLE `szablonankiety` DISABLE KEYS */;
/*!40000 ALTER TABLE `szablonankiety` ENABLE KEYS */;


-- Zrzut struktury tabela psi_ankietyzacja.termin
DROP TABLE IF EXISTS `termin`;
CREATE TABLE IF NOT EXISTS `termin` (
  `ID_Termin` int(10) NOT NULL AUTO_INCREMENT,
  `Powiadomienie` time NOT NULL,
  `Koniec` time NOT NULL,
  `Start` time NOT NULL,
  `AnkietaID_Ankieta` int(10) NOT NULL,
  PRIMARY KEY (`ID_Termin`),
  KEY `FKTermin372094` (`AnkietaID_Ankieta`),
  CONSTRAINT `FKTermin372094` FOREIGN KEY (`AnkietaID_Ankieta`) REFERENCES `ankieta` (`ID_Ankieta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table psi_ankietyzacja.termin: ~0 rows (około)
/*!40000 ALTER TABLE `termin` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table psi_ankietyzacja.wybor: ~0 rows (około)
/*!40000 ALTER TABLE `wybor` DISABLE KEYS */;
/*!40000 ALTER TABLE `wybor` ENABLE KEYS */;


-- Zrzut struktury tabela psi_ankietyzacja.wykladowcy
DROP TABLE IF EXISTS `wykladowcy`;
CREATE TABLE IF NOT EXISTS `wykladowcy` (
  `ID_Wykladowcy` int(10) NOT NULL AUTO_INCREMENT,
  `Imie` varchar(10) NOT NULL,
  `Nazwisko` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_Wykladowcy`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table psi_ankietyzacja.wykladowcy: ~0 rows (około)
/*!40000 ALTER TABLE `wykladowcy` DISABLE KEYS */;
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

-- Dumping data for table psi_ankietyzacja.wykladowcy_kurs: ~0 rows (około)
/*!40000 ALTER TABLE `wykladowcy_kurs` DISABLE KEYS */;
/*!40000 ALTER TABLE `wykladowcy_kurs` ENABLE KEYS */;


-- Zrzut struktury tabela psi_ankietyzacja.zamkniete
DROP TABLE IF EXISTS `zamkniete`;
CREATE TABLE IF NOT EXISTS `zamkniete` (
  `ID_Zamkniete` int(10) NOT NULL AUTO_INCREMENT,
  `PytanieID_Pytanie` int(10) NOT NULL,
  `OpcjaOdpowiedziID_OpcjaOdpiwiedzi` int(10) NOT NULL,
  PRIMARY KEY (`ID_Zamkniete`),
  KEY `FKZamkniete454632` (`PytanieID_Pytanie`),
  CONSTRAINT `FKZamkniete454632` FOREIGN KEY (`PytanieID_Pytanie`) REFERENCES `pytanie` (`ID_Pytanie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table psi_ankietyzacja.zamkniete: ~0 rows (około)
/*!40000 ALTER TABLE `zamkniete` DISABLE KEYS */;
/*!40000 ALTER TABLE `zamkniete` ENABLE KEYS */;


-- Zrzut struktury tabela psi_ankietyzacja.zapisy
DROP TABLE IF EXISTS `zapisy`;
CREATE TABLE IF NOT EXISTS `zapisy` (
  `StudentID_Student` int(10) NOT NULL,
  `KursID_Kurs` int(10) NOT NULL,
  `Od` time NOT NULL,
  `Do` time DEFAULT NULL,
  PRIMARY KEY (`StudentID_Student`,`KursID_Kurs`),
  KEY `FKZapisy929469` (`StudentID_Student`),
  KEY `FKZapisy981294` (`KursID_Kurs`),
  CONSTRAINT `FKZapisy981294` FOREIGN KEY (`KursID_Kurs`) REFERENCES `kurs` (`ID_Kurs`),
  CONSTRAINT `FKZapisy929469` FOREIGN KEY (`StudentID_Student`) REFERENCES `student` (`ID_Student`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table psi_ankietyzacja.zapisy: ~0 rows (około)
/*!40000 ALTER TABLE `zapisy` DISABLE KEYS */;
/*!40000 ALTER TABLE `zapisy` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
