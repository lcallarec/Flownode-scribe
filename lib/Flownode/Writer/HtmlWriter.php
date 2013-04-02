<?php
namespace Flownode\Writer;

use
  Flownode\Scribe\Decorator\TcpdfDecorator
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
class HtmlWriter extends \Flownode\Writer\Html\Element
{
  /**
   * Decorator
   * @var TcpdfDecorator
   */
  protected $decorator;
  /**
   * @{inherit}
   * @param TcpdfDecorator $decorator
   *
   */
  public function __construct($decorator)
  {
    $this->decorator = $decorator;

    parent::__construct('flownode-root');
  }
}