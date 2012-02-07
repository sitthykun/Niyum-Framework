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
 @todo MySQL Class
 */
if (MYPAGE) {} else {echo ACCESS_DENIE;};

class MySQLFactory {
	/**
	 * @todo declare
	 */
	private $link = null;

	/**
	 * @todo constructor
	 * @author sitthykun
	 * @param string $host
	 * @param string $dbName
	 * @param string $dbUser
	 * @param string $dbPwd
	 */
	public function MySQLFactory($host, $dbName, $dbUser, $dbPwd) {
		$this->connect($host, $dbName, $dbUser, $dbPwd);
	}

	/**
	 * @todo clean object
	 * @author sitthykun
	 */
	public function __destruct() {
		
	}

	/**
	 * @todo get class name
	 * @author sitthykun
	 * @return string
	 */
	public function __toString() {
		return __CLASS__;
	}

	/**
	 * @todo close connection
	 * @author sitthykun
	 * @see libraries/daos/IDAO::close()
	 */
	public function close() {
		@mysql_close($this->link);
	}

	/**
	 * @todo connect database
	 * @author sitthykun
	 * @param string $host
	 * @param string $dbName
	 * @param string $dbUser
	 * @param string $dbUser
	 * @see libraries/daos/IDAO::connect()
	 */
	public function connect($host, $dbName, $dbUser, $dbPwd) {
		$this->link = @mysql_connect($host, $dbUser, $dbPwd);
		@mysql_select_db($dbName);
	}

	/**
	 * @todo where file is
	 * @author sitthykun
	 */
	public function freeResult() {
		@mysql_freeresult();
	}

	/**
	 * @todo where file is
	 * @author sitthykun
	 * @return string
	 * @see libraries/IObject::getClassFile()
	 */
	public function getClassFile() {
		return __FILE__;
	}

	/**
	 * @todo get class name
	 * @author sitthykun
	 * @return string
	 * @see libraries/IObject::getClassName()
	 */
	public function getClassName() {
		return __CLASS__;
	}

	/**
	 * @todo get number of line error
	 * @author sitthykun
	 * @return integer
	 * @see libraries/IObject::getLineNumber()
	 */
	public function getLineNumber() {
		return __LINE__;
	}

	/**
	 * @todo query and get resource
	 * @author sitthykun
	 * @return array
	 * @param string $sql
	 */
	public function getRecords($sql) {
		return $this->getResources($this->query($sql));
	}

	/**
	 * @todo get resource from query
	 * @author sitthykun
	 * @return array
	 * @see libraries/daos/IDAO::getResources()
	 */
	public function getResources($resource) {
		return @mysql_fetch_array($resource, MYSQL_ASSOC); // MYSQL_ASSOC, MYSQL_NUM, MYSQL_BOTH;
	}

	/**
	 * @todo query to database
	 * @author sitthykun
	 * @return object or array
	 * @see libraries/daos/IDAO::query()
	 */
	public function query($sql) {
		@mysql_query('SET names utf8');
		return @mysql_query($sql);
	}

}


?>