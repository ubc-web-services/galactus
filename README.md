UBC CLF 7.0.4 DRUPAL THEME (aka Galactus)
=======================================

A responsive UBC CLF (Common Look and Feel) theme for Drupal 8. Created by the
UBC IT Web Services Department.

Galactus is a *base theme* for Drupal 8, providing UBC-branded units with the
basic structure of the UBC CLF ([Common Look and Feel](http://clf.ubc.ca). If
you need to modify the theme to suit your needs, we recommend using the
[Drupal 8 CLF theme](https://github.com/ubc-web-services/clf) as a child theme
to extend this one instead.

Created by the UBC IT Web Services Department.

# IE8 Support
Drupal 8 does not support Internet Explorer versions earlier than version 9 due
to jQuery version incompatibilities. If IE8 support is required, Drupal 7 should
be used instead, along with the CLF base theme
([Megatron](https://github.com/ubc-web-services/megatron)).

# Contribution

CSS changes need to be made with SASS through node-sass.

Ensure that you have `yarn` installed.
```
https://yarnpkg.com/lang/en/docs/install/
```

Install the node packages with this command:
```
yarn install
```

You can build your CSS changes with this command:
```
yarn run build-css
```

OR

You can watch changes to your SASS files with this command:
```
yarn run watch-css
```
