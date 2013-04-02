<?php
/**
 * This file is part of the Flownode package
 *
 * (c) Laurent CALLAREC <l.callarec@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Flownode\Scribe\Formatter;

use
  Flownode\Scribe\Formatter\FormatterInterface,
  Flownode\Scribe\Decorator\Decorator,
  Flownode\Scribe\Document\Element\ElementInterface
;
/**
 * PDF Formatter using TCPDF
 *
 * @author Laurent CALLAREC <l.callarec@gmail.com>
 */
abstract class Formatter implements FormatterInterface
{

  /**
   *
   * @var Flownode\Scribe\Decorator\Decorator
   */
  protected $decorator = null;

  /**
   * Writer
   *
   * @var mixed
   */
  protected $writer;

  /**
   *
   * @param Decorator $decorator
   */
  public function __construct(Decorator $decorator)
  {
    $this->decorator    = $decorator;
  }

  /**
   *
   * @return Decorator
   */
  public function getDecorator()
  {
    return $this->decorator;
  }

  /**
   * Call the formatter according to Element type
   * @param \Flownode\Scribe\Document\Element\ElementInterface $element
   */
  public function format(ElementInterface $element, $position)
  {
    $method = ucfirst($element::TYPE);

    $this->{'add'.$method}($element, $position);
  }

}

