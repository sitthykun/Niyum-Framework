<?php
/**
* This file is part of Niyum Framework.
*
* Niyum Framework is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* Niyum Framework is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with Niyum Framework.  If not, see <http://www.gnu.org/licenses/>.
*/

/**
 * @version 1.1
 * @package dinke.net
 * @copyright &copy; 2008 Dinke.net
 * @author Dragan Dinic <dragan@dinke.net>
 */
class SniffUser {
	/**
	 * @description declare
	 */
	private $userAgent = '';

	/**
	 * @author sitthykun
	 */
	public function UserSniff() {
		$this->userAgent = $_SERVER['HTTP_USER_AGENT'];
	}

	/**
	 * Get browsername and version
	 * @param string user agent	 
	 * @return string browser name and version or false if unrecognized
	 * @static 
	 * @access public
	 */
	public function getBrowser() {
		$useragent = $this->userAgent;
		//check for most popular browsers first
		//unfortunately that's ie. We also ignore opera and netscape 8 
		//because they sometimes send msie agent
		if (strpos($useragent,"MSIE") !== false && strpos($useragent,"Opera") === false && strpos($useragent,"Netscape") === false) {
			//deal with IE
			$found = preg_match("/MSIE ([0-9]{1}\.[0-9]{1,2})/",$useragent, $mathes);
			if ($found) {
				return "Internet Explorer " . $mathes[1];
			}
		} else if (strpos($useragent,"Gecko")) {
			//deal with Gecko based
			
			//if firefox
			$found = preg_match("/Firefox\/([0-9]{1}\.[0-9]{1}(\.[0-9])?)/",$useragent,$mathes);
			if ($found) {
				return "Mozilla Firefox " . $mathes[1];
			}
			//if Netscape (based on gecko)
			$found = preg_match("/Netscape\/([0-9]{1}\.[0-9]{1}(\.[0-9])?)/",$useragent,$mathes);
			if ($found)	{
				return "Netscape " . $mathes[1];
			}
			//check chrome before safari because chrome agent contains both
			$found = preg_match("/Chrome\/([^\s]+)/",$useragent, $mathes);
			if ($found) {
				return "Google Chrome " . $mathes[1];
			}
			//if Safari (based on gecko)
			$found = preg_match("/Safari\/([0-9]{2,3}(\.[0-9])?)/",$useragent, $mathes);
			if ($found) {
				return "Safari " . $mathes[1];
			}
			//if Galeon (based on gecko)
			$found = preg_match("/Galeon\/([0-9]{1}\.[0-9]{1}(\.[0-9])?)/",$useragent,$mathes);
			if ($found) {
				return "Galeon " . $mathes[1];
			}
			//if Konqueror (based on gecko)
			$found = preg_match("/Konqueror\/([0-9]{1}\.[0-9]{1}(\.[0-9])?)/",$useragent,$mathes);
			if ($found) {
				return "Konqueror " . $mathes[1];
			}		

			//no specific Gecko found
			//return generic Gecko
			return "Gecko based";					
		} elseif(strpos($useragent,"Opera") !== false) {
			//deal with Opera
			$found = preg_match("/Opera[\/ ]([0-9]{1}\.[0-9]{1}([0-9])?)/",$useragent,$mathes);
			if($found) {
				return "Opera " . $mathes[1];
			}
		} elseif (strpos($useragent,"Lynx") !== false) {
			//deal with Lynx			
			$found = preg_match("/Lynx\/([0-9]{1}\.[0-9]{1}(\.[0-9])?)/",$useragent,$mathes);
			if ($found) {
				return "Lynx " . $mathes[1];
			}
			
		} elseif (strpos($useragent,"Netscape") !== false) {
			//NN8 with IE string
			$found = preg_match("/Netscape\/([0-9]{1}\.[0-9]{1}(\.[0-9])?)/",$useragent,$mathes);
			if ($found) {
				return "Netscape " . $mathes[1];
			}
		} else {
			//unrecognized, this should be less than 1% of browsers (not counting bots like google etc)!
			return false;
		}
	}
	
	/**
	 * Get browsername and version
	 * @param string user agent	 
	 * @return string os name and version or false in unrecognized os
	 * @static 
	 * @access public
	 */
	public function getOS() {
		$useragent = strtolower($this->userAgent) . "";		
		//winxp
		if (strpos($useragent,"windows nt 5.1") !== false)	{
			return "Windows XP";			
		} elseif (strpos($useragent,"windows nt 6.0") !== false) {
			return "Windows Vista";
		} elseif (strpos($useragent,"windows 98") !== false) {
			return "Windows 98";
		} elseif (strpos($useragent,"windows nt 5.0") !== false) {
			return "Windows 2000";
		} elseif (strpos($useragent,"windows nt 5.2") !== false) {
			return "Windows 2003 server";
		} elseif (strpos($useragent,"windows nt 6.0") !== false) {
			return "Windows Vista";
		} elseif (strpos($useragent,"windows nt 6.1") !== false) {
			return "Windows Seven";
		} elseif (strpos($useragent,"windows nt") !== false) {
			return "Windows NT";
		} elseif (strpos($useragent,"win 9x 4.90") !== false && strpos("$useragent","win me")) {
			return "Windows ME";
		} elseif (strpos($useragent,"win ce") !== false) {
			return "Windows CE";
		} elseif (strpos($useragent,"win 9x 4.90") !== false)	{
			return "Windows ME";
		} elseif (strpos($useragent,"iphone") !== false) {
			return "iPhone";
		} elseif (strpos($useragent,"mac os x") !== false) {
			return "Mac OS X";
		} elseif (strpos($useragent,"macintosh") !== false) {
			return "Macintosh";
		} elseif (strpos($useragent,"linux") !== false) {
			return "Linux";
		} elseif (strpos($useragent,"freebsd") !== false)	{
			return "Free BSD";
		} elseif (strpos($useragent,"symbian") !== false)	{
			return "Symbian";
		} else {
			return false;
		}
	}

	/**
	 * @todo get ip user
	 * @author sitthykun
	 * @return string of ip 
	 */
	public function getIP() {
		preg_match("/(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})/", $_SERVER['REMOTE_ADDR'], $ip);
		return $ip[0];
	}

	/**
	 * @todo get time zone
	 * @author sitthykun
	 * @return string of ip
	 */
	public function getTimezone() {
		
	}

}

?>