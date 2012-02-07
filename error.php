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

/**
 * @todo print file not found
 * @author sitthykun
 */
function fileNotFound() {
	echo '<h1>File not found!</h1>';
}
/**
 * @todo print error on server
 * @author sitthykun
 */
function fileErrorOnServer() {
	echo '<h1>Sorry our server maybe down!</h1>';
}

/**
 * @todo check error type
 * @author sitthykun
 */
if (isset($_GET['type'])) {
	switch($_GET['type']) {
		case 401:
			break;
		case 402:
			break;
		case 403:
			break;
		case 404:
			fileNotFound();
			break;
		case 500:
			fileErrorOnServer();
			break;
		default:
			fileNotFound();
	}
} else {
	fileNotFound();
}



?>
