/**
 * @file
 * Preview for the clf theme.
 */
(function ($, Drupal, drupalSettings) {

  "use strict";

  Drupal.color = {
    logoChanged: false,
    callback: function (context, settings, form, farb, height, width) {
      
      // Unit background.
      form.find('#preview-ubc7-unit').css('background-color', form.find('.js-color-palette input[name="palette[unit]"]').val());
      
      // Text Colour
      form.find('.all-content').css('color', form.find('.js-color-palette input[name="palette[text]"]').val());
      
      // Primary and Secondary Colours
      form.find('.unit-content .primary').css('backgroundColor', form.find('.js-color-palette input[name="palette[primary]"]').val());
      form.find('.unit-content .secondary').css('backgroundColor', form.find('.js-color-palette input[name="palette[secondary]"]').val());
      
      // Heading Colours
      form.find('.unit-content h1').css('color', form.find('.js-color-palette input[name="palette[heading1]"]').val());
      form.find('.unit-content h2').css('color', form.find('.js-color-palette input[name="palette[heading2]"]').val());
      form.find('.unit-content h3').css('color', form.find('.js-color-palette input[name="palette[heading3]"]').val());
      form.find('.unit-content h4').css('color', form.find('.js-color-palette input[name="palette[heading4]"]').val());
      form.find('.unit-content h5').css('color', form.find('.js-color-palette input[name="palette[heading5]"]').val());
      form.find('.unit-content h6').css('color', form.find('.js-color-palette input[name="palette[heading6]"]').val());
      
      // Links preview.
      form.find('.unit-content .link').css('color', form.find('.js-color-palette input[name="palette[link]"]').val());
      form.find('.unit-content .link:hover').css('color', form.find('.js-color-palette input[name="palette[linkhover]"]').val());
      form.find('.unit-content .link:active').css('color', form.find('.js-color-palette input[name="palette[linkactive]"]').val());

    }
  };
})(jQuery, Drupal, drupalSettings);
