<?php
/**
 * @file
 * Theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $css: An array of CSS files for the current page.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page. Used to toggle the mission statement.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Page metadata:
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $head_title: A modified version of the page title, for use in the TITLE tag.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It should be placed within the <body> tag. When selecting through CSS
 *   it's recommended that you use the body tag, e.g., "body.front". It can be
 *   manipulated through the variable $classes_array from preprocess functions.
 *   The default values can be one or more of the following:
 *   - front: Page is the home page.
 *   - not-front: Page is not the home page.
 *   - logged-in: The current viewer is logged in.
 *   - not-logged-in: The current viewer is not logged in.
 *   - node-type-[node type]: When viewing a single node, the type of that node.
 *     For example, if the node is a "Blog entry" it would result in "node-type-blog".
 *     Note that the machine name will often be in a short form of the human readable label.
 *   - page-views: Page content is generated from Views. Note: a Views block
 *     will not cause this class to appear.
 *   - page-panels: Page content is generated from Panels. Note: a Panels block
 *     will not cause this class to appear.
 *   The following only apply with the default 'sidebar_first' and 'sidebar_second' block regions:
 *     - two-sidebars: When both sidebars have content.
 *     - no-sidebars: When no sidebar content exists.
 *     - one-sidebar and sidebar-first or sidebar-second: A combination of the
 *       two classes when only one of the two sidebars have content.
 * - $node: Full node object. Contains data that may not be safe. This is only
 *   available if the current page is on the node's primary url.
 * - $menu_item: (array) A page's menu item. This is only available if the
 *   current page is in the menu.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $mission: The text of the site mission, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $search_box: HTML to display the search box, empty if search has been disabled.
 * - $primary_links (array): An array containing the Primary menu links for the
 *   site, if they have been configured.
 * - $secondary_links (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title: The page title, for use in the actual HTML content.
 * - $messages: HTML for status and error messages. Should be displayed prominently.
 * - $tabs: Tabs linking to any sub-pages beneath the current page (e.g., the
 *   view and edit tabs when displaying a node).
 * - $help: Dynamic help text, mostly for admin pages.
 * - $content: The main content of the current page.
 * - $feed_icons: A string of all feed icons for the current page.
 *
 * Footer/closing data:
 * - $footer_message: The footer message as defined in the admin settings.
 * - $closure: Final closing markup from any modules that have altered the page.
 *   This variable should always be output last, after all other dynamic content.
 *
 * Helper variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * Regions:
 * - $content_top: Items to appear above the main content of the current page.
 * - $content_bottom: Items to appear below the main content of the current page.
 * - $navigation: Items for the navigation bar.
 * - $sidebar_first: Items for the first sidebar.
 * - $sidebar_second: Items for the second sidebar.
 * - $header: Items for the header region.
 * - $footer: Items for the footer region.
 * - $page_closure: Items to appear below the footer.
 *
 * The following variables are deprecated and will be removed in Drupal 7:
 * - $body_classes: This variable has been renamed $classes in Drupal 7.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 */

$super=get_lcmx_banner("super");
$revista = getRevista();
$banner=getSuperBanner();

?>
<?php print render($page['aperture']); ?>
<div id="pageWrapper" class="centered bs10">
    <div id="page">
        <div id="header-wrapper">
            <header class="tacenter prelative">
                <div id="top">
                    <div id="ciudad-mobil">
                        <select id="change-ciudad-mobil" selected>
                            <option value="cdmx">
                                Ciudad de México
                            </option>
                            <option value="queretaro">
                                Querétaro
                            </option>
                            <option value="edomex">
                                Estado de México
                            </option>
                        </select>
                    </div>
                    <div class="menuFixedTools limited">
                        <div class="menuFixed-social">
                            <ul>
                                <li class="col-4 bsbb left pt5">
                                    <a href="http://www.facebook.com/revistalacapitalmx" class="icn-fb-color" target="_blank"></a>
                                </li>
                                <li class="col-4 bsbb left pt5">
                                    <a href="http://twitter.com/LaCapital_" class="icn-tw-color" target="_blank"></a>
                                </li>
                                <li class="col-4 bsbb left pt5">
                                    <a href="http://youtube.com/channel/UCplzYDA2Hitw8uxdQqar9zw" class="icn-yt-color" target="_blank"></a>
                                </li>
                                <li class="col-4 bsbb left pt5">
                                    <a href="https://www.instagram.com/revistalacapitalmx" class="icn-insta-color" target="_blank"></a>
                                </li>
                            </ul>
                        </div>
                        <div class="menuFixedLogo prelative">
                            <span class="openMenuFixed inactive transitionBG"></span>
                            <?php if($logo): ?>
                                <a href="<?php print $front_page?>" title="<?php print t( 'Home' ); ?>" rel="home">
                                    <img src="<?php print $logo; ?>" alt="<?php print t( 'Home' ); ?>" />
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="menuFixedRevista prelative">
                            <div class="arrow-right"></div>
                            <div class="download-seccion">
                                <span class="revista-header">¡CADA MARTES UN NUEVO NÚMERO!</span>
                                <div class="revista">
                                    <img src="<?php print $revista["portada"]?>" />
                                </div>
                                <div class="download-section">
                                    <span class="revista-sub">OBTÉN GRATIS</span>
                                    <span class="revista-sub">LA CAPITAL </span>
                                    <a class="d-button" href="<?php print $revista["file"]?>" target="_blank" title="">Descargar</a>
                                </div>
                            </div>
                        </div>
                        <div class="menuFixed-impreso left">
                            <!--Region header-->
                            <?php print render($page['header']); ?>
                            <!-- /Region header-->
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="menuFixed-hidden">
                        <div id="menu-content" class="limited">
                            <div class="left cuad-2">
                                <select id="change-ciudad">
                                    <option value="cdmx" selected>
                                        Ciudad de México
                                         </option>
                                    <option value="queretaro">
                                        Querétaro
                                    </option>
                                    <option value="edomex">
                                        Estado de México
                                    </option>
                                </select>
                            </div>
                            <nav class="menuFixedNav left cuad-8 bsbb">
                                <!--Región navigation-->
                                <?php print render($page['menu_bar']); ?>
                                <!-- / Región navigation-->
                            </nav>
                            <div class="menuFixed-search left cuad-2 bsbb mt5">
                                <!--Región search-->
                                <?php print render($page['search_form']); ?>
                                <!-- /Región search-->
                            </div>
                        <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </header>
        </div>
        <div id="pageContent">
            <div class="tabs limited centered"><?php print render($tabs); ?></div>
            <div id="messagesContent" class="limited prelative">
                <?php if ($logged_in && $is_admin): ?>
                    <?php print $messages;?>
                    <?php print render($page['highlight']); ?>
                    <?php print render($page['messages']); ?>
                    <?php print render($page['help']); ?>
                <?php endif; ?>
            </div>
            <div class="tacenter pal10" id="super-banner-top">
                        <a href="<?php print $banner['target']//print $super["url"]?>" target="_blank">
                        <img class="img-fluid"  itemprop="image" src="<?php print $banner['image']?>" alt="" />
                    </a>
            </div>
            <div id="contentTop">
                <!--Region content top-->
                <?php print render($page['content_top']); ?>
                <!--/Region content top-->
            </div>
            <?php if(arg(0) == 'videorama'):?>
                <div id="mainContent" class="limited prelative">
                    <!--Region content main-->
                    <?php print render($page['content']); ?>
                    <!--/Region content main-->
                    <!--Region content bottom-->
                    <?php print render($page['content_bottom']); ?>
                    <!--/Region content bottom-->
                </div>
            <?php else:?>
                <div id="mainContent" class="limited prelative">
                    <div id="main_container_left" class="left bsbb w100p prelative pl10">
                        <!--Region content main-->
                        <?php print render($page['content']); ?>
                        <!--/Region content main-->
                        <!--Region content bottom-->
                        <?php print render($page['content_bottom']); ?>
                        <!--/Region content bottom-->
                    </div>
                    <div id="main_container_right" class="right">
                        <!--Region sidebar second-->
                        <?php if(!drupal_is_front_page()):?>
                            <?php print render($page['sidebar_second']); ?>
                        <?php endif?>
                        <!--/Region sidebar second-->
                    </div>
                    <div class="clear"></div>
                </div>
            <?php endif;?>
        </div>
        <footer id="footer">
            <!--Region footer-->
            <?php print render($page['footer']); ?>
            <!--/Region footer-->
        </footer>
    </div>
</div>
<?php print render($page['closure']); ?>
