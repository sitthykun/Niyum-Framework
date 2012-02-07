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
 @todo sql statement
 */

if (MYPAGE) {} else {echo ACCESS_DENIE;};

abstract class NSQL {
	/**
	 * @todo declare
	 */
	// front
	const DELETE			= 'DELETE ';
	const INSERT			= 'INSERT INTO ';
	const INSERTIGNORE		= 'INSERT IGNORE INTO ';
	const SELECT			= 'SELECT ';
	const SELECTALL			= 'SELECT * ';
	const SELECTDISTINCT	= 'SELECT DISTINCT ';
	const TRUNCATE			= 'TRUNCATE TABLE ';
	const UPDATE			= 'UPDATE ';
	const VALUES			= ' VALUES';
	// middle
	const SET				= ' SET ';
	const FROM				= ' FROM ';
	const WHERE				= ' WHERE ';
	// append
	const LIMIT				= ' LIMIT ';
	const TOP				= ' TOP ';
	const MINUS				= ' MINUS ';
	const UNION				= ' UNION ';
	const UNIONALL			= ' UNION ALL ';
	// symbol
	const COMMA				= ',';
	const BLEFT				= '(';
	const BRIGHT			= ')';

	/**
	 * @todo constructor
	 * @author sitthykun
	 * @param string $dbType
	 */
	public function NSQL() {
		// $this->initialize();
	}

	/**
	 * @todo attaches sql statement of mysql
	 * @author sitthykun
	 */
	private function attachMySQLStatements() {

	}

	/**
	 * @todo initialize keywords of statement
	 * @author sitthykun
	 */
	private function initialize() {
		switch (Configure::DB_TYPE) {
			case IDAOType::FIREBIRD		:
				break;
			case IDAOType::MSSQL		:
				break;
			case IDAOType::MYSQL		:
				$this->attachMySQLStatements();
				break;
			case IDAOType::ORACLE		:
				break;
			case IDAOType::POSGRESQL	:
				break;
			case IDAOType::SQLITE		:
				break;
			default:
				break;
		}
	}

	/**
	 * @todo set database type
	 * @author sitthykun
	 * @param string $dbType
	 */
	public function setDatabaseType($dbType) {
		$this->dbType = $dbType;
	}


}


?>
