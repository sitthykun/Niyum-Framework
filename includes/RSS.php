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

final class RSS {

	private $blog;

	/**
	 * @todo initialize object
	 * @author sitthykun
	 */
	public function RSS() {
		$this->blog = new BlogsModel();
	}

	/**
	 * @todo get items from blog
	 * @author sitthykun
	 * @return string
	 */
	private function getItems() {
		$items = '';
		$where = $this->blog->publiced->name . '=1 AND ' . $this->blog->accessLevel->name . '=' . AccessLevel::VISITOR;
		$list = $this->blog->getRecords($where, $this->blog->id->name . ' DESC');
		foreach($list as $l) {
			$items .= '<item>
				<title>'.  $l[$this->blog->title->name] .'</title>
				<link>'. Configure::SITE . 'news/index.html?blog=' . $l[$this->blog->id->name] .'</link>
				<description><![CDATA['. $l[$this->blog->content->name] .']]></description>
			</item>';
		}

		return $items;
	}

	/**
	* @todo get detail
	* @author sitthykun
	* @return string
	*/
	public function getRSS() {
		$details = '<?xml version="1.0" encoding="ISO-8859-1" ?>
				<rss version="2.0">
					<channel>
						<title>Live Contents</title>
						<link>' . Configure::SITE . 'news/index.html'. '</link>
						<description>' . '</description>
						<language>en-us</language>';
		/*<image>
		 <title>'. $row['image_title'] .'</title>
		<url>'. $row['image_url'] .'</url>
		<link>'. $row['image_link'] .'</link>
		<width>'. $row['image_width'] .'</width>
		<height>'. $row['image_height'] .'</height>
		</image>';*/
	
		// get items
		$details .= $this->getItems();
		$details .= '</channel>
						</rss>';
		// return
		return $details;
	}

}

?>
