<?php
/**
 * This file is part of the Flownode package
 *
 * (c) Laurent CALLAREC <l.callarec@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Flownode\Scribe\Manager;

use
  Flownode\Scribe\Formatter\FormatterInterface
;
/**
 *
 * @author Laurent CALLAREC <l.callarec@gmail.com>
 */
abstract class Manager
{
  const NAME = null;

  /**
   * \Flownode\Scribe\Formatter\FormatterInterface
   * @var FormatterInterface
   */
  protected $formatter;

  /**
   *
   * @param \Flownode\Scribe\Formatter\FormatterInterface $formatter
   * @return self
   */
  public function setFormatter(FormatterInterface $formatter)
  {
    $this->formatter = $formatter;

    return $this;
  }

  /**
   * Launch the format process
   * Do nothing for non-writing manager
   */
  public function format()
  {

  }
}