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
 @version 1.0
 @todo create constants by yourself
 */

if (!MYPAGE) exit(ACCESS_DENIE);

final class Constants {
    // fix
    const FRONT         	= 'front';		// module front
    const MANAGER			= 'manager';	// module manager
    const INFO_EMAIL		= 'info@niyum.com';
    const SELLER_EMAIL		= 'sale@niyum.com';
    const SELLER_BACKUP_EMAIL = 'ly.sitthykun@gmail.com';

    const MANAGER_ASSIGNTASK = 'assignTask'; // use in admin page
    const MANAGER_ASSIGNTASK_DELETE = 'delete'; // use in admin page
    const MANAGER_ASSIGNTASK_NEW = 'new'; // use in admin page
    const MANAGER_ASSIGNTASK_NONE = 'none'; // use in admin page
    const MANAGER_ASSIGNTASK_SELECT = 'select'; // use in admin page
    const MANAGER_ASSIGNTASK_UPDATE = 'update'; // use in admin page
    const MANAGER_ASSIGNTASK_LOAD = 'update'; // use in admin page
}

?>