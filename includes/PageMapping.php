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
 @copyright Niyum Solutions
 @version 2.0
 */

if (!MYPAGE) exit(ACCESS_DENIE);

final class PageMapping {

	/**
	 * @todo declare field
	 */
	private $uris;

	/**
	 * @todo initialize uris as array
	 * @author sitthykun
	 */
	function PageMapping() {
		$this->uris = array();
	}

	/**
	* @todo get class name by key
	* @author sitthykun
	* @param string $key
	*/
	public function getClassByKey($key) {
		return $this->uris[$key];
	}

	/**
	 * @todo match uri with class name
	 * @author sitthykun
	 * @return array
	 */
	public function getMapping() {
		// assign uri and class path
		$this->uris['index'] = 'FrontPage';
		// message
		return $this->uris;
	}	

}


?>