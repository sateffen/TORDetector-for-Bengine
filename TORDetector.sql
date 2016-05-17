--
--  Copyright (C) 2012 sateffen
--  https://github.com/sateffen/TORDetector-for-Bengine
--
--  This program is free software: you can redistribute it and/or modify
--  it under the terms of the GNU General Public License as published by
--  the Free Software Foundation, either version 3 of the License, or
--  (at your option) any later version.
--
--  This program is distributed in the hope that it will be useful,
--  but WITHOUT ANY WARRANTY; without even the implied warranty of
--  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
--  GNU General Public License for more details.
--
-- You should have received a copy of the GNU General Public License
-- along with this program.  If not, see <http://www.gnu.org/licenses/>.
--

--
-- Daten für Tabelle `bengine_cronjob`
--

INSERT INTO `bengine_cronjob` (`cronid`, `class`, `month`, `day`, `weekday`, `hour`, `minute`, `xtime`, `last`, `active`) VALUES
('', 'game/UpdateTORIPs', '1,2,3,4,5,6,7,8,9,10,11,12', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31', '1', '0', '0', '', '', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bengine_TORUserLog`
--

CREATE TABLE IF NOT EXISTS `bengine_TORUserLog` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `IP` varchar(15) CHARACTER SET utf8 NOT NULL,
  `Timestamp` bigint(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bengine_TORIPTable`
--

CREATE TABLE IF NOT EXISTS `bengine_TORIPTable` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `IP` varchar(15) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;
