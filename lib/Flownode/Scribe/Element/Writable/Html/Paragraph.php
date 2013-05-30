<?php
namespace Flownode\Scribe\Element\Writable\Html;

use Flownode\Scribe\Element\Writable\Writable;
/**
 * This file is part of the Flownode-scribe package
 *
 * (c) Laurent CALLAREC <l.callarec@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 * @author Laurent CALLAREC <l.callarec@gmail.com>
 */
class Paragraph extends Writable
{
  /**
   *
   */
  public function render()
  {
    $attributes = array();
    $text       = $this->element->getText();
    if($rules   = $this->element->getRules())
    {
      $this->writer->getDecorator()->execute($this->writer, $rules, $text, $attributes);
    }

    $this->writer->open('p')->setAttributes($attributes)->setText($text)->close();
  }
}