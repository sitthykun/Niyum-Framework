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

if (MYPAGE) {} else {echo ACCESS_DENIE;};
/**
 * 
 * @todo instance test table
 * @author sitthykun
 *
 */
class TestModel extends Model {
	/**
	 * @todo declare fields name
	 */
	public $id, $title, $content;

	/**
	 * @todo constructor
	 * @author sitthykun
	 */
	public function TestModel() {
		// call constructer of model
		parent::Model(Configure::PREFIX_TABLE . 'testing');
		// designed fields
		$this->id               = $this->getInstancedField(new IntFT('id', 10));
        $this->title			= $this->getInstancedField(new VarcharFT('title', 50));
        $this->content			= $this->getInstancedField(new VarcharFT('content', 2000));

        // promote id to primary field
        $this->setPrimaryField($this->id);        
	}

}


?>