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
 @todo store constant of database type
 */

if (MYPAGE) {} else {echo ACCESS_DENIE;};

final class FieldType {
	/**
	 * @todo declare datatype 
	 */
	private $char			= 'char';
	private $dateTime		= 'datetime';
	private $int			= 'int';
	private $text			= 'text';
	private $tinyint		= 'tinyint';
	private $varchar		= 'varchar';
	/**
	 * @todo type
	 */
	private $primaryKey		= '';
	private $dataType		= 'type';
	private $fieldSize		= 'size';
	private $defaultData	= 'default';
	private $charactor		= 'charactor';
	/**
	 * @todo convert data to field 
	 * @author sitthykun
	 * @return array
	 * @param string $name
	 * @param mix $size
	 * @param mix $default
	 */
	private function convertToArrayOfField($typeName, $size = null, $default = null) {
		// validate
//		if ($size != null) {
//			// default
//			if ($default != null) {
//				return array($this->dataType => $name, $this->fieldSize => $size, $this->defaultData => $default);
//			}
//			// no default
//			return array($this->dataType => $name, $this->fieldSize => $size);
//		} else {
//			// no size
//			if ($default != null) {
//				return array($this->dataType => $name, $this->defaultData => $default);
//			}
//			// no size and default
//			return array($this->dataType => $name);
//		}
		return array($this->dataType => $typeName, $this->fieldSize => $size, $this->defaultData => $default);
	}

	/**
	 * @todo assign property to char
	 * @author sitthykun
	 * @param integer $size
	 */
	public static function getCharField($size, $default = null) {
		$instance = new FieldType();
		return $instance->convertToArrayOfField($instance->char, $size, $default);
	}

	/**
	 * @todo get string text of data type
	 * @author sitthykun
	 * @return string
	 */
	public static function getDataType() {
		$instance = new FieldType();
		return $instance->dataType;
	}

	/**
	 * @todo assign property to datetime
	 * @author sitthykun
	 * @return array
	 * @param datetime $size
	 */
	public static function getDateTimeField($default = null) {
		$instance = new FieldType();
		return $instance->convertToArrayOfField($instance->dateTime, null, $default);
	}

	/**
	 * @todo get string text of default field
	 * @author sitthykun
	 * @return string
	 */
	public static function getDefaultData() {
		$instance = new FieldType();
		return $instance->defaultData;	
	}

	/**
	 * @todo assign property to int
	 * @author sitthykun
	 * @return array
	 * @param integer $size
	 * @param object $default
	 */
	public static function getIntField($size, $default = null) {
		$instance = new FieldType();
		return $instance->convertToArrayOfField($instance->int, $size, $default);
	}

	/**
	 * @todo get size text
	 * @author sitthykun
	 * @return string
	 */
	public static function getSize() {
		$instance = new FieldType();
		return $instance->fieldSize;
	}

//	/**
//	 * @todo assinged primary key
//	 * @author sitthykun
//	 * @param $size
//	 * @param $autoIncrease
//	 */
//	public static function getPrimaryIntField($size, $unsigned = true, $autoIncrease = true) {
//		$instance = new FieldType();
//		return $instance->convertToArrayOfField($instance->int, $unsigned, $instance->primaryKey);
//	}

	/**
	 * @todo assign property to text
	 * @author sitthykun
	 * @return array
	 * @param integer $size
	 */
	public static function getTextField($size = null, $default = null) {
		$instance = new FieldType();
		return $instance->convertToArrayOfField($instance->text, $size, $default);
	}

	/**
	 * @todo assign property to tinyint
	 * @author sitthykun
	 * @return array
	 * @param integer $size
	 */
	public static function getTinyIntField($size, $default = null) {
		$instance = new FieldType();
		return $instance->convertToArrayOfField($instance->tinyint, $size, $default);
	}

	/**
	 * @todo assign property to varchar
	 * @author sitthykun
	 * @return array
	 * @param integer $size
	 */
	public static function getVarcharField($size, $default = null) {
		$instance = new FieldType();
		return $instance->convertToArrayOfField($instance->varchar, $size, $default);
	}



}


?>