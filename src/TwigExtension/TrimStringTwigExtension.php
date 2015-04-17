<?php

namespace Drupal\trim_string\TwigExtension;

use Drupal\Core\Template\TwigExtension;

class TrimStringTwigExtension extends TwigExtension {

  public function getName() {
    return 'trim_string';
  }

  public function getFilters() {
    return array(
      new \Twig_SimpleFilter('trim_string', 'twig_trim_string_filter', array('is_safe' => array('html')))
    );
  }

}

/**
 * This better fucking work, and if it doesn't then there needs to be a better way of building a new _filter()
 */
function twig_trim_string_filter($string, $limit = 10, $suffix = '&hellip;') {
  $phrase = $string;
  $words = explode(' ', $phrase);

  if ( count($words) < $limit ) {
    return $string;
  }

  $string = implode(' ', array_slice($words, 0, $limit)) . $suffix;

  return $string;
}