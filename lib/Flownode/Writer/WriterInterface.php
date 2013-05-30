<?php
namespace Flownode\Writer;
/**
 * This file is part of the Flownode-scribe package
 *
 * (c) Laurent CALLAREC <l.callarec@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Interface for all writers
 *
 * @author Laurent CALLAREC <l.callarec@gmail.com>
 */
interface WriterInterface
{
  /**
   * Get the writer type
   *
   * @return string
   */
  public function getType();

  /**
   * @return Flownode\Decorator\Decorator
   */
  public function getDecorator();

  /**
   * @return mixed
   */
  public function getContent();
}