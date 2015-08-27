<?php
namespace Rattazonk\Formster\Tests\Unit\Controller;

use \TYPO3\CMS\Core\Tests\UnitTestCase;

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

class FormControllerTest extends UnitTestCase {
	public function setUp() {
		parent::setUp();

		$this->subject = $this->getAccessibleMock(
			'\Rattazonk\Formster\Controller\FormController',
			['dummy']
		);

		$this->objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
		$this->subject->_set('objectManager', $this->objectManager);
	}

	/**
	 * @test
	 * @expectedException Rattazonk\Formster\Tests\Exceptions\CalledException
	 */
	public function initInitializersInstantiatesConfiguredInitializers() {
		$initializerName = 'Rattazonk\Formster\Tests\Fixtures\Initializer\ExceptionOnConstructFixture';

		$this->subject->_set('settings', ['initializers' => [$initializerName]]);

		$this->subject->showAction();
	}

	/**
	 * @test
	 * @expectedException \Rattazonk\Formster\Tests\Exceptions\CalledException
	 */
	public function callInitializersCallsConfiguredInitializers() {
		$fixtureName = 'Rattazonk\Formster\Tests\Fixtures\Initializer\ExceptionOnProcessFixture';

		$this->subject->_set('settings', ['initializers' => [$fixtureName]]);

		$this->subject->showAction();
	}
}
