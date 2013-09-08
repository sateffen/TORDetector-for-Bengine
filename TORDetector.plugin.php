<?php
/*
 *  Copyright (C) 2012 sateffen
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

class Plugin_TORDetector extends Recipe_PluginAbstract
{

	/**
	 * Defines basic plug in information.
	 *
	 * @return Plugin_Commercials
	 */
	public function __construct()
	{
		$this->pluginName = 'TORDetector';
		$this->pluginVersion = '1.0';
		return $this;
	}

	/**
	 * Checks wheather the user uses TOR and logs this
	 *
	 * @param Login	    The Login util
	 * @param string    Session URL
	 *
	 * @return Plugin_TORUserDetector
	 */
	public function onStartSession( Login $Login , $sessionURL )
	{
		$result = Core::getDatabase()->rowCount("SELECT * FROM `bengine_TORIPTable` WHERE IP=?",
												array(IPADDRESS));
		$result = 1;
		if ( $result > 0 ) {
			Core::getDatabase()->query("INSERT INTO`bengine_TORUserLog` (`ID`,`UserID`,`IP`,`Timestamp`)
										VALUES (NULL,?,?,?);",
										array($Login->getUserId(), IPADDRESS, time()));
		}
		return $this;
	}
}

Hook::addHook( "StartSession" , new Plugin_TORDetector() );
?>
