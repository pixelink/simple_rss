<?php
defined('TYPO3_MODE') or die();

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Pixelink.SimpleRss',
            'Rssfeed',
            'RSS Reader'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('simple_rss', 'Configuration/TypoScript', 'Simple RSS/Atom Reader');

    }
);


// include the flexform for the plugin
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['simplerss_rssfeed'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('simplerss_rssfeed', 'FILE:EXT:simple_rss/Configuration/FlexForms/settings.xml');