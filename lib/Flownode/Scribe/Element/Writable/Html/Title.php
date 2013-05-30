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
class Title extends Writable
{
  /**
   *
   */
  public function render()
  {
    $attributes = array('id' => $this->element->getId());
    $titleName = $this->element->getTitle();
    $level     = $this->element->getLevel() + 1;
    if($rules = $this->element->getRules())
    {
      $this->decorator->execute($this->writer, $rules, $titleName, $attributes);
    }

    $this->writer
         ->open('h'.$level)
           ->setAttributes($attributes)
           ->setText($this->element->getPrefix().$titleName)
         ->close();
  }

}