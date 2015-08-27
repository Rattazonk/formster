<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Rattazonk.' . $_EXTKEY,
	'Display',
	'Formster'
);
