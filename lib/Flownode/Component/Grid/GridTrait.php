<?php
/**
 * This file is part of the Flownode package
 *
 * (c) Laurent CALLAREC <lcallarec@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Flownode\Component\Grid;

/**
 *
 * @author Laurent CALLAREC <lcallarec@gmail.com>
 */
trait GridTrait
{

  /**
   * Add headers, only one set of headers can be set
   * @param array $headers
   * @return \Flownode\Scribe\Document\Grid\Grid
   */
  public function addColumn($name, $columnId, $dataKey, $valueDecorator = null, $columnDecorator = null, $element = null)
  {
    return $this->columns[$columnId] = new Column($name, $dataKey, $valueDecorator, $columnDecorator, $element);
  }

  /**
   * Add headers, only one set of headers can be set
   * @param array $headers
   * @return \Flownode\Scribe\Document\Grid\Grid
   */
  public function setColumn($column)
  {
    $this->columns[$column->getDataKey()] = $column;

    return $this;
  }

  /**
   *
   * @param string $decorator
   */
  public function setRowDecorator($decorator = null)
  {
    $this->rowDecorator = $decorator;
  }

  public function getRowDecorator()
  {
    return $this->rowDecorator;
  }

  /**
   *
   * @return Flownode\Component\Grid\Column
   */
  public function getColumns()
  {
    return $this->columns;
  }
}