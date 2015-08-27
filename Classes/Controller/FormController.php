<?php
namespace Rattazonk\Formster\Controller;

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

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class FormController extends ActionController {
	/**
	 * @var array
	 */
	protected $initializers = [];
	
	public function showAction() {
		$this->callInitializers();
	}

	protected function callInitializers() {
		$this->initInitializers();
		foreach($this->initializers as $initializer) {
			$initializer->process();
		}
	}

	protected function initInitializers() {
		if( !$this->settings['initializers'] ){
			$this->settings['initializers'] = [];
		}

		if( !is_array($this->settings['initializers']) ){
			throw new \InvalidArgumentException('The initializers configuration of Formster must be an array or null.', 1440710160);
		}
		foreach($this->settings['initializers'] as $initializer) {
			$this->initializers[] = $this->objectManager->get($initializer);
		}
	}
}
