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
 */

class Utilities {
	/**
	 * @todo convert string to url. it means append href
	 * @author sitthykun
	 * @param string $text
	 * @param string $target
	 * @param string $className for client side
	 */
	public static function convertURLToLink($text, $target = null, $className = null) {
		// pattern
		$pattern = '/\b((http[s]?|ftp):\/\/[^\s]+)/';
		// validate target link
		if ($target == null) {
			$target = '_blank';
		}
		$target = ' target="' . $target . '" '; 
		// got class name
		if ($className == null) {
			$className = '';
		}
		$className = ' class="' . $className . '" ';
		// find
		preg_match($pattern, $text, $newText);
		// replace
		$hypertext = '<a href="' . $newText[0] . '" ' . $target . $className . ' >' . $newText[0] . '</a>';
		$result = preg_replace($pattern, $hypertext, $text);
		// reture new string
		return $result;
	}

	/**
	 * @todo decode data from json to mix
	 * @author sitthykun
	 * @param string $data
	 * @param integer $assoc
	 * @param integer $depth
	 */
	public static function decodeJson($data, $assoc = null, $depth = null) {
		return json_decode($data, $assoc, $depth);
	}

	/**
	 * @todo decrypt data
	 * @author sitthykun
	 * @return string
	 * @param string $value
	 */
	public static function decrypt($value) {
		
	}

	/**
	 * @todo convert data to json
	 * @author sitthykun
	 * @return string of json
	 * @param data as string
	 * @param prefix of json
	 */
	public static function encodeJson($data, $option) {
		return json_encode($data, $option);
	}

	/**
	 * @todo encrypt data
	 * @author sitthykun
	 * @return string
	 * @param string $value
	 */
	public static function encrypt($value) {
		
	}

	/**
	 * @todo convert to serialize
	 * @author sitthykun
	 * @param object $value
	 */
	public static function serialize($value) {
		return serialize($value);
	}

	/**
	 * @todo reconvert data from serialize
	 * @author sitthykun
	 * @param string $string as serialize
	 */
	public static function unserialize($string) {
		return unserialize($string);
	}

}


?>
