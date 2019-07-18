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

use Contao\Input;
use Contao\LayoutModel;
use Contao\CalendarEventsModel;
use Contao\PageModel;
use Contao\PageRegular;

class EventsMeta
{
    public function onGeneratePage(PageModel $objPage, LayoutModel $objLayout, PageRegular $objPageRegular)
    {
        if (!$autoItem = Input::get('auto_item')) {
            return;
        }

        $events = CalendarEventsModel::findOneBy(
            ['alias=?', 'published=?'],
            [$autoItem, 1]
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
