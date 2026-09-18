<?php

  defined("_JEXEC") or die;

  use Joomla\CMS\Factory;
  use Joomla\CMS\Uri\Uri;
  use Joomla\CMS\HTML\HTMLHelper;

  $app = Factory::getApplication();
  $doc = $app->getDocument();
  $root = Uri::root();
  $lang = Factory::getLanguage();
  
  $template = $this->template;
  $sitename = $app->get("sitename");
  $title = $doc->getTitle();

  $wa = $this->getWebAssetManager();
  $wa->registerAndUseStyle('template-style', 'templates/' . $template . '/css/style.css');
  $wa->registerAndUseScript('template-menu', 'templates/' . $template . '/js/menu.js');

  $doc->setTitle($title == "Home" ? $sitename : $sitename . " - " . $title);
  
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <jdoc:include type="head" />
  </head>
  <body>
    <div id="header">
      <div class="header-inner">
        <div id="logo">
          <img src="templates/amswallow/images/logo.svg" alt="logo.svg" onclick="location='<?php echo $root; ?>'" />
        </div>
        <div id="link-menu">
          <jdoc:include type="modules" name="odkazy" />
        </div>
      </div>
    </div>
    <div id="top">
      <div class="topbar-inner">
        <div id="top-menu">
          <jdoc:include type="modules" name="obory" />
        </div>
        <div id="languages-menu">
          <jdoc:include type="modules" name="jazyky" />
        </div>
      </div>
    </div>
    <div id="main" class="main-layout">
      <div id="content">
        <div class="content-top">
          <div id="look">
            <div id="irop-logo-wrapper">
              <img id="irop-logo" src="templates/amswallow/images/irop-logo.png" alt="irop-logo.png" />
            </div>
            <h2><?php echo $lang->getTag() == "cs-CZ"? "Novinky": "Look"; ?></h2>
            <jdoc:include type="modules" name="novinky" />
          </div>
          <div id="slideshow">
            <jdoc:include type="modules" name="aktuality" />
          </div>
        </div>
        <div id="article">
          <jdoc:include type="component" />
        </div>
      </div>
      <div id="right">
        <div id="news">
          <h2><?php echo $lang->getTag() == "cs-CZ"? "Aktuality - úřední deska": "News"; ?></h2>
          <jdoc:include type="modules" name="mini-aktuality" />
        </div>
        <div id="right-menu">
          <button id="right-menu-close" type="button" aria-label="<?php echo $lang->getTag() == "cs-CZ" ? "Zavřít menu" : "Close menu"; ?>" title="<?php echo $lang->getTag() == "cs-CZ" ? "Zavřít menu" : "Close menu"; ?>">&times;</button>
          <jdoc:include type="modules" name="prave-menu" />
        </div>
        <div id="search">
          <div class="search-controls">
            <jdoc:include type="modules" name="vyhledavani" />
            <button id="right-menu-open" type="button" aria-expanded="false" aria-label="<?php echo $lang->getTag() == "cs-CZ" ? "Otevřít menu" : "Open menu"; ?>" title="<?php echo $lang->getTag() == "cs-CZ" ? "Otevřít menu" : "Open menu"; ?>">
              &#9776;
            </button>
          </div>
        </div>
      </div>
    </div>
    <div id="right-menu-backdrop"></div>
    <div id="footer">
      <img id="partners" src="templates/amswallow/images/partneri.png" alt="partneri.png" />
      <div class="footer-inner">
        <div id="icon">
          <img src="templates/amswallow/images/logo.svg" alt="logo.svg">
        </div>
        <div id="info">
          <jdoc:include type="modules" name="zapati" />
        </div>
        <div id="login">
          <p>
            <a href="administrator" target="_blank">LOGIN</a>
          </p>
        </div>
      </div>
    </div>
  </body>
</html>
