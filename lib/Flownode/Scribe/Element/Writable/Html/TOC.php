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
class TOC extends Writable
{
  /**
   *
   */
  public function render()
  {
    $node = $this->writer->open('div');

    foreach($this->element->getTitles() as $title)
    {
      $node->open('a')->href("#".$title['id'])->setText($title['prefix'].' '.$title['name'])->close()->open('br')->close(true);
    }
  }

}