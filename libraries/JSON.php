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

final class JSON {
		
	/**
	 * @todo decode from json
	 * @author sitthykun
	 * @return string
	 * @param string $value
	 */
	public static function decode($value) {
		return json_decode($value);
	}
	
	/**
	 * @todo encode to json
	 * @author sitthykun
	 * @return string as json data
	 * @param string $value
	 */
	public static function encode($value) {
		return json_encode($value);
	}

	/**
	 * @todo convert data json from php to json in javascript
	 * @author sitthykun
	 * @return string
	 * @param string $JsonVariable
	 */
	public static function generateJSONToClient($JsonVariable = null) {
		if ($JsonVariable != null) {
			return $JsonVariable . '=';	
		}

		return '';
	}

	/**
	 * @todo print json from generateJSONToClient
	 * @author sitthykun
	 * @param string $JsonVariable
	 */
	public static function printJSONClient($JsonVariable) {
		$instance = new JSON();
		echo $instance->generateJSONToClient($JsonVariable);
	}

}

?>