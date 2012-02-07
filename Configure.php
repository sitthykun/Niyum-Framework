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
 @todo system configuration
 */

//defined(MYPAGE) or die(ACCESS_DENIE);
if (MYPAGE) {} else {echo ACCESS_DENIE;}

class Configure {
	// database
	const DB_NAME 		= 'databasename';
	const DB_PASSWORD 	= '123456';
	const DB_TYPE 		= 'mysql';
	const DB_USER 		= 'root';
	// mail
	const EMAIL			= 'info@niyum.com';
	const EMAILSMTP		= 'smtp.niyum.com';
	const EMAILPOP3		= 'pop3.niyum.com';
	// ftp
	const FTP_USER 		= '127.0.0.1';
	const FTP_PASSWORD 	= '';
	const HOST 			= 'localhost';
	// path
	const PATH			= '/var/www/niyum/';
	const PREFIX_TABLE 	= 'n_';
	const SITE 			= 'http://niyum.com/';		// important
	// memcache server
	const MEMCACHEPORT	= 11211;
	const MEMCACHECOMPRESS = false;
	const MEMCACHEEXPIRE = null;
	// secure key
	const KEYSECRET 	= 'ieu_';
	// append extension
	const EXSTENSION	= '.html';						// i.e: .html, .htm

}

?>
