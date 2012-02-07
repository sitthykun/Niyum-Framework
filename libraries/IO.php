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
 @todo IO
 */

if (MYPAGE) {} else {echo ACCESS_DENIE;};

class IO {
	/**
	 * @todo download file via downloaded javascript
	 * @author sitthykun
	 * @param string $fileName
	 */
	public function downloadFile($fileName) {
		
	}

	/**
	 * @todo convert content to pdf
	 * @author sitthykun
	 * @param string $content
	 */
	public function convertToPDF($content) {
		
	}

	/**
	 * @todo filter directory name of path
	 * @author sitthykun
	 * @param string $path
	 */
	public static function filterDirectoryName($path) {
		return dirname($path);
	}

	/**
	 * @todo get permission of file or directory
	 * @author sitthykun
	 * @param string $fileName
	 */
	public function getPermission($fileName) {
		
	}

	/**
	 * @todo require_once
	 * @author sitthykun
	 * @param string $fileName
	 */
	public static function import($fileName) {
		if (file_exists($fileName)) {
			require_once($fileName);
		}
	}

	/**
	 * @todo write content to file
	 * @author sitthykun
	 * @return string
	 * @param string $fileName
	 */
	public function readContent($fileName) {
		if (!file_exists($fileName)) {
			return;
		}

		return file_get_contents($fileName);
	}

	/**
	 * @todo read content to file
	 * @author sitthykun
	 * @return download box
	 * @param string $fileName
	 */
	public function readFile($fileName) {
		if (!file_exists($fileName)) {
			return;
		}

		header('Content-Description: File Transfer');
	    header('Content-Type: application/octet-stream');
	    header('Content-Disposition: attachment; filename='.basename($file));
	    header('Content-Transfer-Encoding: binary');
	    header('Expires: 0');
	    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	    header('Pragma: public');
	    header('Content-Length: ' . filesize($file));
	    ob_clean();
	    flush();
	    readfile($fileName);

	}

	/**
	 * @todo set permission to file or directory
	 * @author sitthykun
	 * @param string $fileName
	 * @param string $mode
	 */
	public function setPermission($fileName = null, $mode = 555) {
		
	}

	/**
	 * @todo write content to file
	 * @author sitthykun
	 * @param $fileName
	 * @param $contents
	 * @param $override
	 */
	public function writeContent($fileName, $contents, $override = true) {
		if (is_writable($fileName)) {
			if (!($override)) {
				return;
			}
		}

		file_put_contents($fileName, $contents);
	}

	/**
	 * @todo write content to file as binary
	 * @author sitthykun
	 * @param $fileName
	 * @param $contents
	 * @param $override
	 */
	public function writeFile($fileName, $contents, $override = true) {
		if (is_writable($fileName)) {
			if (!($override)) {
				return;
			}
		}

		$fh = fopen($fileName, 'w');
		fwrite($fh, $contents);
		fclose($fh);
	}


}

?>