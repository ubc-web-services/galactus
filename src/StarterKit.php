<?php

namespace Drupal\galactus;

use Drupal\Component\Serialization\Yaml;
use Drupal\Core\Theme\StarterKitInterface;

final class StarterKit implements StarterKitInterface {

  /**
   * {@inheritdoc}
   */
  public static function postProcess(string $working_dir, string $machine_name, string $theme_name): void {
    $info_file = "$working_dir/$machine_name.info.yml";
    $info = Yaml::decode(file_get_contents($info_file));
    unset($info['hidden']);
    file_put_contents($info_file, Yaml::encode($info));

    $source_theme_name = 'galactus';

    // Rename hooks in theme-settings.php.
    $theme_settings_file = "$working_dir/theme-settings.php";
    if (file_exists($theme_settings_file)) {
      if (!file_put_contents($theme_settings_file, preg_replace("/(function )($source_theme_name)(_.*)/", "$1$machine_name$3", file_get_contents($theme_settings_file)))) {
        throw new \RuntimeException("The theme-settings.php file $theme_settings_file could not be written.");
      }
    }

    // Rename libraries in theme file.
    $theme_file = "$working_dir/$machine_name.theme";
    if (file_exists($theme_file)) {
      if (!file_put_contents($theme_file, preg_replace("/($source_theme_name)\//", "$machine_name/", file_get_contents($theme_file)))) {
        throw new \RuntimeException("The theme file $theme_file could not be written.");
      }
    }

    // Rename install settings.
    $config_dir = $working_dir . '/config/install';
    $config_file = "$config_dir/$source_theme_name.settings.yml";
    if (file_exists($config_file)) {
      if (!file_put_contents($config_file, preg_replace("/(.*)($source_theme_name)(.*)/", "$1$machine_name$3", file_get_contents($config_file)))) {
        throw new \RuntimeException("The config settings file $config_file could not be written.");
      }
      if (!rename($config_file, $config_dir . '/' . $machine_name . '.settings.yml')) {
        throw new \RuntimeException("The file $config_file could not be moved.");
      }
    }

    // Rename config schema.
    $config_dir = $working_dir . '/config/schema';
    $config_file = "$config_dir/$source_theme_name.schema.yml";
    if (file_exists($config_file)) {
      if (!file_put_contents($config_file, preg_replace("/(.*)($source_theme_name)(.*)/", "$1$machine_name$3", file_get_contents($config_file)))) {
        throw new \RuntimeException("The config schema file $config_file could not be written.");
      }

      if (!rename($config_file, $config_dir . '/' . $machine_name . '.schema.yml')) {
        throw new \RuntimeException("The file $config_file could not be moved.");
      }
    }

    // Rename config files based on the theme machine name.
    $file_pattern = "/block\.block\.{$source_theme_name}_([^.]+\.yml)/";
    $config_install_dir = $working_dir . '/config/optional';
    if ($files = @scandir($config_install_dir)) {
      foreach ($files as $file) {
        $location = $config_install_dir . '/' . $file;
        if (is_dir($location)) {
          continue;
        }

        if (preg_match($file_pattern, $file, $matches)) {
          if (!file_put_contents($location, preg_replace("/(.*)($source_theme_name)(.*)/", "$1$machine_name$3", file_get_contents($location)))) {
            throw new \RuntimeException("The config file $location could not be written.");
          }
          if (!rename($location, $config_install_dir . '/block.block.' . $machine_name . '_' . $matches[1])) {
            throw new \RuntimeException("The file $location could not be moved.");
          }
        }
      }
    }
    else {
      throw new \RuntimeException("Temporary directory $working_dir cannot be opened.");
    }
  }

}
