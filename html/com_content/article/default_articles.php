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
?>
dsdsdssd77777777777777
<?if ($_SERVER["REQUEST_URI"] == "/index.php/products"): ?>
    <style>
        .list {
            margin-top: 150px !important;
        }
        .text {
            font-family: inter;
            font-size: 30px;
            margin-top: 60px;
            padding-bottom: 20px;
            border-bottom: 1px solid #5a5a5a;
        }

        .header_inner {
            border: none;
        }
    </style>

<?
    function sort_item($a, $b) {
        return (strcmp($b->tags->itemTags[0]->title, $a->tags->itemTags[0]->title));
    }

    usort($this->items, "sort_item");

    $tmp = "";
?>
    <div class="list">
    <div class="container">
            
<? foreach ($this->items as $item) { ?>

    <? if ($tmp != $item->tags->itemTags[0]->title) { ?>
        <?if ($tmp != "") {?>
            </div>
        <?}?>
            <div class="text">
                <?=$item->tags->itemTags[0]->title?>
            </div>
            <div class="button_list">
    <?}?>
    <div class="card">

<img src="<?=json_decode($item->images)->image_intro?>" alt="" class="card_photo">

<div class="card_description">
    <div class="card_title">
        <?=$item->title?>
    </div>

    <div class="card_subtitle">
        <?=$item->jcfields[2]->value?>
    </div>

    <div class="card_cost">
        <?=$item->jcfields[1]->value?>$
    </div>

</div>

<div class="btn_buybest">
    <a class="btn_bb" href="<?=$_SERVER["REQUEST_URI"]."/".$item->alias?>">View Page</a>
    <a class="btn_bb" href="#">Buy in one click</a>
</div>
</div>

    <? if ($tmp != $item->tags->itemTags[0]->title) { ?>
        <? $tmp = $item->tags->itemTags[0]->title; ?>
        
    <?}?>
<?}?>
</div>
    </div>
<?else :?>

<div class="bestsellers">
      <div class="bestsellers__inner">
        <h4 class="bestsellers_title">
          Bestsellers
        </h4>
        <div class="button_list">
<?

$counter = 0;


foreach ($this->items as $item) {
    if ($counter < 4) {
    ?>
            <div class="card">

            <img src="<?=json_decode($item->images)->image_intro?>" alt="" class="card_photo">

            <div class="card_description">
                <div class="card_title">
                    <?=$item->title?>
                </div>

                <div class="card_subtitle">
                    <?=$item->jcfields[2]->value?>
                </div>

                <div class="card_cost">
                    <?=$item->jcfields[1]->value?>$
                </div>

            </div>

            <div class="btn_buybest">
                <a class="btn_bb" href="<?="/index.php/products/".$item->alias?>">View Page</a>
                <a class="btn_bb" href="#">Buy in one click</a>
            </div>
        </div>
    <?
    $counter++;
    }
}
?>
</div>
</div>
</div>

<?endif;?>