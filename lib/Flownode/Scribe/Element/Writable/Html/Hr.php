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
class Hr extends Writable
{
  /**
   *
   */
  public function render()
  {
    $attributes = array();
    if($rules = $this->element->getRules())
    {
      $this->decorator->execute($this->writer, $rules, $attributes);
    }

    $this->writer->open('hr')->setAttributes($attributes)->close(true);
  }

}