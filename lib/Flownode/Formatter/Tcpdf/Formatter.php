<?php
/**
 * This file is part of the Flownode package
 *
 * (c) Laurent CALLAREC <l.callarec@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Flownode\Formatter\Tcpdf;

use
  Flownode\Formatter\Formatter as AbstractFormatter,
  Flownode\Writer\TcpdfWriter as Writer,
  Flownode\Formatter\Tcpdf\GridFormatter
;

/**
 * PDF Formatter using TCPDF
 *
 * @author Laurent CALLAREC <l.callarec@gmail.com>
 */
class Formatter extends AbstractFormatter
{

  /**
   *
   * @param \Flownode\Scribe\Decorator\Decorator $decorator
   */
  public function __construct(\Flownode\Scribe\Decorator\Decorator $decorator)
  {
    parent::__construct($decorator);

    $this->writer = new Writer($decorator);

    $this->writer->SetDefaultMonospacedFont(\PDF_FONT_MONOSPACED);

    $this->writer->SetMargins(PDF_MARGIN_LEFT, 15, PDF_MARGIN_RIGHT);
    $this->writer->SetHeaderMargin(5);
    $this->writer->SetFooterMargin(10);

    $this->writer->setPrintHeader(false);
    $this->writer->setPrintFooter(false);


    $this->writer->setFontSubsetting(false);

    $this->writer->AddPage();

  }

  /**
   *
   * @param \Flownode\Scribe\Document\Element\Paragraph $paragraph
   * @return void
   */
  public function addParagraph(\Flownode\Scribe\Document\Element\Paragraph $paragraph)
  {
    $text = $paragraph->getText();
    $this->decorator->execute($this->writer, $paragraph->getRules(), $text);
    $this->writer->Cell(50, 10, $text, 0, 1);
    $this->decorator->execute($this->writer, 'default');
  }

  /**
   *
   * @param \Flownode\Scribe\Document\Element\Title $title
   * @return void
   */
  public function addTitle(\Flownode\Scribe\Document\Element\Title $title)
  {
    $borders = array();

    $titleName = $title->getTitle();

    $this->decorator->execute($this->writer, 'header.'.$title->getLevel(), $titleName, $borders);

    $this->writer->Bookmark($title->getPrefix().$titleName, $title->getLevel()-1);
    $this->writer->Cell(0, 10, $title->getPrefix().$titleName, $borders, 1);

    $this->writer->Ln(5);

    $this->decorator->execute($this->writer, 'default');
  }

  /**
   *
   * @param \Flownode\Scribe\Document\Element\Image $image
   * @return void
   */
  public function addImage(\Flownode\Scribe\Document\Element\Image $image)
  {
    $src = $image->getSrc();
    $this->decorator->execute($this->writer, $image->getRules(), $src);

    $this->writer->Image($image->getSrc(), '', '', '', '', '', '', 'N', false, 300, '', false, false, 0, false, false, true);

    $this->decorator->execute($this->writer, 'default', $src);
  }

  /**
   *
   * @param \Flownode\Scribe\Document\Element\Hr $hr
   * @return void
   */
  public function addHr(\Flownode\Scribe\Document\Element\Hr $hr)
  {
   $this->decorator->execute($this->writer, $hr->getRules());

    $this->writer->Cell(0, 0, '', 'B', 1);
  }

  /**
   *
   * @param \Flownode\Scribe\Document\Element\Link $link
   * @return void
   */
  public function addLink(\Flownode\Scribe\Document\Element\Link $link)
  {
    $href   = $link->getHref();
    $name   = $link->getName();

    $this->decorator->execute($this->writer, $link->getRules(), $href, $name);

    $this->writer->Write('', $name, $href, false, '', true);

    $this->decorator->execute($this->writer, 'default');
  }

  /**
   *
   * @param \Flownode\Scribe\Document\Element\TOC $toc
   * @return void
   */
  public function addTOC(\Flownode\Scribe\Document\Element\TOC $toc)
  {
    $this->writer->addTOCPage();
    $this->writer->addTOC(1);
    $this->writer->endTOCPage();
  }

  /**
   * Get the TCPDF writer ...
   *
   * @return string
   */
  public function getContent()
  {
    return $this->writer->Output();
  }

  /**
   *
   * @param \Flownode\Scribe\Document\Grid\Grid $grid
   * @return void
   */
  public function addGrid(\Flownode\Scribe\Document\Element\Grid\Grid $grid)
  {

    $formatter = new GridFormatter($this->writer, $this->decorator, $grid->getColumns(), $grid->getArrayCopy());
    $formatter->setRowDecorator($grid->getRowDecorator());

    $formatter->addHeaders();

    $formatter->addRows();

  }

}

