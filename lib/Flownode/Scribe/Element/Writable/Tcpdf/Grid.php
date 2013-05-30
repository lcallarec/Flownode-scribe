<?php
namespace Flownode\Scribe\Element\Writable\Tcpdf;

use
  Flownode\Scribe\Element\Writable\Writable,
  Flownode\Component\Tcpdf\Grid as TcpdfGrid
;
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
class Grid extends Writable
{
  /**
   *
   */
  public function render()
  {
    $formatter = new TcpdfGrid($this->writer, $this->decorator, $this->element->getColumns(), $this->element->getArrayCopy());
    $formatter->setRowDecorator($this->element->getRowDecorator());

    $formatter->addHeaders();

    $formatter->addRows();
  }

}