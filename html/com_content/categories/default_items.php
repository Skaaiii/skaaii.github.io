<?php

/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;

?>3434343443<?

if ($this->maxLevelcat != 0 && count($this->items[$this->parent->id]) > 0) :?>
    <?if ($this->parent->id == 2): ?>
    <div class="catalog-container">
        <div class="catalog-h2">
            <h2>Каталог</h2>
        </div>
        <div class="catalog-block">
    <?endif;?>
        <?foreach ($this->items[$this->parent->id] as $id => $item) : ?>
            <?if ($this->params->get('show_empty_categories_cat') || $item->numitems || count($item->getChildren())) : ?>
                <?if ($this->parent->id == 2): ?>

                    <div class="category-block">
                        <div class="product-category-block">
                            <a href="#">
                                <img src="<?=$item->getParams()->get('image')?>" alt="category" class="category"/>
                                <span class="product-category"><?=$this->escape($item->title)?></span>
                            </a>
                        </div>

                        <?if (count($item->getChildren()) > 0 && $this->maxLevelcat > 1) : ?>
                            <div class="type-product">
                                <?php
                                    $this->items[$item->id] = $item->getChildren();
                                    $this->parent = $item;
                                    $this->maxLevelcat--;
                                    echo $this->loadTemplate('items');
                                    $this->parent = $item->getParent();
                                    $this->maxLevelcat++;
                                ?>
                            </div>
                        <?endif; ?>

                    </div>
                <?else:?>
                        <a class="type1" href="<?php echo Route::_(RouteHelper::getCategoryRoute($item->id, $item->language)); ?>">
                            <?php echo $this->escape($item->title); ?></a>
                <?endif;?>
            <?endif; ?>

        <?endforeach; ?>
    <?if ($this->parent->id == 2): ?>
        </div>
    </div>
    <?endif; ?>
<?endif; ?>
