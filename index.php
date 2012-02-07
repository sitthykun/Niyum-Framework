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

// prevent hacker
define('ACCESS_DENIE', 'access denied ...');
define('MYPAGE', '_Niyum_');

// include configuration file
require_once('Configure.php');
require_once('libraries/General.php');

// start application
$niyum = new Niyum();

?>
