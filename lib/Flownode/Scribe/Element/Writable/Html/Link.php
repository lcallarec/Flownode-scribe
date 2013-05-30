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
class Link extends Writable
{
  /**
   *
   */
  public function render()
  {
    $attributes = array();
    $href   = $this->element->getHref();
    $name   = $this->element->getName();
    $target = $this->element->getTarget();
    $rel    = $this->element->getRel();
    if($target)
    {
      $attribute['target'] = $target;
    }

    if($rel)
    {
      $attribute['rel'] = $rel;
    }

    $this->decorator->execute($this->writer, $this->element->getRules(), $attributes);

    $this->writer->open('a', $attributes)->href($href)->setText($name)->close();
  }

}