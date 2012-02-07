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

class Model extends DAO {
	/**
	 * @todo declare variables
	 */
	private $table				= null;
	private $fields				= array();
	private $rows				= 0;
	private $primaryKey			= null;			// primary key
	private $isExistPrimaryKey	= false;

	/**
	 * @todo constructor 
	 * @author sitthykun
	 */
	public function Model($table = null) {
		// initialize database controller
		parent::DAO();
		// assign table name
		if ($table != null) {
			$this->table = $table;
		}
	}

	/**
	 * @todo count all records in the table
	 * @author sitthykun
	 * @return integer
	 */
	public function count() {
		return parent::count($this->table);
	}

	/**
	 * @todo delete data from table
	 * @author sitthykun
	 * @param string $where
	 * @see libraries/DAO::delete()
	 */
	public function delete($where = null) {
		parent::delete($this->table, $where);
	}

	/**
	 * @todo delete record by id
	 * @author sitthykun
	 * @param integer or string of id
	 */
	public function deleteByID($valueOfID) {
		parent::delete($this->table, $this->primaryKey . '=' . $valueOfID);
	}

	/**
	 * @todo find data 
	 * @author sitthykun
	 * @return boolean
	 * @param string $where
	 */
	public function find($where) {
		$sql = NSQL::SELECTALL . NSQL::FROM . $this->table . NSQL::WHERE . $where;

		return parent::getArrayOfQuery();
	}

	/**
	 * @todo find only id in the table
	 * @author sitthykun
	 * @return array of records
	 * @param object $id
	 */
	public function findID($id) {
		if ($this->primaryKey != null) {
			$sql = NSQL::SELECTALL . NSQL::FROM . $this->table . NSQL::WHERE . $this->primaryKey . '=' . $id;
			return parent::getArrayOfQuery();
		} else {
			return array();
		}
	}

	/**
	 * @todo get default value of the field
	 * @author sitthykun
	 * @param object(array) of $fieldObject
	 */
	public function getFieldDefaultValue($fieldObject) {
		return $fieldObject[FieldType::getDefaultData()];
	}

	/**
	 * @todo get size of the field
	 * @author sitthykun
	 * @param object(array) of $fieldObject
	 */
	public function getFieldSize($fieldObject) {
		return $fieldObject[FieldType::getSize()];
	}

	/**
	 * @todo get type of the field
	 * @author sitthykun
	 * @param object(array) of $fieldObject
	 */
	public function getFieldType($fieldObject) {
		return $fieldObject[FieldType::getDataType()];
	}

	/**
	 * @todo get records
	 * @author sitthykun
	 * @return array
	 * @param $where default null
	 */
	public function getRecords($where = null) {
		$sql = NSQL::SELECTALL . NSQL::FROM . $this->table;
		if ($where != null) {
			$sql .= NSQL::WHERE;
			return parent::getArrayOfQuery($sql . $where);
		} else {
			return parent::getArrayOfQuery($sql);
		}
	}

	/**
	 * @todo get records via id
	 * @author sitthykun
	 * @return array
	 * @param string $id i.e. user_id = 2
	 */
	public function getRecordsByID($id = 0) {
		$sql = NSQL::SELECTALL . NSQL::FROM . $this->table;
		// validate argument where
		if ($where != null) {
			$sql .= NSQL::WHERE;
			return parent::query($sql . $where);
		} else {
			return parent::query($sql);
		}
	}

	/**
	 * @todo get records by limited
	 * @author sitthykun
	 * @param integer $number
	 * @param string $where
	 */
	public function getRecordsByNumber($number, $where = null) {
		$sql = NSQL::FROM . $this->table;
		// validate where
		if ($where != null) {
			$sql .= NSQL::WHERE . $where;		
		}
		// validate db type
		if (Configure::DB_TYPE == IDAOType::MYSQL) {
			$sql = NSQL::SELECTALL . $sql . NSQL::LIMIT . $number;
		}
		// return array object from query
		return parent::getArrayOfQuery($sql);
	}

	/**
	 * @todo get string of table 
	 * @author sitthykun
	 * @return string
	 * @param string $class
	 */
	public function getTableName() {
		return $this->table;
	}

	/**
	 * @todo insert data to database
	 * @author sitthykun
	 * @param string $values
	 * @param string $fields
	 * @see libraries/DAO::insert()
	 */
	public function insert($values, $duplicateIgnore = false, $fields = null) {
		if ($duplicateIgnore) {
			parent::insertIgnore($this->table, $values, $fields);
		} else {
			parent::insert($this->table, $values, $fields);
		}
	}

	/**
	 * @todo insert data to database
	 * @author sitthykun
	 * @param string $values
	 * @param string $fields
	 * @see libraries/DAO::insertIgnore()
	 */
	public function insertIgnore($values, $fields = null) {
		parent::insertIgnore($this->table, $value, $fields);
	}

	/**
	 * @todo query to db
	 * @author sitthykun
	 * @param string
	 * @see libraries/DAO::query()
	 */
	public function query($sql) {
		parent::query($sql);
	}

	/**
	 * @todo get data from select
	 * @author sitthykun
	 * @param string $fields
	 * @param string $where
	 * @param integer $start
	 * @param integer $number
	 * @see libraries/DAO::select()
	 */
	public function select($fields = '*', $where = null, $start = null, $number = null) {
		parent::select($this->table, $fields, $where, $limit);
	}

	/**
	 * @todo assign field to primary key
	 * @author sitthykun
	 * @param string $id
	 */
	public function setPrimaryField($id) {
		$this->primaryKey = $id;
	}

	/**
	 * @todo set table name
	 * @author sitthykun
	 * @param string $name
	 */
	public function setTableName($name) {
		$this->table = $name;
	}

	/**
	 * @todo delete all data of table and reset index to zero
	 * @author sitthykun
	 * @see libraries/DAO::truncat()
	 */
	public function truncate() {
		parent::truncate($this->table);
	}

	/**
	 * @todo update data of the table
	 * @author sitthykun
	 * @param string $set
	 * @param string $where
	 * @see libraries/DAO::update()
	 */
	public function update($set, $where = null) {
		parent::update($this->table, $set, $where);
	}

}

?>
