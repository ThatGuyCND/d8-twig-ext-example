<?php

namespace Drupal\trim_string\TwigExtension;

//use Drupal\Core\Template\TwigExtension;

class TrimStringTwigExtension extends \Twig_Extension {

  public function getName() {
    return 'trim_string';
  }

  public function getFilters() {
    return array(
      new \Twig_SimpleFilter('trim_string', 'trimString', array('is_safe' => array('html')))
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
