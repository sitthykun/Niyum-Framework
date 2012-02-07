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
 @copyright Niyum Technology
 @version 1.0
 @todo 
 */

if (MYPAGE) {} else {echo ACCESS_DENIE;};

final class Languages extends XMLHelper {
	
	/**
	 * @todo declare variable 
	 */
	private $languageID = 1;		// default value of language
	
	/**
	 * @todo constructor
	 * @author sitthykun
	 * @param integer $languageID
	 */ 
	public function Languages($languageID) {
		// set language id
		$this->setLanguageID($languageID);
		// load contents
		$this->loadContents();
	}
	
	/**
	 * @todo get text from xml
	 * @author sitthykun
	 * @param string $text
	 */
	public function getText($text) {
		return $this->getItemContent($text);
	}
	
	/**
	 * @todo load contents from xml via language id
	 * @author sitthykun
	 */
	public function loadContents() {
		switch($this->languageID) {
			case 2:
				break;
			case 1: default:
				$this->setFile(Configure::PATH . LNG . DS . 'lang_en.xml');
		}
	}
	
	/**
	 * @todo set language id via language id 
	 * @author sitthykun
	 * @param integer $languageID
	 */
	public function setLanguageID($languageID) {
		$this->languageID = $languageID;
	}
	
	/**
	 * @todo set text to xml
	 * @author sitthykun
	 * @param string $text
	 * @param object $value
	 */
	public function setText($text, $value) {
		// $this->set
	}
	
	/**
	 * @todo print text
	 * @author sitthykun
	 * @param string $text
	 */
	public function text($text) {
		$this->printItemContent($text);
	}


}

?>