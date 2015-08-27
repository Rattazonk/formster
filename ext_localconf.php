<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Rattazonk.' . $_EXTKEY,
	'Display',
	array(
		'Form' => 'show'
	),
	// non-cacheable actions
	array(
		'Form' => 'show'
	)
);
