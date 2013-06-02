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
interface WritableInterface
{
  /**
   *
   * @param \Flownode\Writer\WriterInterface $writer
   * @param \Flownode\Scribe\Element\ElementInterface $element
   */
  public function __construct(WriterInterface $writer, ElementInterface $element);

  /**
   * Build process
   */
  public function render();
}