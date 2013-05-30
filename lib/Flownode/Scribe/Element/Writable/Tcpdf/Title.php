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
class Title extends Writable
{
  /**
   *
   */
  public function render()
  {
    $borders = array();

    $titleName = $this->element->getTitle();

    $this->decorator->execute($this->writer, 'header.'.$this->element->getLevel(), $titleName, $borders);

    $this->writer->Bookmark($this->element->getPrefix().$titleName, $this->element->getLevel()-1);
    $this->writer->Cell(0, 10, $this->element->getPrefix().$titleName, $borders, 1);

    $this->writer->Ln(5);

    $this->decorator->execute($this->writer, 'default');
  }


}