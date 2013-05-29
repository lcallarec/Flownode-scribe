<?php
/**
 * This file is part of the Flownode package
 *
 * (c) Laurent CALLAREC <lcallarec@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Flownode\Scribe\Element\Grid;

use
  Flownode\Scribe\Element\Element
;
/**
 *
 * @author Laurent CALLAREC <lcallarec@gmail.com>
 */
class Grid extends Element
{
  use \Flownode\Component\Grid\GridTrait;

  const TYPE = 'grid';

  protected $formatter = null;

  protected $columns = array();

  protected $rowDecorator = null;

}