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
class TcpdfWriter extends \TCPDF implements WriterInterface
{
  /**
   * @var string
   */
  const TYPE = 'Tcpdf';

  /**
   * Decorator
   * @var Flownode\Scribe\Decorator\TcpdfDecorator
   */
  protected $decorator;

  /**
   * @{inherit}
   * @param Flownode\Scribe\Decorator\TcpdfDecorator $decorator
   *
   */
  public function __construct(TcpdfDecorator $decorator, $orientation = 'P', $unit = 'mm', $format = 'A4', $unicode = true, $encoding = 'UTF-8', $diskcache = false, $pdfa = false)
  {
    $this->decorator = $decorator;

    parent::__construct($orientation, $unit, $format, $unicode, $encoding, $diskcache, $pdfa);

    $this->SetDefaultMonospacedFont(\PDF_FONT_MONOSPACED);

    $this->SetMargins(PDF_MARGIN_LEFT, 15, PDF_MARGIN_RIGHT);
    $this->SetHeaderMargin(5);
    $this->SetFooterMargin(10);

    $this->setPrintHeader(false);
    $this->setPrintFooter(false);

    $this->setFontSubsetting(false);

    $this->AddPage();

    $this->SetFont('dejavusans', '', 10);
  }

  /**
   * Get the PDF content
   *
   * @return string
   */
  public function getContent()
  {
    return $this->Output('r.pdf', 'I');
  }

  /**
   * Get the Writer type
   * @return string
   */
  public function getType()
  {
    return static::TYPE;
  }

  /**
   * 
   * @return Flownode\Scribe\Decorator\TcpdfDecorator
   */
  public function getDecorator()
  {
    return $this->decorator;
  }
}