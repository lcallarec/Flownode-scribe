<?php
/**
 * This file is part of the Flownode package
 *
 * (c) Laurent CALLAREC <lcallarec@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Flownode\Scribe\Document\Element;
use
  Flownode\Scribe\Formatter\FormatterInterface
;
/**
 *
 * Common interface for all Elements
 *
 * @author Laurent CALLAREC <lcallarec@gmail.com>
 */
interface ElementInterface
{
  /**
   * Set the element formatter
   *
   * @param \Flownode\Scribe\Formatter\FormatterInterface $formatter
   * @return self
   */
  public function setFormatter(FormatterInterface $formatter);

}

