<?php
/**
 * This file is part of the Flownode package
 *
 * (c) Laurent CALLAREC <lcallarec@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Flownode\Scribe\Document\Element;
use
  Flownode\Scribe\Document\Element\Element
;
/**
 *
 * @author Laurent CALLAREC <lcallarec@gmail.com>
 */
class Paragraph extends Element
{
  const TYPE = 'paragraph';

  /**
   * Paragraph text
   *
   * @var string
   */
  protected $text;

  /**
   *
   * @param string $text
   */
  public function __construct($text = '', $rules = 'default')
  {
    $this->text = $text;

    $this->rules = $rules;
  }

  /**
   * Get text value
   * @return string
   */
  public function getText()
  {
    return $this->text;
  }
}

