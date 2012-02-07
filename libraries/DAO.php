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
 @todo database access object
 */

if (MYPAGE) {} else {echo ACCESS_DENIE;};

class DAO extends NSQL {
	/**
	 * @todo declare
	 */
	private $dao = null;

	/**
	 * @todo constructor
	 */
	public function DAO() {
		$this->switchDatabase();
	}

	/**
	 * @todo destroy object
	 */
	public function __destruct() {
		
	}

	/**
	 * @todo get object
	 */
	public function __toString() {
		return __CLASS__;
	}

	/**
	 * @todo get class name
	 */
	public function getClassName() {
		return __CLASS__;
	}

	/**
	 * @todo get class file
	 */
	public function getClassFile() {
		return __FILE__;
	}

	/**
	 * @todo count all records in the table
	 * @author sitthykun
	 * @return integer
	 */
	public function count($table) {
		return $this->query(NSQL::SELECT . 'count(*)' . NSQL::FROM . $table);
	}

	/**
	 * @todo delete data to database
	 * @author sitthykun
	 * @param string $table
	 * @param string $where
	 */
	protected function delete($table, $where = null) {
		if ($where != null) {
			$this->query(NSQL::DELETE . NSQL::FROM . $table . NSQL::WHERE . $where);
		}
		$this->query(NSQL::DELETE . NSQL::FROM . $table);
	}

	/**
	 * @todo get data as array via query
	 * @author sitthykun
	 * @param string $sql
	 */
	public function getArrayOfQuery($sql) {
		//$instance = new DAO();
		$records = array();
		// validate datatype
		if (Configure::DB_TYPE == IDAOType::MYSQL) {
			$resource = $this->dao->query($sql);
			while($row = $this->dao->getResources($resource)) {
				array_push($records, $row);
			}
			return $records;
		} else {
			return null;
		}
	}

	/**
	 * @todo insert data to database
	 * @author sitthykun
	 * @param string $table
	 * @param string $value
	 * @param string $fields
	 */
	protected function insert($table, $value, $fields = null) {
		if ($fields != null) {
			$this->query(NSQL::INSERT .  $table .NSQL::BLEFT . $fields . NSQL::BRIGHT . NSQL::VALUES . NSQL::BLEFT . $value . NSQL::BRIGHT);
		}

		$this->query(NSQL::INSERT . $table . NSQL::VALUES . NSQL::BLEFT . $value . NSQL::BRIGHT);
	}

	/**
	 * @todo insert data to database and prevent duplicate item
	 * @author sitthykun
	 * @param string $table
	 * @param string $value
	 * @param string $fields
	 */
	protected function insertIgnore($table, $value, $fields = null) {
		if ($fields != null) {
			$this->query(NSQL::INSERTIGNORE .  $table .NSQL::BLEFT . $fields . NSQL::BRIGHT . NSQL::VALUES . NSQL::BLEFT . $value . NSQL::BRIGHT);
		}

		$this->query(NSQL::INSERTIGNORE . $table . NSQL::VALUES . NSQL::BLEFT . $value . NSQL::BRIGHT);
	}

	/**
	 * @todo query
	 * @author sitthykun
	 * @return array or none
	 * @param string $sql
	 */
	protected function query($sql) {
		// validate
		if (Configure::DB_TYPE == IDAOType::MYSQL) {
			return $this->ado->query($sql);
		}
		// validate $sql statement
		$this->ado->query($sql);
	}

	/**
	 * @todo display data from database
	 * @author sitthykun
	 * @return array of records
	 * @param string $table
	 * @param string $fields
	 * @param string $where
	 * @param string $limit
	 */
	protected function select($table, $fields = '*', $where = null, $limit = null) {
		// validate
		if ($limit != null) {
			return $this->query(NSQL::SELECT . $fields . NSQL::FROM . $table . NSQL::WHERE . $where . NSQL::LIMIT . $limit);
		}

		return $this->query(NSQL::SELECT . $fields . NSQL::FROM . $table . NSQL::WHERE . $where);
	}

	/**
	 * @todo instance object of sql factory
	 * @author sitthykun
	 */
	private function switchDatabase() {
	// discuss
		switch (Configure::DB_TYPE) {
			case IDAOType::MYSQL		:
				$this->dao = new MySQLFactory(Configure::HOST, Configure::DB_NAME, Configure::DB_USER, Configure::DB_PASSWORD);
				break;
			case IDAOType::MSSQL		:
				$this->dao = new MsSQL(Configure::HOST, Configure::DB_NAME, Configure::DB_USER, Configure::DB_PASSWORD);
				break;
			case IDAOType::ORACLE		:
				$this->dao = new Oracle(Configure::HOST, Configure::DB_NAME, Configure::DB_USER, Configure::DB_PASSWORD);
				break;
			case IDAOType::POSGRESQL	:
				$this->dao = new PosgreSQL(Configure::HOST, Configure::DB_NAME, Configure::DB_USER, Configure::DB_PASSWORD);
				break;
			case IDAOType::FIREBIRD		:
				$this->dao = new Firebird(Configure::HOST, Configure::DB_NAME, Configure::DB_USER, Configure::DB_PASSWORD);
				break;
			case IDAOType::SQLITE		:
				$this->dao = new SQLite(Configure::HOST, Configure::DB_NAME, Configure::DB_USER, Configure::DB_PASSWORD);
				break;
			default:
				break;
		}
	}

	/**
	 * @todo remove all records and reset id to 0
	 * @author sitthykun
	 * @param string $table
	 */
	protected function truncate($table) {
		$this->query(NSQL::TRUNCATE . $table);
	}

	/**
	 * @todo update data to database
	 * @author sitthykun
	 * @param string $table
	 * @param string $where
	 * @param string $data
	 */
	protected function update($table, $set, $where = null) {
		if ($where != null) {
			$this->query(NSQL::UPDATE . NSQL::FROM . $table . NSQL::SET . $set . NSQL::WHERE . $where);
		} else {
			$this->query(NSQL::UPDATE . NSQL::FROM . $table . NSQL::SET . $set);
		}
	}


}


?>