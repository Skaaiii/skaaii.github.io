<?php

/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   (C) 2009 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Associations;
use Joomla\CMS\Language\Multilanguage;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\Content\Administrator\Extension\ContentComponent;
use Joomla\Component\Content\Site\Helper\AssociationHelper;
use Joomla\Component\Content\Site\Helper\RouteHelper;

/** @var Joomla\CMS\WebAsset\WebAssetManager $wa */

$items = $this->items;
$counter = 0;

?>
<style>
    .service_container {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
    }

    .service_item {
        margin: 12px;
    }
</style>
            <div class="title">Катлог услуг HappyPC</div>
            <p class="intro1">Ремонт компьютера</p>
            <p class="intro11">Контракт, гарантия, качество.</p>
            <p class="text_four">Основная услуга нашей мастерской это ремонт компьютеров и ноутбуков!</p>
            <p class="text_four">Вы всегда можете принести или прислать нам своё устройство и мы его отремонтируем.</p>

            <div class="line_serv"></div>

            <div class="service_container">
                <?for (;$counter < 3 && $counter < count($items); $counter++) :?>
                <div class="service_item back_photo2">
                    <img src="<?=json_decode($items[$counter]->images)->image_intro?>" alt="">
                    <div class="hat_overlay"></div>
                    <p class="service_text"><?=$items[$counter]->title?></p>
                    <div class="service_subtext"><?=$items[$counter]->introtext?></div>
                    <div class="hat_overlay_white"><p class="price">Цена: <?=$items[$counter]->jcfields[1]->value?>bucks</p></div>
                    <a class="service_button" href="<?= $_SERVER["REQUEST_URI"] ."/". $items[$counter]->alias?>">Подробнее</a>
                </div>
                <?endfor;?>
            </div>



            <p class="intro1">Апгрейд компьютера</p>
            <p class="intro11">Контракт, гарантия, качество.</p>
            <p class="text_four">HappyPC - предлагает вам воспользоваться услугой индивидуальной сборки компьютера.</p>
            <p class="text_four">Совместно с нашей командой мы проведем вас от этапа подбора комплектующих до готового результата!</p>

            <div class="line_serv"></div>

            <div class="service_container">
            <?for (;$counter < count($items); $counter++) :?>
                <div class="service_item back_photo2">
                    <img src="<?=json_decode($items[$counter]->images)->image_intro?>" alt="">
                    <div class="hat_overlay"></div>
                    <p class="service_text"><?=$items[$counter]->title?></p>
                    <div class="service_subtext"><?=$items[$counter]->introtext?></div>
                    <div class="hat_overlay_white"><p class="price">Цена: <?=$items[$counter]->jcfields[1]->value?>bucks</p></div>
                    <a class="service_button" href="<?= $_SERVER["REQUEST_URI"] ."/". $items[$counter]->alias?>">Подробнее</a>
                </div>
                <?endfor;?>
            </div>
        </div>