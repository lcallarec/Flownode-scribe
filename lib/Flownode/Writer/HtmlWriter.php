<?php
namespace Flownode\Writer;

use
  Flownode\Decorator\Decorator
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
class HtmlWriter extends \Flownode\Writer\Html\Element implements WriterInterface
{
  /**
   * @var string
   */
  const TYPE = 'Html';

  /**
   * Decorator
   * @var Flownode\Scribe\Decorator\HtmlDecorator
   */
  protected $decorator;

  /**
   * @{inherit}
   * @param Decorator $decorator
   *
   */
  public function __construct(Decorator $decorator)
  {
    $this->decorator = $decorator;

    parent::__construct('flownode-root');
  }

  /**
   * Get the nodes text
   *
   * @return string
   */
  public function getContent()
  {
    return $this->getText();
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
   * @return Flownode\Scribe\Decorator\HtmlDecorator
   */
  public function getDecorator()
  {
    return $this->decorator;
  }
}