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
   * Build and add a column to the grid
   *
   * @see Flownode\Component\Grid\Column
   *
   * @param mixed $name
   * @param mixed $columnId
   * @param mixed $dataKey
   * @param string | array $valueDecorator
   * @param string | array $columnDecorator
   * @param Element $element
   * @return Column
   */
  public function addColumn($name, $columnId, $dataKey, $valueDecorator = null, $columnDecorator = null, $element = null)
  {
    return $this->columns[$columnId] = new Column($name, $dataKey, $valueDecorator, $columnDecorator, $element);
  }

  /**
   * Add a previously instanciated column to the grid
   *
   * @param Column $column
   * @return \Flownode\Scribe\Document\Grid\Grid
   */
  public function setColumn($column)
  {
    $this->columns[$column->getDataKey()] = $column;

    return $this;
  }

  /**
   * Set the row decorator
   * @param string | array $decorator
   */
  public function setRowDecorator($decorator = null)
  {
    $this->rowDecorator = $decorator;
  }

  /**
   * Get the row decorator
   *
   * @return string | array
   */
  public function getRowDecorator()
  {
    return $this->rowDecorator;
  }

  /**
   * Get the hash of columns
   * @return Flownode\Component\Grid\Column
   */
  public function getColumns()
  {
    return $this->columns;
  }
}