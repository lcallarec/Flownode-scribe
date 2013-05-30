<?php
namespace Flownode\Scribe\Element\Writable;

use
  Flownode\Writer\WriterInterface,
  Flownode\Scribe\Element\ElementInterface
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
abstract class Writable
{
  /**
   *
   * @var WriterInterface
   */
  protected $writer;

  /**
   * Element
   *
   * @var ElementInterface
   */
  protected $element;

  /**
   *
   * @var Flownode\Scribe\Decorator
   */
  protected $decorator;

  /**
   *
   * @param \Flownode\Writer\WriterInterface $writer
   * @param \Flownode\Scribe\Element\ElementInterface $element
   */
  public function __construct(WriterInterface $writer, ElementInterface $element)
  {
    $this->writer    = $writer;
    $this->decorator = $writer->getDecorator();
    $this->element   = $element;
  }

  /**
   * Build process
   */
  abstract public function render();
}