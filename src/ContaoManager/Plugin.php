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

namespace EuF\ContaoEventsMeta\ContaoManager;

use Contao\CalendarBundle\ContaoCalendarBundle;
use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use EuF\ContaoEventsMeta\ContaoEventsMetaBundle;

class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(ContaoEventsMetaBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class, ContaoCalendarBundle::class]),
        ];
    }
}
