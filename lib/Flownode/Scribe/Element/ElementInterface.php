<?php
/**
 * This file is part of the Flownode package
 *
 * (c) Laurent CALLAREC <lcallarec@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Flownode\Scribe\Element;

use Flownode\Writer\WriterInterface;
/**
 *
 * Common interface for all Elements
 *
 * @author Laurent CALLAREC <lcallarec@gmail.com>
 */
interface ElementInterface
{
  /**
   * Set the element Writer
   *
   * @param WriterInterface $writer
   * @return self
   */
  public function setWriter(WriterInterface $writer);

}

