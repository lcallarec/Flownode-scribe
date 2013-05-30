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
class Paragraph extends Writable
{
  /**
   *
   */
  public function render()
  {
    $text = $this->element->getText();

    $this->writer->getDecorator()->execute($this->writer, $this->element->getRules(), $text);
    $this->writer->Cell(50, 10, $text, 0, 1);
    $this->writer->getDecorator()->execute($this->writer, 'default');
  }
}