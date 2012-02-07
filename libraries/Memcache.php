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

class Memcache {
	private $mc = null;
	/**
	 * @todo instance object
	 * @author sitthykun
	 */
	function __construct() {
		// instance object
		$this->mc = new Memcache();
		// connect to memcache server
		$this->connect();
	}
	/**
	 * @todo remove object
	 * @author sitthykun
	 */
	function __destruct() {
		echo '';
	}
	/**
	 * @todo print object
	 * @author sitthykun
	 */
	function __toString() {
		return __CLASS__;
	}
	/**
	 * @todo disconnect
	 * @author sitthykun
	 */
	public function close() {
		$this->mc->close();
	}
	/**
	 * @todo connect to memcached server
	 * @author sitthykun
	 * @param string $host
	 * @param integer $port
	 */
	public function connect($host = null, $port = 0, $timeout = 0) {
		if (empty($host) && $port == 0) {
			// validate timeout
			if ($timeout != 0) {
				$this->mc->connect(Configure::HOST, Configure::MEMCACHEPORT,  $timeout);
			} else {
				$this->mc->connect(ChatConfig::HOST, ChatConfig::MEMCACHEPORT);
			}
		} else {
			if ($timeout != 0) {
				$this->mc->connect($host, $port,  $timeout);
			} else {
				$this->mc->connect($host, $port);
			}
		}
	}
	/**
	 * @todo ddd a memcached server to connection pool
	 * @author sitthykun
	 * @param string $newHost
	 * @param integer $port
	 */
	public function addServer($newHost = null, $port = 0) {
		if ($newHost != null && $port == 0) {
			$this->mc->addServer($newHost, Configure::MEMCACHEPORT);
		} else {
			$this->mc->addServer($newHost, $port);
		}
	}
	/**
	 * @todo add new an object to memcached server
	 * @author sitthykun
	 * @param string $key
	 * @param object $value
	 * @param integer or constant $flag
	 * @param integer $expire
	 */
	public function createUserSpace($key, $value, $flag, $expire) {
		$this->mc->add($key, serialize($value), Configure::MEMCACHECOMPRESS, Configure::MEMCACHEEXPIRE);
	}
	/**
	 * @todo decrease value of a key
	 * @author sitthykun
	 * @param string $key
	 * @param integer $value
	 */
	public function decrement($key, $value = -1) {
		$this->mc->decrement($key, $value);
	}
	/**
	 * @todo drop key from memcached server
	 * @author sitthykun
	 * @param string $key
	 */
	public function delete($key) {
		$this->mc->delete($key, 0);
	}
	/**
	 * @todo clean all existing key at the server
	 * @author sitthykun
	 * @return boolean
	 * @see warning if you do not clear this method please do not use test.
	 */
	public function flush() {
		return $this->mc->flush();
	}
	/**
	 * @todo Get statistics from all servers in pool
	 * @author sitthykun
	 * @return string
	 */
	public function getExtendedStats() {
		return $this->mc->getExtendedStats();
	}
	/**
	 * @todo get memcached server status
	 * @author sitthykun
	 * @return int
	 */
	public function getServerStatus($host = '', $port = 0) {
		if (empty($host) && $port == 0) {
			return $this->mc->getServerStatus($this->host, Configure::MEMCACHEPORT);
		}

		return $this->mc->getServerStatus($host, $port);
	}
	/**
	 * @todo Get statistics of the server
	 * @author sitthykun
	 * @return array
	 */
	public function getStats($host, $port) {
		if (empty($host) && $port == 0) {
			return $this->mc->getStats($this->host, Configure::MEMCACHEPORT);
		}

		return $this->mc->getStats($host, $port);
	}
	/**
	 * @todo get object from memcached server by key
	 * @author sitthykun
	 * @return array object
	 * @param string $key
	 */
	public function getValue($key) {
		return unserialize($this->mc->get($key));
	}
	/**
	 * @todo get information of memcached server
	 * @author sitthykun
	 * @return string
	 */
	public function getVersion() {
		return $this->mc->getVersion();
	}
	/**
	 * @todo Increment value of key
	 * @author sitthykun
	 */
	public function increment($key, $value = 1) {
		$this->mc->increment($key, $value);
	}
	/**
	 * @todo check exist key in memcache server
	 * @author sitthykun
	 * @return boolean
	 * @param string $key
	 */
	public function isExistingKey($key) {
		return (boolean)$this->mc->get($key);
	}
	/**
	 * @todo replace an object to memcached server
	 * @author sitthykun
	 * @param string $key
	 * @param object $value
	 */
	public function replace($key, $value) {
		$this->mc->set($key, serialize($value), Configure::MEMCACHECOMPRESS, Configure::MEMCACHEEXPIRE);
	}
	/**
	 * @todo aliase from setValue function
	 * @author sitthykun
	 * @param string $key
	 * @param object $value
	 * @see setValue
	 */
	public function saveValue($key, $value) {
		$this->setValue($key, $value);
	}
	/**
	 * @todo set an object to memcached server
	 * @author sitthykun
	 * @param string $key
	 * @param object $value
	 */
	public function setValue($key, $value) {
		$this->mc->set($key, serialize($value));
	}
	/**
	 * @todo set expire time to key object
	 * @param string $key
	 * @param integer $time
	 */
	public function setExpireTimeToKey($key, $time) {
		$this->mc->delete($key, serialize($value), $time);
	}

}


?>
