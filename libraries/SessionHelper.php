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

class SessionHelper extends ArrayHelper {
	/**
	 * @todo delete an elements
	 * @author sitthykun
	 * @param string or integer $key
	 */
	public function delete($key) {
		unset($_SESSION[$key]);
	}

	/**
	 * @todo destroy all key sessions
	 * @author sitthykun
	 */
	public function dispose() {
		session_destroy();
	}

	/**
	 * @todo check exist key in the session
	 * @author sitthykun
	 * @param string or integer $key
	 */
	public function isExisting($key) {
		return (boolean)isset($_SESSION[$key]);
	}

	/**
	 * @todo get data from session
	 * @author sitthykun
	 * @param string or integer $key
	 */
	public function read($key) {
		return $_SESSION[$key];
	}

	/**
	 * @todo set time limit to session
	 * @author sitthykun
	 * @param string or integer $key
	 * @param $time
	 */
	public function setKeyTime($key, $time) {
		
	}

	/**
	 * @todo write data to session via key
	 * @author sitthykun
	 * @param string $key
	 * @param object $value
	 */
	public function write($key, $value) {
		$_SESSION[$key] = $value;
	}
}


?>