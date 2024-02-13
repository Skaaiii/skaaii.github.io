<?

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;

$app   = Factory::getApplication();
$sitename = htmlspecialchars($app->get('sitename'), ENT_QUOTES, 'UTF-8');

if ($this->params->get('logoFile')) {
    $logo = HTMLHelper::_('image', Uri::root(false) . htmlspecialchars($this->params->get('logoFile'), ENT_QUOTES), $sitename, ['loading' => 'eager', 'decoding' => 'async'], false, 0);
} elseif ($this->params->get('siteTitle')) {
    $logo = '<span title="' . $sitename . '">' . htmlspecialchars($this->params->get('siteTitle'), ENT_COMPAT, 'UTF-8') . '</span>';
} else {
    $logo = HTMLHelper::_('image', 'logo.svg', $sitename, ['class' => 'logo d-inline-block', 'loading' => 'eager', 'decoding' => 'async'], true, 0);
}

$app   = Factory::getApplication();
$input = $app->getInput();
$wa    = $this->getWebAssetManager();

$wa->useStyle('style');

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <jdoc:include type="metas" />
    <jdoc:include type="styles" />
    <jdoc:include type="scripts" />
</head>
<body>
    <div class="header">
        <?php if ($this->params->get('brand', 1)) : ?>
            <a class="logo" href="<?php echo $this->baseurl; ?>/">
                <div class="header_logo">
                    <?php echo $logo; ?>
                </div>
            </a>
        <?php endif; ?>
        <div class="header_section">
            <?if ($this->params->get('textInput', 1)) :?>
                <div class="header_item header_button">
                    <a href="tel:+79190102884">Телефон: <?=$this->params->get('textInput', '')?></a>
                </div>
            <?endif;?>

            <?php if ($this->countModules('search', true)) : ?>
                <jdoc:include type="modules" name="search" />
            <?php endif; ?>
        </div>
    </div>

<div class="wrapper">
     
    <div class="sidebar">
        <?php if ($this->countModules('menu', true)) : ?>
            <jdoc:include type="modules" name="menu" />
        <?php endif; ?>
    </div>
   
    <div class="content">
        <jdoc:include type="component" />
    </div> 
</div>

<?php if ($this->countModules('footer', true)) : ?>
    <jdoc:include type="modules" name="footer" />
<?php endif; ?>
</body>
</html>