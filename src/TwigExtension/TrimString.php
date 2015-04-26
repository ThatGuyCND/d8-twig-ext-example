<?php

/**
 * @file
 * Contains \Drupal\trim_string\TwigExtension\TrimString.
 */

namespace Drupal\trim_string\TwigExtension;

class TrimString extends \Twig_Extension {

  /**
   * Gets a unique identifier for this Twig extension.
   *
   * @return string
   *   A unique identifier for this Twig extension.
   */
  public function getName() {
    return 'trim_string.twig.trim_string';
  }

  /**
   * Generates a list of all Twig filters that this extension defines.
   *
   * @return array
   *   A key/value array that defines custom Twig filters. The key denotes the
   *   filter name used in the tag, e.g.:
   *   @code
   *   {{ foo|testfilter }}
   *   @endcode
   *
   *   The value is a standard PHP callback that defines what the filter does.
   */
  public function getFilters() {
    return array(
        new \Twig_SimpleFilter('trim_string', array($this, 'trimString'), array('is_safe' => array('html'))),
    );
  }

  /**
   * Trims Strings to an arbitrary length.
   *
   * @param string[] $string
   *   The string that is being filtered.
   * @param int $length
   *   The number of words to limit the length of the returned string.
   * @param string $suffix
   *   Appended to the trimmed string only when the input string exceeds the $limit.
   *
   * @return string
   *   The string that was originally passed in if less than $length, or the string after being trimmed to $length.
   */
  public static function trimString($string, $limit = 10, $suffix = '&nbsp;&hellip;') {
    $words = preg_split('/\s+/', $string['#markup']);
    if ( count($words) < $limit ) {
      return $string;
    }
    $string['#markup'] = implode(' ', array_slice($words, 0, $limit)) . $suffix;
    return $string;
  }

}
