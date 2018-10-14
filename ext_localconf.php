<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Pixelink.SimpleRss',
            'Rssfeed',
            [
                'Rss' => 'showFeed'
            ],
            // non-cacheable actions
            [
                'Rss' => 'showFeed'
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    rssfeed {
                        iconIdentifier = simple_rss-plugin-rssfeed
                        title = LLL:EXT:simple_rss/Resources/Private/Language/locallang_db.xlf:tx_simple_rss_rssfeed.name
                        description = LLL:EXT:simple_rss/Resources/Private/Language/locallang_db.xlf:tx_simple_rss_rssfeed.description
                        tt_content_defValues {
                            CType = list
                            list_type = simplerss_rssfeed
                        }
                    }
                }
                show = *
            }
       }'
    );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'simple_rss-plugin-rssfeed',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:simple_rss/Resources/Public/Icons/user_plugin_rssfeed.svg']
			);
		
    }
);
