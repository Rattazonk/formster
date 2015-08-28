<?php
namespace Rattazonk\Formster\Tests\Unit\Domain\Model;

use \TYPO3\CMS\Core\Tests\UnitTestCase;
use \TYPO3\CMS\Core\Utility\GeneralUtility;

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

class FormTest extends UnitTestCase {
	public function setUp() {
		parent::setUp();

		$this->objectManager = GeneralUtility::makeInstance(
			'TYPO3\CMS\Extbase\Object\ObjectManager'
		);
		$this->subject = $this->objectManager->get(
			'\Rattazonk\Formster\Domain\Model\Form'
		);
	}

	/**
	 * @test
	 */
	public function accessDynamicAttributeAsInAnArray() {
		$this->subject['foo'] = 'bar';

		self::assertSame('bar', $this->subject['foo']);
	}

	/**
	 * @test
	 */
	public function getDataIntiallyReturnsAnEmptyArray() {
		self::assertSame([], $this->subject->getData());
	}

	/**
	 * @test
	 */
	public function setDataSetsAttributes() {
		$this->subject->setData(['eins' => 'first']);

		self::assertSame('first', $this->subject['eins']);
	}

	/**
	 * @test
	 */
	public function addDataMergesNewValuesIntoExisting() {
		$this->subject->setData([
			'first' => 'eins',
			'deep' => [
				'firstDeep' => 'einsDeep',
				'secondDeep' => 'deepZwei'
			]
		]);

		$this->subject->addData([
			'second' => 'zwei',
			'deep' => [
				'secondDeep' => 'zweiDeep',
				'thirdDeep' => 'dreiDeep'
			]
		]);

		self::assertEquals([
			'first' => 'eins',
			'second' => 'zwei',
			'deep' => [
				'firstDeep' => 'einsDeep',
				'secondDeep' => 'zweiDeep',
				'thirdDeep' => 'dreiDeep'
			]
		], $this->subject->getData());
	}

}
