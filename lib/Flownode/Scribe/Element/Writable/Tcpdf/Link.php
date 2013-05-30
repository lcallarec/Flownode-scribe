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
class Link extends Writable
{
  /**
   *
   */
  public function render()
  {
    $href   = $this->element->getHref();
    $name   = $this->element->getName();

    $this->decorator->execute($this->writer, $this->element->getRules(), $href, $name);

    $this->writer->Write('', $name, $href, false, '', true);

    $this->decorator->execute($this->writer, 'default');
  }

}