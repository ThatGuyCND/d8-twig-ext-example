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
