<?php
/**
 * Created by PhpStorm.
 * User: briezler
 * Date: 14.10.18
 * Time: 17:35
 */

namespace Pixelink\SimpleRss\Controller;

use TYPO3\CMS\Core\Utility\GeneralUtility;

class RssController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * @var \Pixelink\SimpleRss\Domain\Repository\RssRepository
     */
    protected $rssRepository = null;


    /**
     * RssController constructor.
     */
    public function __construct()
    {
        $objectManager = GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');
        $this->rssRepository = $objectManager->get('Pixelink\SimpleRss\Domain\Repository\RssRepository');
    }

    /**
     * show rss feeds
     */
    public function showFeedAction() {

        $feed = $this->settings['simplerss']['url'];
        $dateFormat = $this->settings['simplerss']['dateformat'];
        $limit = $this->settings['simplerss']['limit'];

        $entries = $this->rssRepository->getItems($feed, $limit, $dateFormat);

        $this->view->assign('entries', $entries);

    }

}