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
    '#description' => t('The CLF 7.0.4 Drupal theme is a responsive theme, developed by the <a href=":url_web_services" title="Contact UBC IT Web Services" target="_blank">UBC IT Web Services Department</a>.<br><br>The <a href=":url_clf" title="Discover the UBC CLF Brand" target="_blank">CLF</a> is developed and distributed by Communications &amp; Marketing. For support <a href=":url_support" title="Contact UBC Communications & Marketing" target="_blank">please contact us</a>.<br><br>To report an issue with this theme, please visit <a href="https://github.com/ubc-web-services/Galactus" target="_bank">the repository on Github</a>', [
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
    '#description' => t('View <a href=":url">colour theme options</a> and design specifications.', [
      ':url' => 'http://clf.ubc.ca/design-specifications',
    ]),
    '#default_value' => theme_get_setting('clf_theme_colour'),
    '#options' => [
      'wb' => t('White on Blue'),
      'wg' => t('White on Grey'),
      'gw' => t('Grey on White'),
      'bw' => t('Blue on White'),
    ],
  ];

  $form['general']['clf_layout'] = [
    '#type' => 'select',
    '#title' => t('Layout'),
    '#description' => t('Make the CLF Full Width'),
    '#default_value' => theme_get_setting('clf_layout'),
    '#options' => [
      '' => t('Default (Centered with Grey Background)'),
      'fluid' => t('Full Width CLF (Left Aligned)'),
      'full' => t('Full Width CLF (Centered)'),
     ],
   ];

  $form['general']['clf_override'] = [
    '#type' => 'checkbox',
    '#title' => t('Minimal CLF'),
    '#description' => t('Use an external, minimal copy of the clf css files.<br><strong>Warning</strong>: Advanced users only. This will require creating and adding your own css form non-clf regions of the site, including navigation.'),
    '#default_value' => theme_get_setting('clf_override'),
  ];

  $form['general']['clf_navoption'] = [
    '#type' => 'checkbox',
    '#title' => t('Primary Navigation Mobile Placement'),
    '#description' => t('Show the Primary Navigation at the bottom of the page on Mobile devices, in addition to the top navigation placement'),
    '#default_value' => theme_get_setting('clf_navoption'),
  ];

  /** CLF CAMPUS IDENTITY OPTIONS
   * ---------------------------------------------------------- */
  $form['identity'] = [
    '#type' => 'details',
    '#title' => t('Campus Identity Settings'),
    '#group' => 'clf',
  ];

  $form['identity']['clf_unit_campus'] = [
    '#type' => 'select',
    '#title' => t('Campus Identity'),
    '#description' => t('This field shows your unit\'s campus mandate: Vancouver Campus or Okanagan Campus. If your unit has an institution-wide mandate or if neither choice is applicable, select the third option. See <a href=":url">Campus Identity</a> for guidelines.', [
      ':url' => 'http://clf.ubc.ca/parts-of-the-clf',
    ]),
    '#default_value' => theme_get_setting('clf_unit_campus'),
    '#options' => [
      'vancouver' => t('Vancouver'),
      'okanagan' => t('Okanagan'),
      '' => t('Institution-wide mandate / Not applicable'),
    ],
  ];

  // CLF UNIT / WEBSITE INFORMATION.
  $form['unit'] = [
    '#type' => 'details',
    '#title' => t('Unit Settings'),
    '#group' => 'clf',
  ];
  $form['unit']['clf_faculty'] = [
    '#type' => 'checkbox',
    '#title' => t('Is your unit part of a Faculty?'),
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
    '#description' => t('See design specifications for <a href="http://clf.ubc.ca/parts-of-the-clf/#unit-colors" title="Learn more about the Unit Name background colours" target="_blank">Unit Name background colours</a>. Use HEX colour (do not include the #)'),
    '#size' => 7,
    '#maxlength' => 7,
    '#default_value' => theme_get_setting('clf_theme_unit_colour'),
  ];
  $form['unit']['unuglify'] = [
    '#type' => 'checkbox',
    '#title' => t('Remove the gradient from the unit name area'),
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
    '#description' => t('Do not include the http://'),
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
  $form['social']['clf_social_googleplus'] = [
    '#type' => 'textfield',
    '#title' => t('Google Plus Account Link'),
    '#default_value' => theme_get_setting('clf_social_googleplus'),
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
    '#size' => 60,
    '#maxlength' => 128,
    '#description' => t('This option allows you to limit search results in your search box to a specific domain. e.g. <strong>*.arts.ubc.ca</strong> or <strong>www.publicaffairs.ubc.ca/category/</strong>'),
  ];
  $form['search']['clf_searchlabel'] = [
    '#type' => 'textfield',
    '#title' => t('Search Field Placeholder (usually your unit name)'),
    '#default_value' => theme_get_setting('clf_searchlabel'),
    '#size' => 60,
    '#maxlength' => 128,
    '#description' => t('This appears inside the search field as placeholder text. e.g. <strong>Search Pharmacy</strong>'),
  ];

  return $form;
}
