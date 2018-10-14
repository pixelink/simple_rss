<?php
/**
 * Created by PhpStorm.
 * User: briezler
 * Date: 14.10.18
 * Time: 17:35
 */

namespace Pixelink\SimpleRss\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use SimplePie;

class RssRepository
{

    protected $feed = '';

    public function __construct()
    {
        $this->feed = GeneralUtility::makeInstance(SimplePie::class);
    }

    public function getFeed($url) {

        $this->feed->set_feed_url($url);
        $this->feed->init();

    }

    public function getTitle($url) {

        $this->getFeed($url);
        $title = $this->feed->get_title();

        return $title;

    }

    public function getDescription($url) {

        $this->getFeed($url);
        $description = $this->feed->get_description();

        return $description;

    }

    public function getItems($url, $dateFormat) {

        $this->getFeed($url);
        $items = $this->feed->get_items(0,0);

        $feedItem = array();
        $feedCount = 0;


        foreach ($items as $item) {

            $feedItem[$feedCount]['title'] = $item->get_title();
            $feedItem[$feedCount]['link'] = $item->get_link();
            $feedItem[$feedCount]['author'] = $item->get_author()->get_name();
            $feedItem[$feedCount]['date'] = $item->get_date($dateFormat);
            $feedItem[$feedCount]['description'] = $item->get_description();
            $feedItem[$feedCount]['content'] = $item->get_content(true);
            $feedItem[$feedCount]['categories'] = $item->get_categories(true);

            $feedCount++;

        }

        return $feedItem;

    }
}