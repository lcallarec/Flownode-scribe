<?php
namespace Flownode\Writer;

use
  Flownode\Scribe\Decorator\TcpdfDecorator
;

/**
 * This file is part of the Flownode package
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
class TcpdfWriter extends \TCPDF
{
  /**
   * Decorator
   * @var TcpdfDecorator
   */
  protected $decorator;
  /**
   * @{inherit}
   * @param TcpdfDecorator $decorator
   *
   */
  public function __construct(TcpdfDecorator $decorator, $orientation = 'P', $unit = 'mm', $format = 'A4', $unicode = true, $encoding = 'UTF-8', $diskcache = false, $pdfa = false)
  {
    $this->decorator = $decorator;

    parent::__construct($orientation, $unit, $format, $unicode, $encoding, $diskcache, $pdfa);

    $this->SetFont('dejavusans', '', 10);
  }
}