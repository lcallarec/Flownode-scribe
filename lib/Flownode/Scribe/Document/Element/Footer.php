<?php
/**
 * This file is part of the Flownode package
 *
 * (c) Laurent CALLAREC <l.callarec@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Flownode\Scribe\Document\Element;
use
  Flownode\Scribe\Document\Element\Element
;
/**
 * Write document footer
 *
 * @author Laurent CALLAREC <l.callarec@gmail.com>
 */
class Footer extends Element
{
  const TYPE = 'header';

  /**
   *
   * @param string $title
   */
  public function __construct($rules = 'default')
  {
    $this->rules = $rules;
  }

}

