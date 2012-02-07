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

class View {
	// declare field
	private $css	= null;
	private $cssCmnt= null;
	private $js		= null;
	private $jsCmnt	= null;
	private $meta	= null;
	private $title	= null;
	private $error	= 'FILE_NOT_FOUND';

	/**
	 * @todo constructor
	 * @author sitthykun
	 */
	public function View() {
		// initialize fields
		$this->css	= array();
		$this->js	= array();
		$this->meta	= array();
		$this->title= '';
		
	}

	/**
	 * @todo clon object
	 * @author sitthykun
	 */	
	public function __clone() {
		
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
	 * @todo add to bottom page e.g. (page1.php, page2.php, ....)
	 * @author sitthykun
	 * @param string $file
	 * @param integer $index (optional)
	 */
	public function addFooter($file, $index = null) {
		
	}

	/**
	 * @todo add to top page e.g. (page1.php, page2.php, ....)
	 * @author sitthykun
	 * @param string $file
	 * @param integer $index (optional)
	 */
	public function addHeader($file, $index = null) {
		if (file_exists($file)) {
			if ($index != null) {
				$this->am->insertItem($file, $index);
			} else {
				$this->headerPages[] = $file;
			}
		}
	}

	/**
	 * @todo add javascript file into javascript object of Views Class as queue
	 * @author sitthykun
	 * @param string $file
	 */
	public function addJavascript($file = null) {
		if (file_exists(getcwd() . DS . $file)) {
			$this->js[] = $file;
		} else {
			$this->js[] = $this->error;
		}
	}

	/**
	 * @todo add javascript file into javascript object of Views Class as queue
	 * @author sitthykun
	 * @param string $file
	 */
	public function addJavaScriptWithCommentBlock($JSComment) {
		$this->jsCmnt[] = $JSComment;
	}

	/**
	 * @todo add to array of meta as queue
	 * @author sitthykun
	 * @param string $text
	 */
	public function addMeta($text = null) {
		// validate parameter
		if ($text != null) {
			// pending...
			$this->meta[] = $text;
		}
	}

	/**
	 * @todo add to array of style as queue
	 * @author sitthykun
	 * @param string $file
	 */
	public function addStyleSheet($file = null) {
		if (file_exists($file)) {
			$this->css[] = $file;
		} else {
			$this->css[] = $this->error;
		}
	}

	/**
	 * @todo add to array of style as queue
	 * @author sitthykun
	 * @param string $file
	 */
	public function addStyleSheetWithComment($CSSComment) {
		$this->cssCmnt[] = $CSSComment;
	}

	/**
	 * @todo add title to document
	 * @author sitthykun
	 * @param $title
	 */
	public function addTitle($title) {
		$this->title = $title;
	}

	/**
	 * @todo get string load default directory of current module 
	 * @author sitthykun
	 * @param string $fileName
	 */
	public function getLoadDefault($fileName) {
		return IO::filterDirectoryName($fileName) . DS . DFLT . DS . DFLT . XTSN;
	}

	/**
	 * @todo get path of current page
	 * @author sitthykun
	 * @return string of current path
	 */
	public function getPath() {
		// make sure it will get corrected path
		return realpath(__CLASS__);
	}

	/**
	 * @todo print all document on head of html such as javascript, stylesheet, meta ...
	 * @author sitthykun
	 */
	public function loadHead() {
		$this->loadMetas();
		$this->loadTitle();
		$this->loadStyleSheets();
		$this->loadJavaScripts();
	}

	/**
	 * @todo print all javascripts
	 * @author sitthykun
	 */
	public function loadJavaScripts() {
		foreach($this->js as $javascript) {
			echo '<script type="text/javascript" language="javascript" src="' . $javascript . '" ></script>';
		}
	}

	/**
	 * @todo print all javascripts with comment block
	 * @author sitthykun
	 */
	public function loadJavaScriptsWithComment() {
		foreach($this->jsCmnt as $javascript) {
			echo $javascript;
		}
	}

	/**
	 * @todo load page from controller
	 * @author sitthykun
	 * @param string $fileName
	 */
	public function loadPage($fileName) {
		@session_start();
		// instance objects
		$router		= new Router();
		$session	= new SessionHelper();
		// load default
		// include_once($this->loadDefault . 'default/head.php');
		if (file_exists($this->getLoadDefault($fileName))) {
			// load default directory
			include_once($this->getLoadDefault($fileName));
		}
		// load file
		include_once($fileName);
	}

	/**
	 * @todo print all meta and keyword
	 * @author sitthykun
	 */
	public function loadMetas() {
		foreach ($this->meta as $meta) {
			echo '<meta' . $meta . ' />';
		}
	}

	/**
	 * @todo print all style sheets
	 * @author sitthykun
	 */
	public function loadStyleSheets() {
		foreach($this->css as $style) {
			echo '<link rel="stylesheet" type="text/css" href="' . $style . '" />';
		}
	}

	/**
	 * @todo print all style sheets with comment block
	 * @author sitthykun
	 */
	public function loadStyleSheetsWithComment() {
		foreach($this->cssCmnt as $style) {
			echo $style;
		}
	}

	/**
	 * @todo print title
	 * @author sitthykun
	 */
	public function loadTitle() {
		if ($this->title != '') {
			echo $this->title;
		}
	}

	/**
	 * @todo print base path of front
	 * @author sitthykun
	 * @return string of base path
	 */
	public function pageFrontPath() {
		$r = new Router();
		echo $r->getPagePath() . Constants::FRONT . DS;
		// clear memory
		$r = null;
	}

	/**
	 * @todo print base path of manager
	 * @author sitthykun
	 * @return string of base path
	 */
	public function pageManagerPath() {
		$r = new Router();
		echo $r->getPagePath() . Constants::MANAGER . DS;
		// clear memory
		$r = null;
	}

	/**
	 * @todo print base path
	 * @author sitthykun
	 * @return string of base path
	 */
	public function pagePath() {
		$r = new Router();
		echo $r->getPagePath();
		// clear memory
		$r = null;
	}

	/**
	 * @todo show testing
	 * @author sitthykun
	 */
	public function test() {
		echo  '<br/>method of View<br/>';
	}


}


?>