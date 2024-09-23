UBC CLF 7.0.4 DRUPAL THEME (aka Galactus)
=======================================

A responsive UBC CLF (Common Look and Feel) theme for Drupal 8+. Created by the
UBC IT Web Services Department.

Galactus is a *theme* for Drupal 8+, providing UBC-branded units with the
basic structure of the UBC CLF ([Common Look and Feel](http://clf.ubc.ca)).

If you need to modify the theme to suit your needs, we recommend forking it as a [Starterkit](https://www.drupal.org/docs/core-modules-and-themes/core-themes/starterkit-theme) extend this one instead.


# Composer Install
If you're using composer, add the project with:
```bash
composer require ubc-web-services/galactus
```

# Starterkit Fork
A starterkit fork will duplicate all the files from Galactus to your new theme to modify to your needs.
See the [Starterkit Documentation](https://www.drupal.org/docs/develop/theming-drupal/defining-a-theme-with-an-infoyml-file) for more details.

Considering it's a galactus fork we recommend prefixing the fork with `galactus_` although you can name it any name that doesn't conflict with another project installed on your Drupal site.
```bash
mkdir -p themes/custom
php core/scripts/drupal generate-theme --starterkit galactus --path themes/custom galactus_PROJECT
```

# Internet Explorer Support
Drupal 8+ does not support Internet Explorer versions earlier than version 9 due
to jQuery version incompatibilities.
See this [Change Record](https://www.drupal.org/node/1569578) for more details.

Drupal 10+ has removed Internet Explorer support all together. See this [Change Record](https://www.drupal.org/node/3199540) for more details.
