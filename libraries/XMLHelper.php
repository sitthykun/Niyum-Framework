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
 @todo IO
 */

if (MYPAGE) {} else {echo ACCESS_DENIE;};

class XMLHelper {
	private $elements	= null;			// array object of xml tags
	private $fileName	= null;			// name of xml file
	
	/**
	 * @todo constructor
	 * @author sitthykun
	 * @param string $fileName
	 */
	public function XMLHelper($fileName = null) {
		if ($fileName != null && file_exists($fileName)) {
			$this->fileName = $fileName;
			$this->attach();
		}
	}

	/**
	 * @todo add new element
	 * @author sitthykun
	 * @param string $text
	 * @param string $content
	 */
	public function addNewElement($text, $content) {
		
	}

	/**
	 * @todo load xml element to element object of class
	 * @author sitthykun
	 */
	public function attach() {
		$xmlFileData = file_get_contents($this->fileName);
		$xmlData = new SimpleXMLElement($xmlFileData);
		// instance array object
		$this->elements = array();
		$temp = $xmlData->children();
		// assign elements of xml into this->elements array
		foreach ($temp as $key => $value) {
			$this->elements[$key] = $value;
		}
	}

	/**
	 * @todo print data and json on javascript
	 * @author sitthykun
	 * @param string $jsonObjectName
	 */
	public function generateJSON($jsonObjectName = null) {
		// validate array object that stored xml data or elements
		if ($this->elements != null) {
			// create json string to store structure of json
			$json = '';
			// extract data from array to json
			foreach ($this->elements  as $key => $value) {
				if ($json != '') {
					$json .= ',';
				}
				// assign
				$json .= '"' . $key . '":"' . $value . '"';
			}
			// append json structure
			$json = '{' . $json . '}';
			// append object name
			if ($jsonObjectName != null) {
				$json = 'var ' . $jsonObjectName . ' = ' . $json;
			}
			// output json to client side
			echo $json . ';';
		}
	}

	/**
	 * @todo get content from xml object
	 * @author sitthykun
	 * @param string $name
	 */
	public function getItemContent($name) {
		// find content in xml file or object
		if ($this->elements[$name] != null) {
			return $this->elements[$name];
		}

		return '';
	}

	/**
	 * @todo get path and file name
	 * @author sitthykun
	 * @return string
	 */
	public function getFileName() {
		return $this->fileName;
	}

	/**
	 * @todo print content which got from Constant
	 * @author sitthykun
	 * @param string constance of $content
	 */
	public function printItemContent($content) {
		echo $this->getItemContent($content);
	}

	/**
	 * @todo assign xml object to class
	 * @author sitthykun
	 * @param object of XML as $element
	 */
	public function setElement($element) {
		if ($element != null) {
			$this->elements = $element;
		}
	}

	/**
	 * @todo set new file
	 * @author sitthykun
	 * @param string $file
	 */
	public function setFile($fileName) {
		if (file_exists($fileName)) {
			$this->fileName = $fileName;
		}
	}

	/**
	 * @todo assign path and file name
	 * @author sitthykun
	 * @param string $path and file name
	 */
	public function setFileName($fullFileName) {
		$this->fileName = $fullFileName;
	}



}


?>