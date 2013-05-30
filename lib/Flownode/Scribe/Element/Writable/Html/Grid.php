<?php
namespace Flownode\Scribe\Element\Writable\Html;

use
  Flownode\Scribe\Element\Writable\Writable,
  Flownode\Component\Html\Grid as HtmlGrid
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
class Grid extends Writable
{
  /**
   *
   */
  public function render()
  {
    $grid = new HtmlGrid($this->element->getArrayCopy(), $this->decorator, $this->writer);

    foreach($this->element->getColumns() as $column)
    {
      $grid->setColumn($column);
    }


    $grid->setRowDecorator($this->element->getRowDecorator());

    $grid->addHeaders();
    $grid->addRows();
  }

}