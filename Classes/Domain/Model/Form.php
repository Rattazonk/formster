<?php
namespace Rattazonk\Formster\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Frederik Vosberg <frederik@rattazonk.com>, Rattazonk
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

class Form implements \ArrayAccess {
	/**
	 * @array
	 */
	protected $data = [];

	/**
	 * @return array
	 */
	public function getData() {
		return $this->data;
	}

	/**
	 * @param array $data
	 * @return void
	 */
	public function setData($data) {
		$this->data = $data;
	}

	/**
	 * @param array $newData
	 * @return void
	 */
	public function addData($newData) {
		$this->setData(array_replace_recursive(
			$this->getData(),
			$newData
		));
	}
	
	public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->data[] = $value;
        } else {
            $this->data[$offset] = $value;
        }
    }

    public function offsetExists($offset) {
        return isset($this->data[$offset]);
    }

    public function offsetUnset($offset) {
        unset($this->data[$offset]);
    }

    public function offsetGet($offset) {
        return isset($this->data[$offset]) ? $this->data[$offset] : null;
    }
}
