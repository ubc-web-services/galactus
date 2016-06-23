/**
 * @file
 * Preview for the clf theme.
 */
(function ($, Drupal, drupalSettings) {

  "use strict";

  Drupal.color = {
    callback: function (context, settings, $form) {
      
      var $colorPreview = $form.find('#preview');
      var $colorPalette = $form.find('.js-color-palette');
      
      // Unit background.
      $colorPreview.find('#preview-ubc7-unit').css('background-color', $colorPalette.find('input[name="palette[unit]"]').val());
      
      // Text Colour
      $colorPreview.find('.all-content').css('color', $colorPalette.find('input[name="palette[text]"]').val());
      
      // Primary and Secondary Colours
      $colorPreview.find('.unit-content .primary').css('backgroundColor', $colorPalette.find('input[name="palette[primary]"]').val());
      $colorPreview.find('.unit-content .secondary').css('backgroundColor', $colorPalette.find('input[name="palette[secondary]"]').val());
      
      // Heading Colours
      $colorPreview.find('.unit-content h1').css('color', $colorPalette.find('input[name="palette[heading1]"]').val());
      $colorPreview.find('.unit-content h2').css('color', $colorPalette.find('input[name="palette[heading2]"]').val());
      $colorPreview.find('.unit-content h3').css('color', $colorPalette.find('input[name="palette[heading3]"]').val());
      $colorPreview.find('.unit-content h4').css('color', $colorPalette.find('input[name="palette[heading4]"]').val());
      $colorPreview.find('.unit-content h5').css('color', $colorPalette.find('input[name="palette[heading5]"]').val());
      $colorPreview.find('.unit-content h6').css('color', $colorPalette.find('input[name="palette[heading6]"]').val());
      
      // Links preview.
      $colorPreview.find('.unit-content .link').css('color', $colorPalette.find('input[name="palette[link]"]').val());
      $colorPreview.find('.unit-content .link:hover').css('color', $colorPalette.find('input[name="palette[linkhover]"]').val());
      $colorPreview.find('.unit-content .link:active').css('color', $colorPalette.find('input[name="palette[linkactive]"]').val());
      
      // Primary Nav Links
      $colorPreview.find('.unit-nav .link').css('color', $colorPalette.find('input[name="palette[primarylinkhover]"]').val());
      $colorPreview.find('.unit-content .link.active').css('color', $colorPalette.find('input[name="palette[primarylinkactive]"]').val());

    }
  };
})(jQuery, Drupal, drupalSettings);
