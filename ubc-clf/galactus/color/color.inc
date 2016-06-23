<?php

/**
 * @file
 * Lists available colors and color schemes for the galactus theme.
 */

$info = array(
  // Available colors and color labels used in theme.
  'fields' => array(
    'unit' => t('Unit Colour'),
    'text' => t('Text Colour'),
    'primary' => t('Primary Colour'),
    'secondary' => t('Secondary Colour'),
    'heading1' => t('Heading 1 Title'),
    'heading2' => t('Heading 2 Title'),
    'heading3' => t('Heading 3 Title'),
    'heading4' => t('Heading 4 Title'),
    'heading5' => t('Heading 5 Title'),
    'heading6' => t('Heading 6 Title'),
    'link' => t('Link Colour'),
    'linkhover' => t('Link Hover Colour'),
    'linkactive' => t('Link Active Colour'),
    'primarylinkhover' => t('Primary Nav Link Hover Colour'),
    'primarylinkactive' => t('Primary Nav Link Active Colour'),
  ),
  // Pre-defined color schemes.
  'schemes' => array(
    'default' => array(
      'title' => t('CLF (default)'),
      // Default colours MUST match those in the css file. Changing via the form will create a custom colour set.
      'colors' => array(
        'unit' => '#002145',
        'text' => '#222222',
        'primary' => '#002143',
        'secondary' => '#222223',
        'heading1' => '#0779bf',
        'heading2' => '#e1e1e1',
        'heading3' => '#d1d1d1',
        'heading4' => '#e3e3e3',
        'heading5' => '#d2d2d2',
        'heading6' => '#e5e5e5',
        'link' => '#0779af',
        'linkhover' => '#2f5d7c',
        'linkactive' => '#2f5d7d',
        'primarylinkhover' => '#002141',
        'primarylinkactive' => '#d7e0e7',
      ),
    ),
    'alternate' => array(
      'title' => t('Alternate'),
      'colors' => array(
        'unit' => '#0779bf',
        'text' => '#333333',
        'primary' => '#0779bf',
        'secondary' => '#333333',
        'heading1' => '#002145',
        'heading2' => '#002145',
        'heading3' => '#002145',
        'heading4' => '#002145',
        'heading5' => '#002145',
        'heading6' => '#002145',
        'link' => '#0779bf',
        'linkhover' => '#2f5d7c',
        'linkactive' => '#2f5d7c',
        'primarylinkhover' => '#002145',
        'primarylinkactive' => '#d7e0e7',
      ),
    ),
  ),


  // CSS files (excluding @import) to rewrite with new color scheme.
  'css' => array(
    'css/colors.css',
  ),

  // Preview files.
  'preview_library' => 'galactus/color.preview',
  'preview_html' => 'color/preview.html',
);
