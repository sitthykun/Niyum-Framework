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

if (MYPAGE) {} else {echo ACCESS_DENIE;}
// declare constants for system
define('DS', 		'/');
define('LBR', 	'libraries');
define('LBRDAO',	LBR.DS.'daos');
define('INC', 	'includes');
define('CTRL',	'controllers');
define('MDL',		'models');
define('VW',		'views');
define('PAGES',	'pages');
define('VWP',		VW.DS.PAGES);
define('LNG',		'languages');
define('DFLT',	'default');
define('TASK',	'task');
define('INDXPG',	'index');
define('XTSN',	'.php');
// load classes
function __autoload($className) {
	// validate class
	if (file_exists(Configure::PATH . LBRDAO . DS . $className . XTSN)) {
		require_once (Configure::PATH . LBRDAO . DS . $className . XTSN);	
	} else if (file_exists(Configure::PATH . LBR . DS . $className . XTSN)) {
		require_once (Configure::PATH . LBR . DS . $className . XTSN);
	} else if (file_exists(Configure::PATH . CTRL . DS . $className . XTSN)) {
		require_once (Configure::PATH . CTRL . DS . $className . XTSN);
	} else if (file_exists(Configure::PATH . MDL . DS . $className . XTSN)) {
		require_once (Configure::PATH . MDL . DS . $className . XTSN);
	} else if (file_exists(Configure::PATH . VW . DS . $className . XTSN)) {
		require_once (Configure::PATH . VW . DS . $className . XTSN);
	} else if (file_exists(Configure::PATH . INC . DS . $className . XTSN)) {
		require_once (Configure::PATH . INC . DS . $className . XTSN);
	}

}



?>