<?php

/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\FileLayout;
use Joomla\CMS\Layout\LayoutHelper;

$app = Factory::getApplication();

$this->category->text = $this->category->description;
$app->triggerEvent('onContentPrepare', [$this->category->extension . '.categories', &$this->category, &$this->params, 0]);
$this->category->description = $this->category->text;

$results = $app->triggerEvent('onContentAfterTitle', [$this->category->extension . '.categories', &$this->category, &$this->params, 0]);
$afterDisplayTitle = trim(implode("\n", $results));

$results = $app->triggerEvent('onContentBeforeDisplay', [$this->category->extension . '.categories', &$this->category, &$this->params, 0]);
$beforeDisplayContent = trim(implode("\n", $results));

$results = $app->triggerEvent('onContentAfterDisplay', [$this->category->extension . '.categories', &$this->category, &$this->params, 0]);
$afterDisplayContent = trim(implode("\n", $results));

$htag    = $this->params->get('show_page_heading') ? 'h2' : 'h1';
?>
fdfdfddf
<div class="page-container">
    <?if (count($this->items) <= 0) :?>
        <h3>Товаров пока нет!</h3>
    <?else :?>
        <div>
            <h2 class="name-products"><?=$this->category->title?></h2>
        </div>
        <div class="products-block">
            <aside>
                <form class="filters-product">
                    <select class="type-filter">
                        <option selected>Способ доставки</option>
                        <option value="1">Самовывоз</option>
                        <option value="2">Доставка</option>
                    </select>
                    <select class="type-filter">
                        <option selected>Наличие на скадах</option>
                        <option value="1">Каширское шоссе</option>
                        <option value="2">Химки</option>
                        <option value="3">Люберцы</option>
                        <option value="4">Ногинск</option>
                    </select>
                    <select class="type-filter">
                        <option selected>Бренд</option>
                        <option value="1">INFORCE</option>
                        <option value="2">GIGANT</option>
                        <option value="3">KBT</option>
                        <option value="4">MATRIX</option>
                        <option value="5">MAKITA</option>
                        <option value="6">AEG</option>
                    </select>
                    <button class="button-submit-filters" type="submit">Применить</button>
                </form>
            </aside>

            <div class="products-choice">

            <?foreach($this->items as $item) :?>
                <?
                    $values = array();
                    foreach($item->jcfields as $value) {
                        $values[$value->title] = $value->value;
                    }
                ?>
            
                <div class="product-card">
                    <div>
                        <a href="<?=$_SERVER["REQUEST_URI"]."/".$item->alias?>">
                            <img class="productIMG" src="<?=json_decode($item->images)->image_intro?>" alt="product"/>
                        </a>
                    </div>
                    <div class="desc-product">
                        <span class="desc"><?=$item->title?></span>
                        <a class="more" href="<?=$_SERVER["REQUEST_URI"]."/".$item->alias?>">Подробнее</a>
                    </div>
                    <div class="cost-and-button">
                        <span class="cost">$<?=$values["Price"]?></span>
                        <a class="button-buy" href="<?=$_SERVER["REQUEST_URI"]."/".$item->alias?>">Купить сейчас</a>
                    </div>
                </div>

            <?endforeach;?>
            </div>
        </div>
        <?endif;?>
    </div>