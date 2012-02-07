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
 @todo core class
 */

// detect our page anti hack ...
if (MYPAGE) {} else {echo ACCESS_DENIE;};

class Niyum extends Exception {
	/**
	 * @todo declare objects
	 */
	private $board			= 'board';
	private $page			= 'pg';
	// tools
	private $am				= null;

	/**
	 * @todo initialize object
	 * @author sitthykun
	 */
	public function Niyum() {
		// load home page
		$this->loadPage();
	}

	/**
	 * @todo clean object from memory
	 * @author sitthykun
	 */
	public function __destruct() {
		echo '';
	}

	/**
	 * @todo get class file
	 * @author sitthykun
	 * @return string of class file
	 */
	public function getClassFile() {
		return __FILE__;
	}

	/**
	 * @todo get class name
	 * @author sitthykun
	 * @return string of class name
	 */
	public function getClassName() {
		return __CLASS__;
	}

	/**
	 * @todo get line number
	 * @author sitthyun
	 * @return number of line when error
	 */
	public function getLineNumber() {
		return __LINE__;
	}

	/**
	 * @todo get object
	 * @author sitthykun
	 * @return string
	 */
	public function __toString() {
		return __CLASS__;
	}

	/**
	 * @todo check directory from url
	 * @author sitthykun
	 * @param string $directory
	 */
	private function checkBoard($board) {
		if (isset($_GET[$board])) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * @todo check page only from url
	 * @author sitthykun
	 * @param string $page
	 */
	private function checkPage($page) {
		if (isset($_GET[$page])) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * @todo cut string
	 * @author sitthykun
	 * @param string as url
	 */
	private function depatcher($url) {
		echo $url;
	}

	/**
	 * @todo get page only from url
	 * @author sitthykun
	 * @param string $page 
	 */
	private function getBoard($board) {
		if ($this->checkBoard($board)) {
			return $_GET[$board];
		} else {
			return null;
		}
	}

	/**
	 * @todo get class name from page
	 * @author sitthykun
	 * @param string of $page
	 */
	private function getClassNameOfPage($page) {
		$className = '';
		// extract page
		$dispatcher = explode(DS, $page);
		foreach ($dispatcher as $value) {
			$className .= ucfirst($value);
		}
		// return class name
		return $className;
	}

	/**
	 * @todo get class path
	 * @author sitthykun
	 * @param string $page
	 */
	private function getClassPath($page) {
		$path = '';
		// extract folder
		$dispatcher = explode(DS, $page);
		// remove the latest path
		unset($dispatcher[count($dispatcher) - 1]);
		// get
		foreach ($dispatcher as $value) {
			$path .= $value . DS;
		}		
		// return path
		return $path;
	}

	/**
	 * @todo get page only from url
	 * @author sitthykun
	 * @param string $page
	 */
	private function getPage($page) {
		if ($this->checkPage($page)) {
			return $_GET[$page];
		} else {
			return null;
		}
	}

	/**
	 * @todo import controller class
	 * @author sitthykun
	 * @param string $fileName
	 */
	private function importController($fileName) {
		if (file_exists($fileName)) {
			require_once($fileName);
		}
	}

	/**
	 * @todo folder
	 * @author sitthykun 
	 */
	private function loadBoard() {
		
	}

	/**
	 * @todo load library in library
	 * @author sitthykun
	 * @param string $name
	 */
	public function loadLibrary($name) {
		
	}

	/**
	 * @todo get load page from page folder
	 * @author sitthykun
	 */
	private function loadPage() {
		// instance route
		$router = new Router();
		// store url
		$controllerPage =  '';
		// validate
		// if pg = '' => point to home views/page
		if ($this->checkPage($this->page)) {
			// find class
			$className = '';
			// validate page
			if ($this->getPage($this->page) != INDXPG) {
				// get class name
				$className = $this->getClassNameOfPage($this->getPage($this->page));
				// load library
				if (file_exists(Configure::PATH . VW . DS . PAGES . DS . $this->getClassPath($this->getPage($this->page)) . CTRL . DS . $className . XTSN)) {
					require_once(Configure::PATH . VW . DS . PAGES . DS . $this->getClassPath($this->getPage($this->page)) . CTRL . DS . $className . XTSN);
				} else if (file_exists(Configure::PATH . VW . DS . PAGES . DS . Constants::FRONT . DS . $this->getClassPath($this->getPage($this->page)) . CTRL . DS . $className . XTSN)) {
					require_once(Configure::PATH . VW . DS . PAGES . DS . Constants::FRONT . DS . $this->getClassPath($this->getPage($this->page)) . CTRL . DS . $className . XTSN);
				} else if (file_exists(Configure::PATH . VW . DS . PAGES . DS . Constants::MANAGER . DS . $this->getClassPath($this->getPage($this->page)) . CTRL . DS . $className . XTSN)) {
					require_once(Configure::PATH . VW . DS . PAGES . DS . Constants::MANAGER . DS . $this->getClassPath($this->getPage($this->page)) . CTRL . DS . $className . XTSN);
				} else {
					// call error page
					require_once(Configure::PATH . 'error' . XTSN);
				}
			} else {
				// customs front
				$className = ucfirst(Constants::FRONT) . $this->getClassNameOfPage($this->getPage($this->page));
				// call library
				if (file_exists(Configure::PATH . VW . DS . PAGES . DS . Constants::FRONT . DS . $this->getClassPath($this->getPage($this->page)) . CTRL . DS . $className . XTSN)) {
					require_once(Configure::PATH . VW . DS . PAGES . DS . Constants::FRONT . DS . $this->getClassPath($this->getPage($this->page)) . CTRL . DS . $className . XTSN);
				} else {
					// call error page
					require_once(Configure::PATH . 'error' . XTSN);
				}
			}
			// load class and instance
			new $className();
		} else {
			// append index to url if it displays tet.com/ => tet.com/index
			//$router->gotoPage($router->getCurrentURL() . INDXPG);
			// customs front
			$className = ucfirst(Constants::FRONT) . ucfirst(INDXPG) . $this->getClassNameOfPage($this->getPage($this->page));
			// call library
			if (file_exists(Configure::PATH . VW . DS . PAGES . DS . Constants::FRONT . DS . $this->getClassPath($this->getPage($this->page)) . CTRL . DS . $className . XTSN)) {
				require_once(Configure::PATH . VW . DS . PAGES . DS . Constants::FRONT . DS . $this->getClassPath($this->getPage($this->page)) . CTRL . DS . $className . XTSN);
			} else {
				// call error page
				require_once(Configure::PATH . 'error' . XTSN);
			}
			// load class and instance
			new $className();			
		}
	}

	/**
	 * @todo get post parameter from only from url
	 * @author sitthykun
	 * @param string $page 
	 */
	private function postPage() {
		if (isset($_POST[$get])) {
			return $_POST[$get];
		} else {
			return false;
		}
	}

	/**
	 * @todo test object of niyum
	 * @author sitthykun
	 */
	private function test() {
		echo 'test';
	}



}

?>