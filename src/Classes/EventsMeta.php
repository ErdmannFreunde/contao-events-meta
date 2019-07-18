<?php

/*
 * This file is part of ErdmannFreunde/contao-events-meta
 *
 * (c) 2018 Erdmann & Freunde.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package    events-meta
 * @author     Dennis Erdmann
 * @author     Frank Müller
 * @copyright  2018 Erdmann & Freunde
 * @license    LICENSE LGPL-3.0
 *
 */

namespace EuF\ContaoEventsMeta\Classes;

use Contao\Frontend;
use Contao\LayoutModel;
use Contao\CalendarEventsModel;
use Contao\PageModel;
use Contao\PageRegular;

class EventsMeta extends Frontend
{
    public function onGeneratePage(PageModel $objPage, LayoutModel $objLayout, PageRegular $objPageRegular)
    {
        if (!$this->Input->get('items')) {
            return; // no events
        }

        $eevnts = CalendarEventsModel::findOneBy(
            ['alias=?', 'published=?'],
            [$this->Input->get('items'), 1]
        );

        if (null === $events) {
            return; // not found
        }

        if ($events->meta_title) {
            $objPage->pageTitle = $events->meta_title;
        }

        if ($events->meta_description) {
            $objPage->description = $events->meta_description;
        }

    }
}
