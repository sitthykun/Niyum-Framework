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
 @author Sitthykun LY, email: ly.sitthykun@gmail.com, http://www.niyum.com
 @since 2010
 @copyright Niyum Technology
 @version 1.0
 @todo Router URL
 */

if (MYPAGE) {} else {echo ACCESS_DENIE;};

class Router {
	/**
	 * @todo declare variable
	 */
	private $url = '';

	/**
	 * @todo instance object
	 * @author sitthykun
	 * @param string $url
	 */
	public function Router($url = null) {
		if ($url != null) {
			$this->url = $url;
		}
	}

	/**
	 * @todo clean object
	 * @author sitthykun 
	 */
	public function __destruct() {
		echo '';
	}

	/**
	 * @todo cut url
	 * @author sitthykun
	 * @param string $url
	 */
	public function depatcher($url, $level = -1) {
		$depatch = '';
		
		return $depatch;
	}

	/**
	 * @todo get path and file name of this class
	 * @author sitthykun
	 * @return string
	 */
	public function getClassFile() {
		return __FILE__;
	}

	/**
	 * @todo get class name
	 * @author sitthykun
	 * @return string
	 */
	public function getClassName() {
		return __CLASS__;
	}

	/**
	 * @todo get number of line
	 * @author sitthykun
	 * @return number
	 */
	public function getLineNumber() {
		return __LINE__;	
	}

	/**
	 * @todo show class name
	 * @author sitthykun
	 * @return string
	 */
	public function __toString() {
		return __CLASS__;
	}

	/**
	 * @todo add parameter to url
	 * @author sitthykun
	 */
	public  function addParameters() {
		
	}

	/**
	 * @todo clean parameter
	 * @author sitthykun
	 */
	public function cleanURL() {
		
	}

	/**
	 * @todo get URL for configuration
	 * @author sitthykun
	 * @return string of base url
	 */
	public function getBaseURL() {
		// check slash in the end of string e.g. http://niyum.com/test/ => /
		if (substr(Configure::SITE, -1) == DS) {
			return Configure::SITE;
		}

		return Configure::SITE . DS;
	}

	/**
	 * @todo get URL
	 * @author sitthykun
	 * @return string current base of URL
	 */
	public function getCurrentURL() {
		// extrace
		$nodes = explode(DS, $this->getPageURL());
		$base =  '';
		for ($i = 0; $i < count($nodes) - 1; $i++) {
			$base .= $nodes[$i] . DS; 
		}

		return trim($base);
	}

	/**
	 * @todo get address name
	 * @author sitthykun
	 * @return string of address
	 */
	public function getIPAddress() {
		return $_SERVER['SERVER_ADDR'];
	}

	/**
	 * @todo get all parameters
	 * @author sitthykun
	 * @param string $get
	 */
	public function getParameters($gets) {
		// validate
		if (isset($_GET[$get])) {
			return $_GET[$get];
		}
		// nothing
		return null;
	}

	/**
	 * @todo get base path
	 * @author sitthykun
	 * @return string of base path
	 */
	public function getPagePath() {
		return VW . DS . PAGES . DS;
	}

	/**
	 * @todo get base path of front
	 * @author sitthykun
	 * @return string of base path
	 */
	public function getPageFrontPath() {
		return $this->getPagePath() . Constants::FRONT . DS;
	}

	/**
	 * @todo get base path of manager
	 * @author sitthykun
	 * @return string of base path
	 */
	public function getPageManagerPath() {
		return $this->getPagePath() . Constants::MANAGER . DS;
	}

	/**
	 * @todo get current Page of the URL
	 * @author sitthykun
	 * @return current page of URL
	 */
	public function getPageURL() {
		// define protocol
		$pageURL = 'http';
		// check protocol whether https or http
		if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
			$pageURL .= 's';
		}
		// define string after protocol
		$pageURL .= '://';
		// chech port
		if ($_SERVER['SERVER_PORT'] != '80') {
			$pageURL .= $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI'];
		} else {
			$pageURL .= $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
		}
		// return current page
		return $pageURL;
	}

	/**
	 * @todo get current url
	 * @author sitthykun
	 * @return string of url
	 */
	public function getPathAndScriptName() {
		return $_SERVER['SCRIPT_FILENAME'];
	}

	/**
	 * @todo get port name
	 * @author sitthykun
	 * @return integer port
	 */
	public function getPort() {
		return $_SERVER['SERVER_PORT'];
	}

	/**
	 * @todo get protocol name
	 * @author sitthykun
	 * @return string of protocol
	 */
	public function getProtocol() {
		$protocol = 'http';
		if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
			return $protocol . 's';
		}

		return $protocol;
	}

	/**
	 * @todo get protocol version
	 * @author sitthykun
	 * @return string of protocol
	 */
	public function getProtocolVersion() {
		return $_SERVER['SERVER_PROTOCOL'];
	}

	/**
	 * @todo get script name
	 * @author sitthykun
	 * @return string of file name
	 */
	public function getScriptName() {
		return $_SERVER['SCRIPT_NAME'];
	}

	/**
	 * @todo goto page via url parameter
	 * @author sitthykun
	 * @param $url
	 */
	public function gotoPage($url) {
		header('Location: ' . $url);
	}

	/**
	 * @todo output url from getBaseURL
	 * @author sitthykun
	 */
	public function printBaseURL() {
		echo $this->getBaseURL();
	}

	/**
	 * @todo output current page
	 * @author sitthykun
	 */
	public function printCurrentURL() {
		echo $this->getCurrentURL();
	}

	/**
	 * @todo output url of page
	 * @author sitthykun
	 */
	public function printPageURL() {
		echo $this->getPageURL();
	}

	/**
	 * @todo output url with extension of page
	 * @author sitthykun
	 * @param string $page default empty
	 */
	public function printPageURLWithExs($page = '') {
		echo $this->getPageURL() . $page . Configure::EXSTENSION;
	}

	/**
	 * @todo set url's parameters
	 * @author sitthykun
	 */
	public function setParameters() {
		
	}

	/**
	 * @todo print test
	 * @author sitthykun
	 */
	public function test() {
		echo 'Router Class ->test()';
	}


}

?>