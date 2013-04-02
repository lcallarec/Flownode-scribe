<?php
/**
 * This file is part of the Flownode package
 *
 * (c) Laurent CALLAREC <l.callarec@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Flownode\Scribe\Formatter\Html;

use
  Flownode\Scribe\Formatter\Formatter as AbstractFormatter,
  Flownode\Scribe\Formatter\Html\GridFormatter,
  Flownode\Writer\HtmlWriter as Writer
;

/**
 * HTML Formatter
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
    $this->writer = new Writer($decorator);
    parent::__construct($decorator);
  }

  /**
   *
   * @param \Flownode\Scribe\Document\Element\Paragraph $paragraph
   * @return void
   */
  public function addParagraph(\Flownode\Scribe\Document\Element\Paragraph $paragraph)
  {
    $attributes = array();
    $content    = $paragraph->getText();
    if($rules = $paragraph->getRules())
    {
      $this->decorator->execute($this->writer, $rules, $content, $attributes);
    }

    $this->writer->open('p')->setAttributes($attributes)->setText($content)->close();
  }

  /**
   *
   * @param \Flownode\Scribe\Document\Element\Title $title
   * @return void
   */
  public function addTitle(\Flownode\Scribe\Document\Element\Title $title)
  {
    $attributes = array('id' => $title->getId());
    $titleName = $title->getTitle();
    $level     = $title->getLevel() + 1;
    if($rules = $title->getRules())
    {
      $this->decorator->execute($this->writer, $rules, $titleName, $attributes);
    }

    $this->writer->open('h'.$level)->setAttributes($attributes)->setText($title->getPrefix().$titleName)->close();
  }

  /**
   *
   * @param \Flownode\Scribe\Document\Element\Image $image
   * @return void
   */
  public function addImage(\Flownode\Scribe\Document\Element\Image $image)
  {
    $attributes = array();
    $src = $image->getSrc();
    $alt = $image->getAlt();
    if($rules = $image->getRules())
    {
      $this->decorator->execute($this->writer, $rules, $src, $attributes);
    }

    $this->writer->open('img')->setAttributes($attributes)->src($src)->alt($alt)->close(true);

  }

  /**
   *
   * @param \Flownode\Scribe\Document\Element\Hr $hr
   * @return void
   */
  public function addHr(\Flownode\Scribe\Document\Element\Hr $hr)
  {
    $attributes = array();
    if($rules = $hr->getRules())
    {
      $this->decorator->execute($this->writer, $rules, $attributes);
    }

    $this->writer->open('hr')->setAttributes($attributes)->close(true);
  }

  /**
   *
   * @param \Flownode\Scribe\Document\Element\Link $link
   * @return void
   */
  public function addLink(\Flownode\Scribe\Document\Element\Link $link)
  {
    $attributes = array();
    $href   = $link->getHref();
    $name   = $link->getName();
    $target = $link->getTarget();
    $rel    = $link->getRel();
    if($target)
    {
      $attribute['target'] = $target;
    }

    if($rel)
    {
      $attribute['rel'] = $rel;
    }

    $this->decorator->execute($this->writer, $link->getRules(), $attributes);

    $this->writer->open('a', $attributes)->href($href)->setText($name)->close();
  }

  /**
   *
   * @param \Flownode\Scribe\Document\Element\Paragraph $grid
   * @return void
   */
  public function addGrid(\Flownode\Scribe\Document\Grid\Grid $grid)
  {

    $table = $this->writer->open('table');

    $g = new GridFormatter($table, $this->decorator, $grid->getColumns(), $grid->getArrayCopy());
    $g->setRowDecorator($grid->getRowDecorator());


    $g->addHeaders();
    $g->addRows();

    $table->close();

  }

  /**
   *
   * @param \Flownode\Scribe\Document\Element\TOC $toc
   * @return void
   */
  public function addTOC(\Flownode\Scribe\Document\Element\TOC $toc)
  {
    $node = $this->writer->open('div');

    new TOCFormatter($node, $toc);

    $node->close();
  }

  /**
   *
   * @return string
   */
  public function getContent()
  {
    return $this->writer->getText();
  }

  /**
   * Transform an array of attributes into a string
   * @param array $styles
   * @return string
   */
  public function formatStyle($styles)
  {
    $sStyles = '';
    foreach($styles as $attribute => $value)
    {
      $sStyles .= $attribute.'="'.$value.'" ';
    }
    return $sStyles;
  }

}

