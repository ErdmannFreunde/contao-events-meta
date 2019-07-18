<?php

/*
 * This file is part of ErdmannFreunde/contao-news-meta
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

$GLOBALS["TL_HOOKS"]['generatePage'][] = array(
    'EuF\\ContaoEventsMeta\\Classes\\EventsMeta',
    'onGeneratePage'
);
