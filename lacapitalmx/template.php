<?php

/**
 * @file
 * Contains functions to alter Drupal's markup for the Zen theme.
 *
 * IMPORTANT WARNING: DO NOT MODIFY THIS FILE.
 *
 * The base Zen theme is designed to be easily extended by its sub-themes. You
 * shouldn't modify this or any of the CSS or PHP files in the root lacapitalmx/ folder.
 * See the online documentation for more information:
 *   http://drupal.org/documentation/theme/lacapitalmx
 */
// Auto-rebuild the theme registry during theme development.
if (theme_get_setting('lacapitalmx_rebuild_registry') && !defined('MAINTENANCE_MODE')) {
    // Rebuild .info data.
    system_rebuild_theme_data();
    // Rebuild theme registry.
    drupal_theme_rebuild();
}

/**
 * Implements HOOK_theme().
 *
 * We are simply using this hook as a convenient time to do some related work.
 */
function _lacapitalmx_theme(&$existing, $type, $theme, $path) {
    // If we are auto-rebuilding the theme registry, warn about the feature.
    if (
    // Only display for site config admins.
            function_exists('user_access') && user_access('administer site configuration') && theme_get_setting('lacapitalmx_rebuild_registry')
            // Always display in the admin section, otherwise limit to three per hour.
            && (arg(0) == 'admin' || flood_is_allowed($GLOBALS['theme'] . '_rebuild_registry_warning', 3))
    ) {
        flood_register_event($GLOBALS['theme'] . '_rebuild_registry_warning');
        drupal_set_message(t('For easier theme development, the theme registry is being rebuilt on every page request. It is <em>extremely</em> important to <a href="!link">turn off this feature</a> on production websites.', array('!link' => url('admin/appearance/settings/' . $GLOBALS['theme']))), 'warning', FALSE);
    }

    // hook_theme() expects an array, so return an empty one.
//    return array();
    
    $items = array();
    $items['user_login'] = array(
        'render element' => 'form',
        'path' => drupal_get_path('theme', 'lacapitalmx') . '/templates',
        'template' => 'user-login'
    );
    $items['user_register_form'] = array(
        'render element' => 'form',
        'path' => drupal_get_path('theme', 'lacapitalmx') . '/templates',
        'template' => 'user-register-form'
    );
    $items['user_pass'] = array(
        'render element' => 'form',
        'path' => drupal_get_path('theme', 'lacapitalmx') . '/templates',
        'template' => 'user-pass'
    );
    $items['user_profile_form'] = array(
        'render element' => 'form',
        'path' => drupal_get_path('theme', 'lacapitalmx') . '/templates',
        'template' => 'user-profile-edit'
    );
    return $items;
    
//    return array(
//// The form ID.
//        'user_profile_form' => array(
//// Forms always take the form argument.
//            'arguments' => array('form' => NULL),
//            'render element' => 'form',
//            'template' => 'templates/user-profile-edit',
//        ),
//    );
}

//function lacapitalmx_preprocess_user_login(&$vars) {
//  $vars['intro_text'] = t('INICIAR SESIÓN');
//}
//function lacapitalmx_preprocess_user_register_form(&$vars) {
//  $vars['intro_text'] = t('REGÍSTRATE EN ACTITUDFEM');
//}
//function lacapitalmx_preprocess_user_pass(&$vars) {
//  $vars['intro_text'] = t('RECUPERAR CONTRASEÑA');
//}


/**
 * Implements HOOK_theme().
 */
function lacapitalmx_theme(&$existing, $type, $theme, $path) {
//  $ruta = '/' . drupal_get_path('theme', 'lacapitalmx') . '/lacapitalmx-internals/template.theme-registry.inc';
//  include_once $ruta;
    return _lacapitalmx_theme($existing, $type, $theme, $path);
}

function lacapitalmx_preprocess_search_results(&$vars) {
    // search.module shows 10 items per page (this isn't customizable)
    $itemsPerPage = 10;
    // Determine which page is being viewed
    // If $_REQUEST['page'] is not set, we are on page 1
    $currentPage = (isset($_REQUEST['page']) ? $_REQUEST['page'] : 0) + 1;
    // Get the total number of results from the global pager
    $total = $GLOBALS['pager_total_items'][0];
    // Determine which results are being shown ("Showing results x through y")
    $start = (10 * $currentPage) - 9;
    // If on the last page, only go up to $total, not the total that COULD be
    // shown on the page. This prevents things like "Displaying 11-20 of 17".
    $end = (($itemsPerPage * $currentPage) >= $total) ? $total : ($itemsPerPage * $currentPage);
    // If there is more than one page of results:
    if ($total > $itemsPerPage) {
        $vars['search_totals'] = $total;
    } else {
        // Only one page of results, so make it simpler
        $vars['search_totals'] = $total;
    }
}

/**
 * Return a themed breadcrumb trail.
 *
 * @param $variables
 *   - title: An optional string to be used as a navigational heading to give
 *     context for breadcrumb links to screen-reader users.
 *   - title_attributes_array: Array of HTML attributes for the title. It is
 *     flattened into a string within the theme function.
 *   - breadcrumb: An array containing the breadcrumb links.
 * @return
 *   A string containing the breadcrumb output.
 */
//function lacapitalmx_breadcrumb($variables) {
//    $breadcrumb = $variables['breadcrumb'];
//    $output = '';
//
//    // Determine if we are to display the breadcrumb.
//    $show_breadcrumb = theme_get_setting('lacapitalmx_breadcrumb');
//    if ($show_breadcrumb == 'yes' || $show_breadcrumb == 'admin' && arg(0) == 'admin') {
//
//        // Optionally get rid of the homepage link.
//        $show_breadcrumb_home = theme_get_setting('lacapitalmx_breadcrumb_home');
//        if (!$show_breadcrumb_home) {
//            array_shift($breadcrumb);
//        }
//
//        // Return the breadcrumb with separators.
//        if (!empty($breadcrumb)) {
//            $breadcrumb_separator = theme_get_setting('lacapitalmx_breadcrumb_separator');
//            $trailing_separator = $title = '';
//            if (theme_get_setting('lacapitalmx_breadcrumb_title')) {
//                $item = menu_get_item();
//                if (!empty($item['tab_parent'])) {
//                    // If we are on a non-default tab, use the tab's title.
//                    $breadcrumb[] = check_plain($item['title']);
//                } else {
//                    $breadcrumb[] = drupal_get_title();
//                }
//            } elseif (theme_get_setting('lacapitalmx_breadcrumb_trailing')) {
//                $trailing_separator = $breadcrumb_separator;
//            }
//
//            // Provide a navigational heading to give context for breadcrumb links to
//            // screen-reader users.
//            if (empty($variables['title'])) {
//                $variables['title'] = t('You are here');
//            }
//            // Unless overridden by a preprocess function, make the heading invisible.
//            if (!isset($variables['title_attributes_array']['class'])) {
//                $variables['title_attributes_array']['class'][] = 'element-invisible';
//            }
//
//            // Build the breadcrumb trail.
//            $output = '<nav class="breadcrumb" role="navigation">';
//            $output .= '<h2' . drupal_attributes($variables['title_attributes_array']) . '>' . $variables['title'] . '</h2>';
//            $output .= '<ol><li>' . implode($breadcrumb_separator . '</li><li>', $breadcrumb) . $trailing_separator . '</li></ol>';
//            $output .= '</nav>';
//        }
//    }
//
//    return $output;
//}

/**
 * Override or insert variables into the html template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered. This is usually "html", but can
 *   also be "maintenance_page" since lacapitalmx_preprocess_maintenance_page() calls
 *   this function to have consistent variables.
 */
function lacapitalmx_preprocess_html(&$variables, $hook) {
    // Add variables and paths needed for HTML5 and responsive support.
    $variables['base_path'] = base_path();
    $variables['path_to_lacapitalmx'] = drupal_get_path('theme', 'lacapitalmx');
    $html5_respond_meta = theme_get_setting('lacapitalmx_html5_respond_meta');
    if($html5_respond_meta) {
        $variables['add_respond_js'] = in_array('respond', $html5_respond_meta);
        $variables['add_html5_shim'] = in_array('html5', $html5_respond_meta);
        $variables['default_mobile_metatags'] = in_array('meta', $html5_respond_meta);
    }

    // If the user is silly and enables Zen as the theme, add some styles.
    if ($GLOBALS['theme'] == 'lacapitalmx') {
        include_once './' . $variables['path_to_lacapitalmx'] . '/lacapitalmx-internals/template.lacapitalmx.inc';
        _lacapitalmx_preprocess_html($variables, $hook);
    }

    // Attributes for html element.
    $variables['html_attributes_array'] = array(
        'lang' => $variables['language']->language,
        'dir' => $variables['language']->dir,
    );

    // Send X-UA-Compatible HTTP header to force IE to use the most recent
    // rendering engine or use Chrome's frame rendering engine if available.
    // This also prevents the IE compatibility mode button to appear when using
    // conditional classes on the html tag.
    if (is_null(drupal_get_http_header('X-UA-Compatible'))) {
        drupal_add_http_header('X-UA-Compatible', 'IE=edge,chrome=1');
    }

    $variables['skip_link_anchor'] = theme_get_setting('lacapitalmx_skip_link_anchor');
    $variables['skip_link_text'] = theme_get_setting('lacapitalmx_skip_link_text');

    // Return early, so the maintenance page does not call any of the code below.
    if ($hook != 'html') {
        return;
    }

    // Classes for body element. Allows advanced theming based on context
    // (home page, node of certain type, etc.)
    if (!$variables['is_front']) {
        // Add unique class for each page.
        $path = drupal_get_path_alias($_GET['q']);
        // Add unique class for each website section.
        list($section, ) = explode('/', $path, 2);
        $arg = explode('/', $_GET['q']);
        if ($arg[0] == 'node' && isset($arg[1])) {
            if ($arg[1] == 'add') {
                $section = 'node-add';
            } elseif (isset($arg[2]) && is_numeric($arg[1]) && ($arg[2] == 'edit' || $arg[2] == 'delete')) {
                $section = 'node-' . $arg[2];
            }
        }
        $variables['classes_array'][] = drupal_html_class('section-' . $section);
    }
    if (theme_get_setting('lacapitalmx_wireframes')) {
        $variables['classes_array'][] = 'with-wireframes'; // Optionally add the wireframes style.
    }
    // Store the menu item since it has some useful information.
    $variables['menu_item'] = menu_get_item();
    if ($variables['menu_item']) {
        switch ($variables['menu_item']['page_callback']) {
            case 'views_page':
                // Is this a Views page?
                $variables['classes_array'][] = 'page-views';
                break;
            case 'page_manager_page_execute':
            case 'page_manager_node_view':
            case 'page_manager_contact_site':
                // Is this a Panels page?
                $variables['classes_array'][] = 'page-panels';
                break;
        }
    }
}

/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
function lacapitalmx_process_html(&$variables, $hook) {
    // Flatten out html_attributes.
    $variables['html_attributes'] = drupal_attributes($variables['html_attributes_array']);
}

/**
 * Override or insert variables in the html_tag theme function.
 */
function lacapitalmx_process_html_tag(&$variables) {
    $tag = &$variables['element'];

    if ($tag['#tag'] == 'style' || $tag['#tag'] == 'script') {
        // Remove redundant type attribute and CDATA comments.
        unset($tag['#attributes']['type'], $tag['#value_prefix'], $tag['#value_suffix']);

        // Remove media="all" but leave others unaffected.
        if (isset($tag['#attributes']['media']) && $tag['#attributes']['media'] === 'all') {
            unset($tag['#attributes']['media']);
        }
    }
}

/**
 * Implement hook_html_head_alter().
 */
function lacapitalmx_html_head_alter(&$head) {
    // Simplify the meta tag for character encoding.
    if (isset($head['system_meta_content_type']['#attributes']['content'])) {
        $head['system_meta_content_type']['#attributes'] = array('charset' => str_replace('text/html; charset=', '', $head['system_meta_content_type']['#attributes']['content']));
    }
}

/**
 * Override or insert variables into the page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
function lacapitalmx_preprocess_page(&$variables, $hook) {
    // Find the title of the menu used by the secondary links.
    $secondary_links = variable_get('menu_secondary_links_source', 'user-menu');
    if ($secondary_links) {
        $menus = function_exists('menu_get_menus') ? menu_get_menus() : menu_list_system_menus();
        $variables['secondary_menu_heading'] = $menus[$secondary_links];
    } else {
        $variables['secondary_menu_heading'] = '';
    }
}

/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
function lacapitalmx_preprocess_maintenance_page(&$variables, $hook) {
    lacapitalmx_preprocess_html($variables, $hook);
    // There's nothing maintenance-related in lacapitalmx_preprocess_page(). Yet.
    //lacapitalmx_preprocess_page($variables, $hook);
}

/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
function lacapitalmx_process_maintenance_page(&$variables, $hook) {
    lacapitalmx_process_html($variables, $hook);
    // Ensure default regions get a variable. Theme authors often forget to remove
    // a deleted region's variable in maintenance-page.tpl.
    foreach (array('header', 'navigation', 'highlighted', 'help', 'content', 'sidebar_first', 'sidebar_second', 'footer', 'bottom') as $region) {
        if (!isset($variables[$region])) {
            $variables[$region] = '';
        }
    }
}

/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
function lacapitalmx_preprocess_node(&$variables, $hook) {
    unset($content['links']['statistics']['#links']['statistics_counter']['title']);
    $regions = array(
        0 => 'related',
        1 => 'shares',
        2 => 'editorprofile');
    foreach ($regions as $region) {
        if ($blocks = block_get_blocks_by_region($region)) {
            $variables[$region] = $blocks;
        }
    }
    // Add $unpublished variable.
    $variables['unpublished'] = (!$variables['status']) ? TRUE : FALSE;
    // Add pubdate to submitted variable.
    $variables['pubdate'] = '<time pubdate datetime="' . format_date($variables['node']->created, 'custom', 'c') . '">' . $variables['date'] . '</time>';
    if ($variables['display_submitted']) {
        $variables['submitted'] = t('Submitted by !username on !datetime', array('!username' => $variables['name'], '!datetime' => $variables['pubdate']));
    }
    // Add a class for the view mode.
    if (!$variables['teaser']) {
        $variables['classes_array'][] = 'view-mode-' . $variables['view_mode'];
    }
    // Add a class to show node is authored by current user.
    if ($variables['uid'] && $variables['uid'] == $GLOBALS['user']->uid) {
        $variables['classes_array'][] = 'node-by-viewer';
    }
    $variables['title_attributes_array']['class'][] = 'node-title';
}

/**
 * Override or insert variables into the comment templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
function lacapitalmx_preprocess_comment(&$variables, $hook) {
    // If comment subjects are disabled, don't display them.
    if (variable_get('comment_subject_field_' . $variables['node']->type, 1) == 0) {
        $variables['title'] = '';
    }

    // Add pubdate to submitted variable.
    $variables['pubdate'] = '<time pubdate datetime="' . format_date($variables['comment']->created, 'custom', 'c') . '">' . $variables['created'] . '</time>';
    $variables['submitted'] = t('!username replied on !datetime', array('!username' => $variables['author'], '!datetime' => $variables['pubdate']));

    // Zebra striping.
    if ($variables['id'] == 1) {
        $variables['classes_array'][] = 'first';
    }
    if ($variables['id'] == $variables['node']->comment_count) {
        $variables['classes_array'][] = 'last';
    }
    $variables['classes_array'][] = $variables['zebra'];

    $variables['title_attributes_array']['class'][] = 'comment-title';
}

/**
 * Preprocess variables for region.tpl.php
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
function lacapitalmx_preprocess_region(&$variables, $hook) {
    // Sidebar regions get some extra classes and a common template suggestion.
    if (strpos($variables['region'], 'sidebar_') === 0) {
        $variables['classes_array'][] = 'column';
        $variables['classes_array'][] = 'sidebar';
        // Allow a region-specific template to override Zen's region--sidebar.
        array_unshift($variables['theme_hook_suggestions'], 'region__sidebar');
    }
    // Use a template with no wrapper for the content region.
    elseif ($variables['region'] == 'content') {
        // Allow a region-specific template to override Zen's region--no-wrapper.
        array_unshift($variables['theme_hook_suggestions'], 'region__no_wrapper');
    }
}

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
function lacapitalmx_preprocess_block(&$variables, $hook) {
    // Use a template with no wrapper for the page's main content.
    if ($variables['block_html_id'] == 'block-system-main') {
        $variables['theme_hook_suggestions'][] = 'block__no_wrapper';
    }

    // Classes describing the position of the block within the region.
    if ($variables['block_id'] == 1) {
        $variables['classes_array'][] = 'first';
    }
    // The last_in_region property is set in lacapitalmx_page_alter().
    if (isset($variables['block']->last_in_region)) {
        $variables['classes_array'][] = 'last';
    }
    $variables['classes_array'][] = $variables['block_zebra'];

    $variables['title_attributes_array']['class'][] = 'block-title';

    // Add Aria Roles via attributes.
    switch ($variables['block']->module) {
        case 'system':
            switch ($variables['block']->delta) {
                case 'main':
                    // Note: the "main" role goes in the page.tpl, not here.
                    break;
                case 'help':
                case 'powered-by':
                    $variables['attributes_array']['role'] = 'complementary';
                    break;
                default:
                    // Any other "system" block is a menu block.
                    $variables['attributes_array']['role'] = 'navigation';
                    break;
            }
            break;
        case 'menu':
        case 'menu_block':
        case 'blog':
        case 'book':
        case 'comment':
        case 'forum':
        case 'shortcut':
        case 'statistics':
            $variables['attributes_array']['role'] = 'navigation';
            break;
        case 'search':
            $variables['attributes_array']['role'] = 'search';
            break;
        case 'help':
        case 'aggregator':
        case 'locale':
        case 'poll':
        case 'profile':
            $variables['attributes_array']['role'] = 'complementary';
            break;
        case 'node':
            switch ($variables['block']->delta) {
                case 'syndicate':
                    $variables['attributes_array']['role'] = 'complementary';
                    break;
                case 'recent':
                    $variables['attributes_array']['role'] = 'navigation';
                    break;
            }
            break;
        case 'user':
            switch ($variables['block']->delta) {
                case 'login':
                    $variables['attributes_array']['role'] = 'form';
                    break;
                case 'new':
                case 'online':
                    $variables['attributes_array']['role'] = 'complementary';
                    break;
            }
            break;
    }
}

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
function lacapitalmx_process_block(&$variables, $hook) {
    // Drupal 7 should use a $title variable instead of $block->subject.
    $variables['title'] = $variables['block']->subject;
}

/**
 * Implements hook_page_alter().
 *
 * Look for the last block in the region. This is impossible to determine from
 * within a preprocess_block function.
 *
 * @param $page
 *   Nested array of renderable elements that make up the page.
 */
function lacapitalmx_page_alter(&$page) {
    // Look in each visible region for blocks.
    foreach (system_region_list($GLOBALS['theme'], REGIONS_VISIBLE) as $region => $name) {
        if (!empty($page[$region])) {
            // Find the last block in the region.
            $blocks = array_reverse(element_children($page[$region]));
            while ($blocks && !isset($page[$region][$blocks[0]]['#block'])) {
                array_shift($blocks);
            }
            if ($blocks) {
                $page[$region][$blocks[0]]['#block']->last_in_region = TRUE;
            }
        }
    }
}

/**
 * Implements hook_form_BASE_FORM_ID_alter().
 *
 * Prevent user-facing field styling from screwing up node edit forms by
 * renaming the classes on the node edit form's field wrappers.
 */
function lacapitalmx_form_node_form_alter(&$form, &$form_state, $form_id) {
    // Remove if #1245218 is backported to D7 core.
    foreach (array_keys($form) as $item) {
        if (strpos($item, 'field_') === 0) {
            if (!empty($form[$item]['#attributes']['class'])) {
                foreach ($form[$item]['#attributes']['class'] as &$class) {
                    if (strpos($class, 'field-type-') === 0 || strpos($class, 'field-name-') === 0) {
                        // Make the class different from that used in theme_field().
                        $class = 'form-' . $class;
                    }
                }
            }
        }
    }
}

/**
 * Función para actualizar jQuery
 */

function lacapitalmx_js_alter(&$javascript) {
    //We define the path of our new jquery core file
    //assuming we are using the minified version 1.8.3
    $jquery_path = drupal_get_path('theme', 'lacapitalmx') . '/js/jquery1.9.js';

    //We duplicate the important information from the Drupal one
    if(array_key_exists('misc/jquery.js',$javascript)) {
        $javascript[$jquery_path] = $javascript['misc/jquery.js'];
    }
    //..and we update the information that we care about
    $javascript[$jquery_path]['version'] = '1.9';
    $javascript[$jquery_path]['data'] = $jquery_path;

    //Then we remove the Drupal core version
    unset($javascript['misc/jquery.js']);
}