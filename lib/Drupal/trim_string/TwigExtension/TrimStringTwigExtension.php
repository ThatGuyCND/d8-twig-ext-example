<?php

namespce Drupal\trim_string\TwigExtension;


use Drupal\Core\Template\TwigExtension;

class trimStringTwigExtension extends TwigExtension {

  public function getName() {
    return 'trim_string.trim_string_twig_extension';
  }

}
