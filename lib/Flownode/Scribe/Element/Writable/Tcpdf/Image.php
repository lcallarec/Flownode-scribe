<?php
namespace Flownode\Scribe\Element\Writable\Tcpdf;

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
class Image extends Writable
{
  /**
   *
   */
  public function render()
  {
    $src = $this->element->getSrc();
    $this->decorator->execute($this->writer, $this->element->getRules(), $src);

    $this->writer->Image($this->element->getSrc(), '', '', '', '', '', '', 'N', false, 300, '', false, false, 0, false, false, true);

    $this->decorator->execute($this->writer, 'default', $src);
  }

}