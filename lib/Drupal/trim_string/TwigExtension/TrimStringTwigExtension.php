<?php

namespace Drupal\trim_string\TwigExtension;

use Drupal\Core\Template\TwigExtension;

class TrimStringTwigExtension extends \Twig_Extension {

  public function getName() {
    return 'trim_string.trim_string_twig_extension';
  }

  public function getFilters() {
    return array(
      new \Twig_SimpleFilter('trim_string', array('Drupal\trim_string\TwigExtension\trimStringTwigExtension', 'trimString') )
    );
  }

  public static function trimString ($string, $limit = 10, $suffix = '&hellip;') {
    $words = explode(' ', $string);

    if ( count($words) < $limit ) {
      return $string;
    }

    $string = implode(' ', array_slice($words, 0, $limit)) . $suffix;

    return $string;
  }

}
