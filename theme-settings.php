<?php

/**
 * @file
 * CLF THEME INFO.
 */

use Drupal\Core\Form\FormStateInterface;

/**
 * Implements hook_form_system_theme_settings_alter().
 */
function galactus_form_system_theme_settings_alter(&$form, FormStateInterface &$form_state) {
  // Move the default theme settings to our custom vertical tabs for core theme
  // settings.
  $form['core'] = [
    '#type' => 'vertical_tabs',
    '#prefix' => '<h2><small>' . t('Override Global Settings') . '</small></h2>',
    '#weight' => 0,
  ];

  $form['theme_settings']['#group'] = 'core';
  $form['logo']['#group'] = 'core';
  $form['favicon']['#group'] = 'core';

  // CLF FORM SETTINGS.
  $form['clf_credits'] = [
    '#type' => 'fieldset',
    '#title' => t('UBC CLF 7.0.4 Drupal Theme Information'),
    '#prefix' => '<h1>' . t('UBC CLF for Drupal') . '</h1>',
    '#weight' => -10,
    '#description' => t('The CLF 7.0.4 Drupal theme is a responsive theme, developed by the <a href=":url_web_services" title="Contact UBC IT Web Services" target="_blank">UBC IT Web Services Department</a>.<br><br>The <a href=":url_clf" title="Discover the UBC CLF Brand" target="_blank">CLF</a> is developed and distributed by Communications &amp; Marketing. For support <a href=":url_support" title="Contact UBC Communications & Marketing" target="_blank">please contact us</a>.<br><br>To report an issue with this theme, please visit <a href="https://github.com/ubc-web-services/Galactus" target="_blank">the repository on Github</a>', [
      ':url_web_services' => 'http://web.it.ubc.ca/forms/webservices/',
      ':url_support' => 'http://clf.ubc.ca/support',
      ':url_clf' => 'http://brand.ubc.ca/clf',
    ]),
  ];

  // Custom settings in Vertical Tabs container.
  $form['clf'] = [
    '#type' => 'vertical_tabs',
    '#prefix' => '<h2>' . t('CLF Settings') . '</h2>',
    '#weight' => -9,
    '#default_tab' => 'general',
  ];

  // CLF GENERAL OPTIONS.
  $form['general'] = [
    '#type' => 'details',
    '#title' => t('General Settings'),
    '#group' => 'clf',
  ];

  $form['general']['clf_unitname'] = [
    '#type' => 'textfield',
    '#prefix' => t('<h2>General Site Information</h2>'),
    '#title' => t('This field will populate the <a href=":url_unit_name" title="View the location of the Unit Name" target="_blank">Unit Name</a> in the header and the <a href=":url_unit_sub_footer" title="View the location of the Unit Sub Footer" target="_blank">Unit Sub Footer</a>.', [
      ':url_unit_name' => 'http://clf.ubc.ca/parts-of-the-clf/#unit-name',
      ':url_unit_sub_footer' => 'http://clf.ubc.ca/parts-of-the-clf/#unit-sub-footer',
    ]),
    '#default_value' => theme_get_setting('clf_unitname'),
    '#size' => 60,
    '#maxlength' => 128,
    '#required' => TRUE,
  ];

  $form['general']['clf_theme_colour'] = [
    '#type' => 'select',
    '#title' => t('CLF Colour Scheme'),
    '#description' => t('View <a href=":url" target="_blank">colour theme options</a> and design specifications.', [
      ':url' => 'http://clf.ubc.ca/design-specifications',
      ':img-bw' => 'http://clf.ubc.ca/design-specifications',
      ':img-wb' => 'http://clf.ubc.ca/design-specifications',
      ':img-gw' => 'http://clf.ubc.ca/design-specifications',
      ':img-wg' => 'http://clf.ubc.ca/design-specifications',
    ]),
    '#default_value' => theme_get_setting('clf_theme_colour'),
    '#options' => [
      'wb' => t('White on Blue'),
      'wg' => t('White on Grey'),
      'gw' => t('Grey on White'),
      'bw' => t('Blue on White'),
    ],
  ];

  $form['general']['clf_override'] = [
    '#type' => 'checkbox',
    '#title' => t('<strong>Use Minimal CLF</strong>'),
    '#description' => t('Use an external, minimal copy of the CLS css files.<br><strong>Warning</strong>: Advanced users only. This will require creating and adding your own css for non-clf regions of the site, including navigation.<br><small><strong>Replaced by <i>CLF Version and Source</i> setting, kept for legacy purposes.</strong></small>'),
    '#default_value' => theme_get_setting('clf_override'),
  ];

  $form['general']['clf_source'] = [
    '#type' => 'select',
    '#title' => t('<strong>CLF Version and Source</strong>'),
    '#description' => t('Choose the version and source of the UBC CLF.<br><strong>Warning</strong>: Minimal and local versions are inteneded for advanced users only. These will require creating and adding your own css for non-clf regions of the site, including navigation.<br><small>Replaces the Old Use Minimal CLF setting</small>'),
    '#default_value' => theme_get_setting('clf_source'),
    '#options' => [
      '' => t('CDN Full Version - default'),
      'min' => t('CDN Minimal Version'),
      'local' => t('Local Minimal Version'),
    ],
  ];

  $form['general']['clf_use_whitney'] = [
    '#type' => 'select',
    '#title' => t('Use the UBC Whitney webfont'),
    '#description' => t('If you\'d like to use the Whitney webfont on the website, choose the version you will be using.<br /><small>Please note that the production version provided by Web Communications requires authorization via <a href=":url">this form</a>, and it only includes two weights (400 and 600).</small>', [
      ':url' => 'http://brand.ubc.ca/font-request-form/',
    ]),
    '#default_value' => theme_get_setting('clf_use_whitney'),
    '#options' => [
      '' => t("Don't use Whitney"),
      'dev' => t('Web Services - Development version'),
      'prod' => t('Web Communications - Production version'),
    ],
  ];

  // CLF UNIT / WEBSITE INFORMATION.
  $form['unit'] = [
    '#type' => 'details',
    '#title' => t('Unit Settings'),
    '#group' => 'clf',
  ];

  $form['unit']['clf_unit_campus'] = [
    '#type' => 'select',
    '#title' => t('Campus Identity'),
    '#prefix' => t('<h2>General Unit Information</h2>'),
    '#description' => t('This field shows your unit\'s campus mandate: Vancouver Campus or Okanagan Campus.<br /><small>If your unit has an institution-wide mandate or if neither choice is applicable, select the third option. See <a href=":url" target="_blank">Campus Identity</a> for guidelines.</small>', [
      ':url' => 'http://clf.ubc.ca/parts-of-the-clf',
    ]),
    '#default_value' => theme_get_setting('clf_unit_campus'),
    '#options' => [
      'vancouver' => t('Vancouver'),
      'okanagan' => t('Okanagan'),
      '' => t('Institution-wide mandate / Not applicable'),
    ],
  ];

  $form['unit']['clf_faculty'] = [
    '#type' => 'checkbox',
    '#title' => t('<strong>Is your unit part of a Faculty?</strong>'),
    '#default_value' => theme_get_setting('clf_faculty'),
  ];

  $form['unit']['clf_faculty_name'] = [
    '#type' => 'select',
    '#title' => t('If yes, choose your Faculty'),
    '#default_value' => theme_get_setting('clf_faculty_name'),
    '#options' => [
      'Allard School of Law' => t('Allard School of Law'),
      'Faculty of Applied Science' => t('Faculty of Applied Science'),
      'Faculty of Arts' => t('Faculty of Arts'),
      'Faculty of Dentistry' => t('Faculty of Dentistry'),
      'Faculty of Education' => t('Faculty of Education'),
      'Faculty of Forestry' => t('Faculty of Forestry'),
      'Faculty of Land and Food Systems' => t('Faculty of Land and Food Systems'),
      'Faculty of Medicine' => t('Faculty of Medicine'),
      'Faculty of Pharmaceutical Sciences' => t('Faculty of Pharmaceutical Sciences'),
      'Faculty of Science' => t('Faculty of Science'),
      'Graduate and Postdoctoral Studies' => t('Graduate and Postdoctoral Studies'),
      'Sauder School of Business' => t('Sauder School of Business'),
    ],
  ];

  $form['unit']['clf_theme_unit_colour'] = [
    '#type' => 'textfield',
    '#title' => t('Unit Name Background Colour'),
    '#description' => t('See design specifications for <a href=":url" title="Learn more about the Unit Name background colours" target="_blank">Unit Name background colours</a>. Use HEX colour (do not include the #)', [
      ':url' => 'http://clf.ubc.ca/parts-of-the-clf/#unit-colors',
    ]),
    '#size' => 7,
    '#maxlength' => 7,
    '#default_value' => theme_get_setting('clf_theme_unit_colour'),
  ];

  $form['unit']['unuglify'] = [
    '#type' => 'checkbox',
    '#title' => t('<strong>Remove the gradient from the unit name area?</strong>'),
    '#default_value' => theme_get_setting('unuglify'),
  ];

  // LOCATION INFORMATION.
  $form['location'] = [
    '#type' => 'details',
    '#title' => t('Location and Contact Settings'),
    '#group' => 'clf',
  ];

  $form['location']['clf_streetaddr'] = [
    '#type' => 'textfield',
    '#title' => t('Street Address'),
    '#prefix' => t('<h2>Address and Location Information</h2>'),
    '#default_value' => theme_get_setting('clf_streetaddr'),
    '#size' => 60,
    '#maxlength' => 128,
  ];

  $form['location']['clf_locality'] = [
    '#type' => 'textfield',
    '#title' => t('City'),
    '#default_value' => theme_get_setting('clf_locality'),
    '#size' => 60,
    '#maxlength' => 128,
  ];

  $form['location']['clf_region'] = [
    '#type' => 'textfield',
    '#title' => t('Province / Region'),
    '#default_value' => theme_get_setting('clf_region'),
    '#size' => 60,
    '#maxlength' => 128,
  ];

  $form['location']['clf_country'] = [
    '#type' => 'textfield',
    '#title' => t('Country'),
    '#default_value' => theme_get_setting('clf_country'),
    '#size' => 60,
    '#maxlength' => 128,
  ];

  $form['location']['clf_postal'] = [
    '#type' => 'textfield',
    '#title' => t('Postal Code'),
    '#default_value' => theme_get_setting('clf_postal'),
    '#size' => 60,
    '#maxlength' => 128,
  ];

  $form['location']['clf_telephone'] = [
    '#type' => 'textfield',
    '#title' => t('Telephone Number - format as xxx xxx xxxx (spaces only)'),
    '#default_value' => theme_get_setting('clf_telephone'),
    '#size' => 60,
    '#maxlength' => 128,
  ];

  $form['location']['clf_fax'] = [
    '#type' => 'textfield',
    '#title' => t('Fax Number - format as xxx xxx xxxx (spaces only)'),
    '#default_value' => theme_get_setting('clf_fax'),
    '#size' => 60,
    '#maxlength' => 128,
  ];

  $form['location']['clf_email'] = [
    '#type' => 'textfield',
    '#title' => t('Email'),
    '#default_value' => theme_get_setting('clf_email'),
    '#size' => 60,
    '#maxlength' => 128,
  ];

  $form['location']['clf_website'] = [
    '#type' => 'textfield',
    '#title' => t('Website'),
    '#description' => t('Do not include the <em>http://</em>'),
    '#default_value' => theme_get_setting('clf_website'),
    '#size' => 60,
    '#maxlength' => 128,
  ];

  // SOCIAL.
  $form['social'] = [
    '#type' => 'details',
    '#title' => t('Social Media Settings'),
    '#group' => 'clf',
  ];

  $form['social']['clf_social_facebook'] = [
    '#type' => 'textfield',
    '#title' => t('Facebook Account Link'),
    '#prefix' => t('<h2>Add Social Media icons/links to the unit footer</h2>'),
    '#default_value' => theme_get_setting('clf_social_facebook'),
    '#size' => 60,
    '#maxlength' => 128,
    '#description' => t('Format of https://www.xyz.com'),
  ];

  $form['social']['clf_social_twitter'] = [
    '#type' => 'textfield',
    '#title' => t('Twitter Account Link'),
    '#default_value' => theme_get_setting('clf_social_twitter'),
    '#size' => 60,
    '#maxlength' => 128,
    '#description' => t('Format of https://www.xyz.com'),
  ];

  $form['social']['clf_social_linkedin'] = [
    '#type' => 'textfield',
    '#title' => t('Linkedin Account Link'),
    '#default_value' => theme_get_setting('clf_social_linkedin'),
    '#size' => 60,
    '#maxlength' => 128,
    '#description' => t('Format of https://www.xyz.com'),
  ];

  $form['social']['clf_social_instagram'] = [
    '#type' => 'textfield',
    '#title' => t('Instagram Account Link'),
    '#default_value' => theme_get_setting('clf_social_instagram'),
    '#size' => 60,
    '#maxlength' => 128,
    '#description' => t('Format of https://www.xyz.com'),
  ];

  $form['social']['clf_social_youtube'] = [
    '#type' => 'textfield',
    '#title' => t('YouTube Account Link'),
    '#default_value' => theme_get_setting('clf_social_youtube'),
    '#size' => 60,
    '#maxlength' => 128,
    '#description' => t('Format of https://www.xyz.com'),
  ];

  // SEARCH.
  $form['search'] = [
    '#type' => 'details',
    '#title' => t('Search Settings'),
    '#group' => 'clf',
  ];

  $form['search']['clf_searchdomain'] = [
    '#type' => 'textfield',
    '#title' => t('Search Domain'),
    '#default_value' => theme_get_setting('clf_searchdomain'),
    '#prefix' => t('<h2>Default Search Settings</h2>'),
    '#size' => 60,
    '#maxlength' => 128,
    '#description' => t('This option allows you to limit search results in the global UBC search field to a specific domain other than this site. e.g. <strong>*.arts.ubc.ca</strong> or <strong>www.publicaffairs.ubc.ca/category/</strong>. The default searches only this site.'),
  ];

  $form['search']['clf_searchlabel'] = [
    '#type' => 'textfield',
    '#title' => t('Search Field Placeholder (usually your unit name)'),
    '#default_value' => theme_get_setting('clf_searchlabel'),
    '#size' => 60,
    '#maxlength' => 128,
    '#description' => t('This appears inside the search field as placeholder text. e.g. <strong>Search Pharmacy</strong>'),
  ];

  $form['search']['clf_google_verify'] = [
    '#type' => 'textfield',
    '#title' => t('Google Site Verification Code'),
    '#description' => t('Adds a meta tag to your site to allow you to verify the property with Google'),
    '#default_value' => theme_get_setting('clf_google_verify'),
    '#size' => 60,
    '#maxlength' => 128,
  ];

  $form['search']['clf_bing_verify'] = [
    '#type' => 'textfield',
    '#title' => t('Bing Site Verification Code'),
    '#description' => t('Adds a meta tag to your site to allow you to verify the property with Bing'),
    '#default_value' => theme_get_setting('clf_bing_verify'),
    '#size' => 60,
    '#maxlength' => 128,
  ];

  // Navigation.
  $form['navigation'] = [
    '#type' => 'details',
    '#title' => t('Navigation Settings'),
    '#group' => 'clf',
  ];
  $form['navigation']['clf_navigation_placement'] = [
    '#type' => 'select',
    '#title' => t('Choose the type of primary navigation that should be used on this website.'),
    '#prefix' => t('<h2>General Navigation Options</h2>'),
    '#default_value' => theme_get_setting('clf_navigation_placement'),
    '#options' => [
      'default' => t('Default CLF - Horizontal'),
      'drawer--push-left' => t('Drawer: Push Content to Left'),
      'drawer--cover-left' => t('Drawer: Cover Towards Left'),
      'drawer--push-right' => t('Drawer: Push Content to Right'),
      'drawer--cover-right' => t('Drawer: Cover Towards Right'),
    ],
  ];

  $form['navigation']['clf_navigation_sticky'] = [
    '#type' => 'checkbox',
    '#title' => t('<strong>Make the default CLF navigation sticky.</strong>'),
    '#description' => t("If you'd like the primary navigation to be 'sticky' (stay on top of window when scrolling downward), select this option."),
    '#default_value' => theme_get_setting('clf_navigation_sticky'),
  ];

  $form['navigation']['clf_navoption'] = [
    '#type' => 'checkbox',
    '#title' => t('<strong>Primary Navigation Mobile Placement | NOT YET ACTIVE</strong>'),
    '#description' => t('Show the Primary Navigation at the bottom of the page on Mobile devices, in addition to the top navigation placement'),
    '#default_value' => theme_get_setting('clf_navoption'),
  ];

  // Grid.
  $form['layout'] = [
    '#type' => 'details',
    '#title' => t('Layout Settings'),
    '#group' => 'clf',
  ];

  $form['layout']['clf_layout'] = [
    '#type' => 'select',
    '#title' => t('Layout'),
    '#prefix' => t('<h2>Layout and Content CSS Grid Classes</h2>'),
    '#description' => t('Make the CLF Full Width and Centered, Full Width and Left Aligned, or Fixed Width and Centered'),
    '#default_value' => theme_get_setting('clf_layout'),
    '#options' => [
      '' => t('Default (Centered with Grey Background)'),
      'fluid' => t('Full Width CLF (Left-Aligned)'),
      'full' => t('Full Width CLF (Centered)'),
    ],
  ];

  $form['layout']['clf_content_row_class'] = [
    '#type' => 'textfield',
    '#title' => t('Grid row class to use for containing the content columns'),
    '#description' => t('(ie. row-fluid expand)'),
    '#prefix' => t('<h2>Content CSS Grid Classes</h2>'),
    '#size' => 60,
    '#maxlength' => 128,
    '#required' => TRUE,
    '#default_value' => theme_get_setting('clf_content_row_class'),
  ];

  $form['layout']['clf_no_sidebar_class'] = [
    '#type' => 'textfield',
    '#title' => t('Grid classes to use when no sidebars'),
    '#description' => t('(ie. span12 col-md-12)'),
    '#size' => 60,
    '#maxlength' => 128,
    '#required' => TRUE,
    '#default_value' => theme_get_setting('clf_no_sidebar_class'),
  ];

  $form['layout']['clf_one_sidebar_class'] = [
    '#type' => 'textfield',
    '#title' => t('Grid classes to use for content when one sidebar'),
    '#description' => t('(ie. span9 col-md-9)'),
    '#size' => 60,
    '#maxlength' => 128,
    '#required' => TRUE,
    '#default_value' => theme_get_setting('clf_one_sidebar_class'),
  ];

  $form['layout']['clf_one_sidebar_class_sidebar'] = [
    '#type' => 'textfield',
    '#title' => t('Grid classes to use for sidebar when one sidebar'),
    '#description' => t('(ie. span3 col-md-3)'),
    '#size' => 60,
    '#maxlength' => 128,
    '#required' => TRUE,
    '#default_value' => theme_get_setting('clf_one_sidebar_class_sidebar'),
  ];

  $form['layout']['clf_two_sidebar_class'] = [
    '#type' => 'textfield',
    '#title' => t('Grid classes to use for content when two sidebars'),
    '#description' => t('(ie. span6 col-md-6)'),
    '#size' => 60,
    '#maxlength' => 128,
    '#required' => TRUE,
    '#default_value' => theme_get_setting('clf_two_sidebar_class'),
  ];

  $form['layout']['clf_two_sidebar_class_sidebar1'] = [
    '#type' => 'textfield',
    '#title' => t('Grid classes to use for first sidebar when two sidebars'),
    '#description' => t('(ie. span3 col-md-3)'),
    '#size' => 60,
    '#maxlength' => 128,
    '#required' => TRUE,
    '#default_value' => theme_get_setting('clf_two_sidebar_class_sidebar1'),
  ];

  $form['layout']['clf_two_sidebar_class_sidebar2'] = [
    '#type' => 'textfield',
    '#title' => t('Grid classes to use for second sidebar when two sidebars'),
    '#description' => t('(ie. span3 col-md-3)'),
    '#size' => 60,
    '#maxlength' => 128,
    '#required' => TRUE,
    '#default_value' => theme_get_setting('clf_two_sidebar_class_sidebar2'),
  ];

  // Extras.
  $form['extra'] = [
    '#type' => 'details',
    '#title' => t('Extra Settings'),
    '#group' => 'clf',
  ];

  $form['extra']['clf_noindex'] = [
    '#type' => 'checkbox',
    '#title' => t('<strong>Do <em>not</em> allow the site to be indexed</strong>'),
    '#prefix' => t('<h2>Additional Miscellaneous Options</h2>'),
    '#description' => t('If this is <strong>not</strong> a production website, this checkbox will add a "nofollow" meta tag to all pages.'),
    '#default_value' => theme_get_setting('clf_noindex'),
  ];

  $form['extra']['clf_fontawesome'] = [
    '#type' => 'checkbox',
    '#title' => t('<strong>Use Fontawesome 4.7.x</strong>'),
    '#description' => t('Add all Fontawesome icon fonts to the site. <a href=":url" target="_blank">Read the documentation</a>.<br /><small>*Note: unless you\'re using the minimal CLF, version 3.x of the fontawesome library is included with the CLF package. Before enabling this option, please consider using a more efficient alternative, such as SVGs or a generating a free custom icon font through a service like <a href=":url_fontello" target="_blank">Fontello</a> or <a href=":url_icomoon" target="_blank">Icomoon</a>.</small>', [
      ':url' => 'http://fontawesome.io/icons/',
      ':url_fontello' => 'http://fontello.com',
      ':url_icomoon' => 'https://icomoon.io/app',
    ]),
    '#default_value' => theme_get_setting('clf_fontawesome'),
  ];

  return $form;
}
