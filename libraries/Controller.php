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

if (MYPAGE) {} else {echo ACCESS_DENIE;};

abstract class Controller {
	private $task		= 'task';				// variable name of post
	/**
	 * @todo switch task
	 * @author sitthykun
	 */
	abstract function task();

	/**
	 * @todo get current path of directory
	 * @author sitthykun
	 */
	protected function getCurretPath() {
		return getcwd();
	}

	/**
	 * @todo get value from post of task
	 * @author sitthykun
	 */
	protected function getTask() {
		// switch task
		if (isset($_POST[$this->task])) { 
			return $_POST[$this->task];
		} else if (isset($_GET['?' . $this->task])) {
			return $_GET['?' . $this->task];
		} else {
			return NULL;
		}
	}

	/**
	 * @todo get variable task
	 * @author sitthykun
	 * @return task name
	 */
	protected function getVarTask() {
		return $this->task;
	}

	/**
	 * @todo load model class
	 * @author sitthykun
	 */
	protected function loadModel() {
		$model = new Model();
	}

	/**
	 * @todo load view page
	 * @author sitthykun
	 * @param string $fileName
	 */
	protected function loadView($fileName) {
		$view = new View();
		$view->loadPage($this->getCurretPath() . DS . VWP . DS . $fileName);
		// clear object
		$view = null;
	}

	/**
	 * @todo load view page without exstension
	 * @author sitthykun
	 * @param string $fileName
	 */
	protected function loadViewExt($fileName) {
		$view = new View();
		$view->loadPage($this->getCurretPath() . DS . VWP . DS . $fileName . XTSN);
		// clear object
		$view = null;
	}


}


?>