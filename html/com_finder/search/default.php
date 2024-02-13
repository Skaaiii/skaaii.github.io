<?php

/**
 * @package     Joomla.Site
 * @subpackage  com_finder
 *
 * @copyright   (C) 2011 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// print_r($this->results);
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
<div class="service_container">
    <?if (isset($this->results)) :?>
    <?foreach ($this->results as $item) :?>
        <?if ($item->category == "Услуги") :?>
            <?$counter++;?>
            <?if ($counter / 3 == 1) : ?>
                
            <?endif;?>
        <div class="service_item back_photo2">
            <img src="<?=json_decode($item->images)->image_intro?>" alt="">
                <div class="hat_overlay"></div>
                    <p class="service_text"><?=$item->title?></p>
                    <div class="service_subtext"><?=$item->summary?></div>
                    <a class="service_button" href="<?= $_SERVER["REQUEST_URI"] ."/". $item->alias?>">Подробнее</a>
                </div>

                <?endif;?>
                <?endforeach;?>
    <?else :?>
        <h3>Ничего не нашлось</h3>
    <?endif;?>
            </div>