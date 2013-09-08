<?php
/*
 *  Copyright (C) 2013 sateffen
 *  https://github.com/sateffen/TORDetector-for-Bengine
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

class Bengine_Game_Cronjob_UpdateTORIPs extends Recipe_CronjobAbstract
{
	/**
	 * Updates all TOR IPs
	 */
	protected function updateIPs()
	{
		$IPList = file( 'http://torstatus.blutmagie.de/ip_list_exit.php/Tor_ip_list_EXIT.csv' , FILE_SKIP_EMPTY_LINES );
		Core::getQuery()->truncate( "TORIPTable" );
		$sqlQuery = "INSERT INTO ".PREFIX."TORIPTable (`ID`,`IP`) VALUES";
		foreach ( $IPList as $IP ) {
			$IP = trim( $IP );
			if ( preg_match( '/^(?:25[0-5]|2[0-4]\d|1\d\d|[1-9]\d|\d)(?:[.](?:25[0-5]|2[0-4]\d|1\d\d|[1-9]\d|\d)){3}$/' , $IP ) ) {
				$sqlQuery .= " ('','" . $IP . "'),";
			}
		}
		$sqlQuery = substr( $sqlQuery , 0 , -1 ) . ';';
		Core::getDatabase()->query( $sqlQuery );
	}

	/**
	 * Executes this cronjob.
	 *
	 * @return Bengine_Cronjob_UpdateTORIPs
	 */
	protected function _execute()
	{
		$this->updateIPs();
		return $this;
	}
}
?>
