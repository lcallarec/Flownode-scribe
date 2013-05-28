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
   * @var string
   */
  protected $valueDecorator;

  /**
   *
   * @var string
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

  public function getName()
  {
    return $this->name;
  }

  public function getColumnDecorator()
  {
    return $this->columnDecorator;
  }

  public function getValue($row)
  {
    return $row[$this->dataKey];
  }

  public function getDataKey()
  {
    return $this->dataKey;
  }

}