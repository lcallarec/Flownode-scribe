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
class Column
{
  /**
   * Column human readable name
   *
   * @var string
   */
  protected $name;

  /**
   * Key to access value from the DataWorker
   *
   * @var string | integer
   */
  protected $dataKey;

  /**
   *
   * @var string | array
   */
  protected $valueDecorator;

  /**
   *
   * @var string | array
   */
  protected $columnDecorator;

  /**
   *
   * @var Item
   */
  protected $element;


  /**
   *
   * @param string            $name
   * @param string | integer  $dataKey          Key to access value from the DataWorker
   * @param Closure           $valueDecorator
   * @param Closure           $columnDecorator
   * @param Item              $element
   */
  public function __construct($name, $dataKey, $valueDecorator = null, $columnDecorator = null, $element = null)
  {
    $this->name    = $name;
    $this->dataKey = $dataKey;

    $this->valueDecorator  = $valueDecorator;
    $this->columnDecorator = $columnDecorator;

    $this->element = $element;
  }

  /**
   * Get the column name
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * Get the column decorator(s)
   * @return string | array
   */
  public function getColumnDecorator()
  {
    return $this->columnDecorator;
  }

  /**
   *
   * @param $row
   * @return mixed
   */
  public function getValue($row)
  {
    return $row[$this->dataKey];
  }

  /**
   * Get the data key for this column
   * @return mixed
   */
  public function getDataKey()
  {
    return $this->dataKey;
  }

}