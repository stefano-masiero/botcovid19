-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Giu 07, 2020 alle 18:30
-- Versione del server: 10.1.45-MariaDB-cll-lve
-- Versione PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ejbygfzs_botCovid19`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Continente`
--

CREATE TABLE `Continente` (
  `nomeContinente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `Continente`
--

INSERT INTO `Continente` (`nomeContinente`) VALUES
('Africa'),
('America'),
('America Nord'),
('America Sud'),
('Asia'),
('Europa'),
('Oceania');

-- --------------------------------------------------------

--
-- Struttura della tabella `Nazione`
--

CREATE TABLE `Nazione` (
  `nomeNazione` varchar(50) NOT NULL,
  `bandiera` varchar(200) DEFAULT NULL,
  `nomeContinente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `Nazione`
--

INSERT INTO `Nazione` (`nomeNazione`, `bandiera`, `nomeContinente`) VALUES
('Afghanistan', NULL, 'Asia'),
('Albania', NULL, 'Europa'),
('Algeria', NULL, 'Africa'),
('Andorra', NULL, 'Europa'),
('Angola', NULL, 'Africa'),
('Anguilla', NULL, 'America Nord'),
('Antigua and Barbuda', NULL, 'America Nord'),
('Argentina', NULL, 'America Sud'),
('Armenia', NULL, 'Asia'),
('Aruba', NULL, 'America Nord'),
('Australia', NULL, 'Oceania'),
('Austria', NULL, 'Europa'),
('Azerbaijan', NULL, 'Asia'),
('Bahamas', NULL, 'America Nord'),
('Bahrain', NULL, 'Asia'),
('Bangladesh', NULL, 'Asia'),
('Barbados', NULL, 'America Nord'),
('Belarus', NULL, 'Europa'),
('Belgium', NULL, 'Europa'),
('Belize', NULL, 'America Nord'),
('Benin', NULL, 'Africa'),
('Bermuda', NULL, 'America Nord'),
('Bhutan', NULL, 'Asia'),
('Bolivia', NULL, 'America Sud'),
('Bosnia and Herzegovina', NULL, 'Europa'),
('Botswana ', NULL, 'Africa'),
('Brazil', NULL, 'America Sud'),
('British Virgin Islands', NULL, 'America Nord'),
('Brunei', NULL, 'Asia'),
('Bulgaria', NULL, 'Europa'),
('Burkina Faso', NULL, 'Africa'),
('Burundi', NULL, 'Africa'),
('Cabo Verde', NULL, 'Africa'),
('Cambodia', NULL, 'Asia'),
('Cameroon', NULL, 'Africa'),
('Canada', NULL, 'America Nord'),
('CAR', NULL, 'Africa'),
('Caribbean Netherlands', NULL, 'America Nord'),
('Cayman Islands', NULL, 'America Nord'),
('Chad', NULL, 'Africa'),
('Channel Islands', NULL, 'Europa'),
('Chile', NULL, 'America Sud'),
('China', NULL, 'Asia'),
('Colombia', NULL, 'America Sud'),
('Comoros', NULL, 'Africa'),
('Congo', NULL, 'Africa'),
('Costa Rica', NULL, 'America Nord'),
('Croatia', NULL, 'Europa'),
('Cuba', NULL, 'America Nord'),
('Cura&#199;ao', NULL, 'America Nord'),
('Cyprus', NULL, 'Asia'),
('Czechia', NULL, 'Europa'),
('Denmark', NULL, 'Europa'),
('Djibouti', NULL, 'Africa'),
('Dominica', NULL, 'America Nord'),
('Dominican Republic', NULL, 'America Nord'),
('DRC', NULL, 'Africa'),
('Ecuador', NULL, 'America Sud'),
('Egypt', NULL, 'Africa'),
('El Salvador', NULL, 'America Nord'),
('Equatorial Guinea', NULL, 'Africa'),
('Eritrea', NULL, 'Africa'),
('Estonia', NULL, 'Europa'),
('Eswatini', NULL, 'Africa'),
('Ethiopia', NULL, 'Africa'),
('Faeroe Islands', NULL, 'Europa'),
('Falkland Islands', NULL, 'America Sud'),
('Fiji', NULL, 'Oceania'),
('Finland', NULL, 'Europa'),
('France', NULL, 'Europa'),
('French Guiana', NULL, 'America Sud'),
('French Polynesia', NULL, 'Oceania'),
('Gabon', NULL, 'Africa'),
('Gambia', NULL, 'Africa'),
('Georgia', NULL, 'Asia'),
('Germany', NULL, 'Europa'),
('Ghana', NULL, 'Africa'),
('Gibraltar', NULL, 'Europa'),
('Greece', NULL, 'Europa'),
('Greenland', NULL, 'America Nord'),
('Grenada', NULL, 'America Nord'),
('Guadeloupe', NULL, 'America Nord'),
('Guatemala', NULL, 'America Nord'),
('Guinea', NULL, 'Africa'),
('Guinea-Bissau', NULL, 'Africa'),
('Guyana', NULL, 'America Sud'),
('Haiti', NULL, 'America Nord'),
('Honduras', NULL, 'America Nord'),
('Hong Kong', NULL, 'Asia'),
('Hungary', NULL, 'Europa'),
('Iceland', NULL, 'Europa'),
('India', NULL, 'Asia'),
('Indonesia', NULL, 'Asia'),
('Iran', NULL, 'Asia'),
('Iraq', NULL, 'Asia'),
('Ireland', NULL, 'Europa'),
('Isle of Man', NULL, 'Europa'),
('Israel', NULL, 'Asia'),
('Italy', '????\0JFIF\0\0\0\0\0\0??\0?\0		\n\n	\n\n\r \Z+!$2\"3*7%\"0\n\r\r\r\"	\"\r#??\0L?\"\0??\0\0\0\0\0\0\0\0\0\0\0\0\0', 'Europa'),
('Ivory Coast', NULL, 'Africa'),
('Jamaica', NULL, 'America Nord'),
('Japan', NULL, 'Asia'),
('Jordan', NULL, 'Asia'),
('Kazakhstan', NULL, 'Asia'),
('Kenya', NULL, 'Africa'),
('Kuwait', NULL, 'Asia'),
('Kyrgyzstan', NULL, 'Asia'),
('Laos', NULL, 'Asia'),
('Latvia', NULL, 'Europa'),
('Lebanon', NULL, 'Asia'),
('Lesotho', NULL, 'Africa'),
('Liberia', NULL, 'Africa'),
('Libya', NULL, 'Africa'),
('Liechtenstein', NULL, 'Europa'),
('Lithuania', NULL, 'Europa'),
('Luxembourg', NULL, 'Europa'),
('Macao', NULL, 'Asia'),
('Madagascar', NULL, 'Africa'),
('Malawi', NULL, 'Africa'),
('Malaysia', NULL, 'Asia'),
('Maldives', NULL, 'Asia'),
('Mali', NULL, 'Africa'),
('Malta', NULL, 'Europa'),
('Martinique', NULL, 'America Nord'),
('Mauritania', NULL, 'Africa'),
('Mauritius ', NULL, 'Africa'),
('Mayotte', NULL, 'Africa'),
('Mexico', NULL, 'America Nord'),
('Moldova', NULL, 'Europa'),
('Monaco', NULL, 'Europa'),
('Mongolia', NULL, 'Asia'),
('Montenegro', NULL, 'Europa'),
('Montserrat', NULL, 'America Nord'),
('Morocco', NULL, 'Africa'),
('Mozambique', NULL, 'Africa'),
('Myanmar', NULL, 'Asia'),
('Namibia', NULL, 'Africa'),
('Nepal', NULL, 'Asia'),
('Netherlands', NULL, 'Europa'),
('New Caledonia', NULL, 'Oceania'),
('New Zealand', NULL, 'Oceania'),
('Nicaragua', NULL, 'America Nord'),
('Niger', NULL, 'Africa'),
('Nigeria', NULL, 'Africa'),
('North Macedonia', NULL, 'Europa'),
('Norway', NULL, 'Europa'),
('Oman', NULL, 'Asia'),
('Pakistan', NULL, 'Asia'),
('Palestine', NULL, 'Asia'),
('Panama', NULL, 'America Nord'),
('Papua New Guinea', NULL, 'Oceania'),
('Paraguay', NULL, 'America Sud'),
('Peru', NULL, 'America Sud'),
('Philippines', NULL, 'Asia'),
('Poland', NULL, 'Europa'),
('Portugal', NULL, 'Europa'),
('Qatar', NULL, 'Asia'),
('Quatar', NULL, 'Asia'),
('Réunion', NULL, 'Africa'),
('Romania', NULL, 'Europa'),
('Russia', NULL, 'Europa'),
('Rwanda', NULL, 'Africa'),
('S. Korea', NULL, 'Asia'),
('Saint Kitts and Nevis', NULL, 'America Nord'),
('Saint Lucia', NULL, 'America Nord'),
('Saint Martin', NULL, 'America Nord'),
('Saint Pierre Miquelon', NULL, 'America Nord'),
('San Marino', NULL, 'Europa'),
('Sao Tome and Principe', NULL, 'Africa'),
('Saudi Arabia', NULL, 'Asia'),
('Senegal', NULL, 'Africa'),
('Serbia', NULL, 'Europa'),
('Seychelles', NULL, 'Africa'),
('Sierra Leone', NULL, 'Africa'),
('Singapore', NULL, 'Asia'),
('Sint Maarten', NULL, 'America Nord'),
('Slovakia', NULL, 'Europa'),
('Slovenia', NULL, 'Europa'),
('Somalia', NULL, 'Africa'),
('South Africa', NULL, 'Africa'),
('South Sudan', NULL, 'Africa'),
('Spain', NULL, 'Europa'),
('Sri Lanka', NULL, 'Asia'),
('St. Barth', NULL, 'America Nord'),
('St. Vincent Grenadines', NULL, 'America Nord'),
('Sudan', NULL, 'Africa'),
('Suriname', NULL, 'America Sud'),
('Sweden', NULL, 'Europa'),
('Switzerland', NULL, 'Europa'),
('Syria', NULL, 'Asia'),
('Taiwan', NULL, 'Asia'),
('Tajikistan', NULL, 'Asia'),
('Tanzania', NULL, 'Africa'),
('Thailand', NULL, 'Asia'),
('Timor-Leste', NULL, 'Asia'),
('Togo', NULL, 'Africa'),
('Trinidad and Tobago', NULL, 'America Nord'),
('Tunisia', NULL, 'Africa'),
('Turkey', NULL, 'Asia'),
('Turks and Caicos', NULL, 'America Nord'),
('UAE', NULL, 'Asia'),
('Uganda', NULL, 'Africa'),
('UK', NULL, 'Europa'),
('Ukraine', NULL, 'Europa'),
('Uruguay', NULL, 'America Sud'),
('USA', NULL, 'America Nord'),
('Uzbekistan', NULL, 'Asia'),
('Vatican City', NULL, 'Europa'),
('Venezuela', NULL, 'America Sud'),
('Vietnam', NULL, 'Asia'),
('Western Sahara', NULL, 'Africa'),
('Yemen', NULL, 'Asia'),
('Zambia', NULL, 'Africa'),
('Zimbabwe ', NULL, 'Africa');

-- --------------------------------------------------------

--
-- Struttura della tabella `Notizia`
--

CREATE TABLE `Notizia` (
  `titolo` varchar(100) NOT NULL,
  `idNotizia` int(11) NOT NULL,
  `data` varchar(50) NOT NULL,
  `link` varchar(200) NOT NULL,
  `descrizione` varchar(200) NOT NULL,
  `immagine` varchar(200) DEFAULT NULL,
  `nomeContinente` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `Regione`
--

CREATE TABLE `Regione` (
  `nomeRegione` varchar(50) NOT NULL,
  `nContagiTot` int(11) DEFAULT NULL,
  `nMorti` int(11) DEFAULT NULL,
  `nGuariti` int(11) DEFAULT NULL,
  `nInfettiAttivi` int(11) DEFAULT NULL,
  `nNuoviCasi` int(11) DEFAULT NULL,
  `nTest` int(11) DEFAULT NULL,
  `nomeNazione` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `Regione`
--

INSERT INTO `Regione` (`nomeRegione`, `nContagiTot`, `nMorti`, `nGuariti`, `nInfettiAttivi`, `nNuoviCasi`, `nTest`, `nomeNazione`) VALUES
('Abruzzo', 3265, 418, 2194, 653, 7, 83020, 'Italy'),
('Afghanistan', 20342, 357, 1875, 45, 791, 9, 'Afghanistan'),
('Albania', 1246, 34, 938, 13, 14, 12, 'Albania'),
('Algeria', 10154, 707, 6717, 86, 104, 16, 'Algeria'),
('Andorra', 852, 51, 741, 0, 0, 660, 'Andorra'),
('Angola', 88, 4, 24, 0, 0, 0, 'Angola'),
('Anguilla', 3, 0, 3, 0, 0, 0, 'Anguilla'),
('Antigua and Barbuda', 26, 3, 20, 0, 0, 31, 'Antigua and Barbuda'),
('Argentina', 22020, 656, 6909, 729, 0, 15, 'Argentina'),
('Armenia', 13130, 200, 4014, 294, 766, 68, 'Armenia'),
('Aruba', 101, 3, 98, 0, 0, 28, 'Aruba'),
('Australia', 7260, 102, 6703, 13, 5, 4, 'Australia'),
('Austria', 16898, 672, 15789, 0, 0, 75, 'Austria'),
('Azerbaijan', 7553, 88, 4149, 125, 314, 9, 'Azerbaijan'),
('Bahamas', 103, 11, 62, 0, 0, 28, 'Bahamas'),
('Bahrain', 14763, 25, 9468, 412, 380, 15, 'Bahrain'),
('Bangladesh', 65769, 888, 13903, 578, 2743, 5, 'Bangladesh'),
('Barbados', 92, 7, 81, 0, 0, 24, 'Barbados'),
('Basilicata', 399, 27, 358, 14, 0, 32147, 'Italy'),
('Belarus', 48630, 269, 23647, 632, 879, 28, 'Belarus'),
('Belgium', 59226, 9595, 16291, 101, 154, 828, 'Belgium'),
('Belize', 19, 2, 16, 0, 0, 5, 'Belize'),
('Benin', 261, 3, 151, 0, 0, 0, 'Benin'),
('Bermuda', 141, 9, 114, 0, 0, 144, 'Bermuda'),
('Bhutan', 48, 0, 11, 0, 0, 0, 'Bhutan'),
('Bolivia', 13358, 454, 1902, 163, 630, 39, 'Bolivia'),
('Bosnia and Herzegovina', 2606, 159, 1968, 0, 0, 48, 'Bosnia and Herzegovina'),
('Botswana', 40, 1, 23, 0, 0, 0, 'Botswana'),
('Brazil', 677674, 36062, 302084, 0, 4087, 170, 'Brazil'),
('British Virgin Islands', 8, 1, 7, 0, 0, 33, 'British Virgin Islands'),
('Brunei ', 141, 2, 138, 0, 0, 5, 'Brunei '),
('Bulgaria', 2711, 160, 1545, 0, 0, 23, 'Bulgaria'),
('Burkina Faso', 889, 53, 765, 0, 1, 3, 'Burkina Faso'),
('Burundi', 83, 1, 45, 0, 0, 0, 'Burundi'),
('Cabo Verde', 542, 5, 240, 0, 0, 9, 'Cabo Verde'),
('Calabria', 1159, 97, 971, 91, 0, 76142, 'Italy'),
('Cambodia', 125, 0, 123, 0, 0, 0, 'Cambodia'),
('Cameroon', 7599, 212, 4587, 0, 0, 8, 'Cameroon'),
('Campania', 4826, 426, 3675, 725, 4, 217898, 'Italy'),
('Canada', 95698, 7800, 54221, 607, 641, 207, 'Canada'),
('CAR', 1570, 5, 37, 0, 0, 1, 'CAR'),
('Caribbean Netherlands', 7, 0, 7, 0, 0, 0, 'Caribbean Netherlands'),
('Cayman Islands', 164, 1, 93, 0, 0, 15, 'Cayman Islands'),
('Chad', 836, 69, 672, 0, 0, 4, 'Chad'),
('Channel Islands', 563, 46, 512, 0, 0, 265, 'Channel Islands'),
('Chile', 127745, 1541, 95631, 0, 0, 81, 'Chile'),
('China', 83036, 4634, 78332, 3, 6, 3, 'China'),
('Colombia', 38027, 1205, 14382, 0, 0, 24, 'Colombia'),
('Comoros', 141, 2, 67, 0, 0, 2, 'Comoros'),
('Congo', 683, 22, 210, 0, 0, 4, 'Congo'),
('Costa Rica', 1263, 10, 701, 0, 0, 2, 'Costa Rica'),
('Croatia', 2247, 104, 2126, 5, 0, 25, 'Croatia'),
('Cuba', 2191, 83, 1862, 7, 18, 7, 'Cuba'),
('Cura&ccedil;ao', 21, 1, 15, 0, 0, 6, 'Cura&ccedil;ao'),
('Cyprus', 964, 18, 807, 0, 4, 15, 'Cyprus'),
('Czechia', 9609, 327, 6890, 5, 42, 31, 'Czechia'),
('Denmark', 11948, 589, 10755, 34, 24, 102, 'Denmark'),
('Diamond Princess ', 712, 13, 651, 0, 0, 0, 'Diamond Princess '),
('Djibouti', 4207, 28, 1877, 62, 38, 28, 'Djibouti'),
('Dominica', 18, 0, 16, 0, 0, 0, 'Dominica'),
('Dominican Republic', 19600, 538, 12007, 88, 405, 50, 'Dominican Republic'),
('DRC', 4016, 85, 537, 0, 138, 1, 'DRC'),
('Ecuador', 43120, 3621, 21020, 0, 392, 205, 'Ecuador'),
('Egypt', 32612, 1198, 8538, 0, 0, 12, 'Egypt'),
('El Salvador', 3015, 53, 1305, 24, 81, 8, 'El Salvador'),
('Emilia-Romagna', 27908, 4175, 21405, 2328, 14, 355952, 'Italy'),
('Equatorial Guinea', 1306, 12, 200, 0, 0, 9, 'Equatorial Guinea'),
('Eritrea', 39, 0, 39, 0, 0, 0, 'Eritrea'),
('Estonia', 1939, 69, 1681, 6, 8, 52, 'Estonia'),
('Eswatini', 333, 3, 225, 1, 11, 3, 'Eswatini'),
('Ethiopia', 2020, 27, 344, 63, 86, 0, 'Ethiopia'),
('Faeroe Islands', 187, 0, 187, 0, 0, 0, 'Faeroe Islands'),
('Falkland Islands', 13, 0, 13, 0, 0, 0, 'Falkland Islands'),
('Fiji', 18, 0, 18, 0, 0, 0, 'Fiji'),
('Finland', 6981, 323, 5800, 0, 17, 58, 'Finland'),
('France', 153634, 29142, 70806, 0, 0, 447, 'France'),
('French Guiana', 689, 1, 383, 35, 50, 3, 'French Guiana'),
('French Polynesia', 60, 0, 60, 0, 0, 0, 'French Polynesia'),
('Friuli Venezia Giulia', 3283, 339, 2793, 151, 0, 147673, 'Italy'),
('Gabon', 3101, 21, 833, 0, 0, 9, 'Gabon'),
('Gambia', 26, 1, 21, 0, 0, 0, 'Gambia'),
('Georgia', 809, 13, 674, 11, 1, 3, 'Georgia'),
('Germany', 185758, 8770, 169100, 200, 62, 105, 'Germany'),
('Ghana', 9638, 44, 3636, 89, 176, 1, 'Ghana'),
('Gibraltar', 176, 0, 164, 9, 1, 0, 'Gibraltar'),
('Greece', 2997, 180, 1374, 0, 17, 17, 'Greece'),
('Greenland', 13, 0, 13, 0, 0, 0, 'Greenland'),
('Grenada', 23, 0, 22, 0, 0, 0, 'Grenada'),
('Guadeloupe', 164, 14, 144, 0, 0, 35, 'Guadeloupe'),
('Guatemala', 6792, 230, 1133, 80, 307, 13, 'Guatemala'),
('Guinea', 4117, 23, 2857, 0, 0, 2, 'Guinea'),
('Guinea-Bissau', 1368, 12, 153, 0, 0, 6, 'Guinea-Bissau'),
('Guyana', 154, 12, 80, 0, 0, 15, 'Guyana'),
('Haiti', 3072, 50, 24, 0, 0, 4, 'Haiti'),
('Honduras', 6155, 250, 697, 20, 184, 25, 'Honduras'),
('Hong Kong', 1107, 4, 1049, 1, 1, 0, 'Hong Kong'),
('Hungary', 4008, 546, 2279, 0, 18, 57, 'Hungary'),
('Iceland', 1807, 10, 1794, 0, 1, 29, 'Iceland'),
('India', 254340, 7117, 122738, 4043, 7718, 5, 'India'),
('Indonesia', 31186, 1851, 10498, 591, 672, 7, 'Indonesia'),
('Iran', 171789, 8281, 134349, 2311, 2364, 99, 'Iran'),
('Iraq', 12366, 346, 5186, 282, 1268, 9, 'Iraq'),
('Ireland', 25201, 1679, 22698, 0, 18, 340, 'Ireland'),
('Isle of Man', 336, 24, 312, 0, 0, 282, 'Isle of Man'),
('Israel', 17783, 297, 15064, 22, 31, 32, 'Israel'),
('Ivory Coast', 3557, 36, 1750, 0, 0, 1, 'Ivory Coast'),
('Jamaica', 596, 10, 404, 19, 1, 3, 'Jamaica'),
('Japan', 17103, 914, 15079, 0, 0, 7, 'Japan'),
('Jordan', 808, 9, 607, 21, 13, 0, 'Jordan'),
('Kazakhstan', 12694, 53, 7376, 241, 183, 3, 'Kazakhstan'),
('Kenya', 2767, 84, 752, 46, 167, 2, 'Kenya'),
('Kuwait', 31848, 264, 20205, 923, 717, 62, 'Kuwait'),
('Kyrgyzstan', 2007, 22, 1425, 65, 33, 3, 'Kyrgyzstan'),
('Laos', 19, 0, 18, 0, 0, 0, 'Laos'),
('Latvia', 1088, 25, 781, 0, 2, 13, 'Latvia'),
('Lazio', 7812, 760, 4362, 2690, 11, 274129, 'Italy'),
('Lebanon', 1331, 30, 768, 0, 11, 4, 'Lebanon'),
('Lesotho', 4, 0, 2, 0, 0, 0, 'Lesotho'),
('Liberia', 359, 30, 194, 9, 14, 6, 'Liberia'),
('Libya', 256, 5, 52, 0, 0, 0, 'Libya'),
('Liechtenstein', 82, 1, 55, 0, 0, 26, 'Liechtenstein'),
('Liguria', 9812, 1499, 8070, 243, 13, 116247, 'Italy'),
('Lithuania', 1714, 71, 1328, 7, 9, 26, 'Lithuania'),
('Lombardia', 90195, 16270, 54505, 19420, 125, 821977, 'Italy'),
('Luxembourg', 4039, 110, 3899, 11, 4, 176, 'Luxembourg'),
('Macao', 45, 0, 45, 0, 0, 0, 'Macao'),
('Madagascar', 1052, 9, 233, 21, 26, 0, 'Madagascar'),
('Malawi', 409, 4, 55, 0, 0, 0, 'Malawi'),
('Malaysia', 8322, 117, 6674, 39, 19, 4, 'Malaysia'),
('Maldives', 1901, 8, 773, 10, 0, 15, 'Maldives'),
('Mali', 1533, 90, 873, 28, 10, 4, 'Mali'),
('Malta', 629, 9, 596, 0, 2, 20, 'Malta'),
('Marche', 6745, 991, 4595, 1159, 3, 113729, 'Italy'),
('Martinique', 202, 14, 98, 0, 0, 37, 'Martinique'),
('Mauritania', 947, 49, 104, 0, 0, 11, 'Mauritania'),
('Mauritius', 337, 10, 324, 0, 0, 8, 'Mauritius'),
('Mayotte', 2079, 25, 1523, 0, 0, 92, 'Mayotte'),
('Mexico', 113619, 13511, 81544, 2954, 3593, 105, 'Mexico'),
('Moldova', 9700, 341, 5638, 188, 189, 85, 'Moldova'),
('Molise', 436, 23, 293, 120, 0, 16791, 'Italy'),
('Monaco', 99, 4, 93, 0, 0, 102, 'Monaco'),
('Mongolia', 193, 0, 75, 4, 0, 0, 'Mongolia'),
('Montenegro', 324, 9, 315, 0, 0, 14, 'Montenegro'),
('Montserrat', 11, 1, 10, 0, 0, 200, 'Montserrat'),
('Morocco', 8177, 208, 7328, 13, 26, 6, 'Morocco'),
('Mozambique', 424, 2, 127, 1, 15, 0, 'Mozambique'),
('MS Zaandam ', 9, 2, 0, 0, 0, 0, 'MS Zaandam '),
('Myanmar', 242, 6, 156, 0, 2, 0, 'Myanmar'),
('Namibia', 29, 0, 16, 0, 0, 0, 'Namibia'),
('Nepal', 3448, 13, 467, 102, 213, 0, 'Nepal'),
('Netherlands', 47574, 6013, 0, 0, 239, 351, 'Netherlands'),
('New Caledonia', 20, 0, 18, 0, 0, 0, 'New Caledonia'),
('New Zealand', 1504, 22, 1481, 0, 0, 4, 'New Zealand'),
('Nicaragua', 1118, 46, 370, 0, 0, 7, 'Nicaragua'),
('Niger', 970, 65, 867, 0, 0, 3, 'Niger'),
('Nigeria', 12233, 342, 3826, 0, 0, 2, 'Nigeria'),
('North Macedonia', 3025, 153, 1646, 6, 110, 73, 'North Macedonia'),
('Norway', 8547, 238, 8138, 0, 16, 44, 'Norway'),
('Oman', 16882, 75, 3451, 0, 866, 15, 'Oman'),
('P.A. Bolzano', 2603, 292, 2214, 97, 3, 71755, 'Italy'),
('P.A. Trento', 4435, 464, 3889, 82, 1, 95638, 'Italy'),
('Pakistan', 98943, 2002, 33465, 884, 4960, 9, 'Pakistan'),
('Palestine', 464, 3, 403, 3, 0, 0, 'Palestine'),
('Panama', 16004, 386, 10118, 0, 0, 90, 'Panama'),
('Papua New Guinea', 8, 0, 8, 0, 0, 0, 'Papua New Guinea'),
('Paraguay', 1090, 11, 532, 0, 0, 2, 'Paraguay'),
('Peru', 191758, 5301, 82731, 0, 0, 161, 'Peru'),
('Philippines', 21895, 1003, 4530, 89, 555, 9, 'Philippines'),
('Piemonte', 30855, 3941, 22952, 3962, 10, 343354, 'Italy'),
('Poland', 26561, 1157, 12855, 214, 575, 31, 'Poland'),
('Portugal', 34693, 1479, 20995, 188, 342, 145, 'Portugal'),
('Puglia', 4511, 525, 3253, 733, 0, 131931, 'Italy'),
('Qatar', 68790, 54, 44338, 1811, 1595, 19, 'Qatar'),
('R&eacute;union', 480, 1, 411, 0, 0, 1, 'R&eacute;union'),
('Romania', 20479, 1326, 14638, 219, 189, 69, 'Romania'),
('Russia', 467673, 5859, 226731, 5343, 8984, 40, 'Russia'),
('Rwanda', 431, 2, 283, 0, 0, 0, 'Rwanda'),
('S. Korea', 11776, 273, 10552, 21, 57, 5, 'S. Korea'),
('Saint Kitts and Nevis', 15, 0, 15, 0, 0, 0, 'Saint Kitts and Nevis'),
('Saint Lucia', 19, 0, 18, 0, 0, 0, 'Saint Lucia'),
('Saint Martin', 41, 3, 33, 0, 0, 78, 'Saint Martin'),
('Saint Pierre Miquelon', 1, 0, 1, 0, 0, 0, 'Saint Pierre Miquelon'),
('San Marino', 680, 42, 428, 0, 0, 1238, 'San Marino'),
('Sao Tome and Principe', 499, 12, 68, 0, 0, 55, 'Sao Tome and Principe'),
('Sardegna', 1362, 131, 1172, 59, 0, 63172, 'Italy'),
('Saudi Arabia', 101914, 712, 72817, 1026, 3045, 20, 'Saudi Arabia'),
('Senegal', 4328, 49, 2588, 76, 79, 3, 'Senegal'),
('Serbia', 11823, 249, 11348, 292, 82, 28, 'Serbia'),
('Seychelles', 11, 0, 11, 0, 0, 0, 'Seychelles'),
('Sicilia', 3451, 277, 2312, 862, 1, 164985, 'Italy'),
('Sierra Leone', 969, 48, 608, 8, 23, 6, 'Sierra Leone'),
('Singapore', 37910, 25, 24886, 327, 383, 4, 'Singapore'),
('Sint Maarten', 77, 15, 61, 0, 0, 350, 'Sint Maarten'),
('Slovakia', 1528, 28, 1389, 10, 0, 5, 'Slovakia'),
('Slovenia', 1485, 109, 1359, 0, 1, 52, 'Slovenia'),
('Somalia', 2289, 82, 431, 0, 0, 5, 'Somalia'),
('South Africa', 45973, 952, 24258, 0, 0, 16, 'South Africa'),
('South Sudan', 1317, 14, 6, 0, 323, 1, 'South Sudan'),
('Spain', 288390, 27135, 0, 0, 0, 580, 'Spain'),
('Sri Lanka', 1821, 11, 941, 50, 7, 0, 'Sri Lanka'),
('St. Barth', 6, 0, 6, 0, 0, 0, 'St. Barth'),
('St. Vincent Grenadines', 26, 0, 15, 0, 0, 0, 'St. Vincent Grenadines'),
('Sudan', 6081, 359, 2014, 0, 0, 8, 'Sudan'),
('Suriname', 101, 1, 9, 0, 1, 2, 'Suriname'),
('Sweden', 44730, 4659, 0, 0, 81, 462, 'Sweden'),
('Switzerland', 30965, 1921, 28700, 0, 9, 222, 'Switzerland'),
('Syria', 125, 6, 58, 0, 0, 0, 'Syria'),
('Taiwan', 443, 7, 430, 1, 0, 0, 'Taiwan'),
('Tajikistan', 4529, 48, 2673, 90, 76, 5, 'Tajikistan'),
('Tanzania', 509, 21, 183, 0, 0, 0, 'Tanzania'),
('Thailand', 3112, 58, 2972, 1, 8, 0, 'Thailand'),
('Timor-Leste', 24, 0, 24, 0, 0, 0, 'Timor-Leste'),
('Togo', 487, 13, 240, 0, 0, 2, 'Togo'),
('Toscana', 10135, 1070, 8315, 750, 1, 272106, 'Italy'),
('Trinidad and Tobago', 117, 8, 108, 0, 0, 6, 'Trinidad and Tobago'),
('Tunisia', 1087, 49, 982, 5, 0, 4, 'Tunisia'),
('Turkey', 169218, 4669, 135322, 0, 0, 55, 'Turkey'),
('Turks and Caicos', 12, 1, 11, 0, 0, 26, 'Turks and Caicos'),
('UAE', 38808, 276, 21806, 745, 540, 28, 'UAE'),
('Uganda', 616, 0, 96, 14, 23, 0, 'Uganda'),
('UK', 286194, 40542, 0, 0, 1326, 597, 'UK'),
('Ukraine', 26999, 788, 12054, 242, 485, 18, 'Ukraine'),
('Umbria', 1432, 76, 1327, 29, 1, 76179, 'Italy'),
('Uruguay', 845, 23, 726, 0, 0, 7, 'Uruguay'),
('USA', 1995945, 112188, 752882, 1187, 7401, 339, 'USA'),
('Uzbekistan', 4302, 17, 3354, 86, 208, 0, 'Uzbekistan'),
('Valle d&#39;Aosta', 1191, 144, 1038, 9, 2, 15905, 'Italy'),
('Vatican City', 12, 0, 12, 0, 0, 0, 'Vatican City'),
('Veneto', 19183, 1954, 16144, 1085, 1, 745805, 'Italy'),
('Venezuela', 2316, 22, 385, 0, 0, 0, 'Venezuela'),
('Vietnam', 329, 0, 307, 0, 0, 0, 'Vietnam'),
('Western Sahara', 9, 1, 6, 0, 0, 2, 'Western Sahara'),
('Yemen', 482, 111, 23, 0, 0, 4, 'Yemen'),
('Zambia', 1089, 7, 912, 0, 0, 0, 'Zambia'),
('Zimbabwe', 279, 4, 33, 0, 0, 0, 'Zimbabwe');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `Continente`
--
ALTER TABLE `Continente`
  ADD PRIMARY KEY (`nomeContinente`);

--
-- Indici per le tabelle `Nazione`
--
ALTER TABLE `Nazione`
  ADD PRIMARY KEY (`nomeNazione`),
  ADD KEY `NomeContinente` (`nomeContinente`);

--
-- Indici per le tabelle `Notizia`
--
ALTER TABLE `Notizia`
  ADD PRIMARY KEY (`idNotizia`),
  ADD KEY `NomeContinente` (`nomeContinente`);

--
-- Indici per le tabelle `Regione`
--
ALTER TABLE `Regione`
  ADD PRIMARY KEY (`nomeRegione`),
  ADD KEY `NomeNazione` (`nomeNazione`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `Notizia`
--
ALTER TABLE `Notizia`
  MODIFY `idNotizia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81608;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `Notizia`
--
ALTER TABLE `Notizia`
  ADD CONSTRAINT `Notizia_ibfk_1` FOREIGN KEY (`nomeContinente`) REFERENCES `Continente` (`nomeContinente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
