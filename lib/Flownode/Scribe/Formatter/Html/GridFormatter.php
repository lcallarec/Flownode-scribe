<?php

/**
 * This file is part of the Flownode package
 *
 * (c) Laurent CALLAREC <l.callarec@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Flownode\Scribe\Formatter\Html;

use
  Flownode\Scribe\Decorator\Decorator
;

/**
 *
 * @author Laurent CALLAREC <l.callarec@gmail.com>
 */
class GridFormatter
{
  /**
   *
   * @var Flownode\Writer\Html\Node
   */
  protected $node;

  /**
   *
   * @var Flownode\Scribe\Decorator\Decorator;
   */
  protected $decorator;

  protected $rowDecorator = null;


  public function __construct(\Flownode\Writer\Html\Node $node, $decorator, $columns, $datas)
  {
    $this->node      = $node;
    $this->decorator = $decorator;
    $this->columns   = $columns;
    $this->datas     = $datas;
  }

  /**
   *
   */
  public function addHeaders()
  {
    $headers = $this->node->open('thead')->open('tr');
    foreach($this->columns as $column)
    {
      $this->node->open('th')->setText($column->getName())->close();
    }
    $headers->close()->close();
  }

  /**
   *
   */
  public function addRows()
  {

    foreach($this->datas as $i => $row)
    {
      $attributes = array();
      if($this->rowDecorator)
      {
        $this->decorator->execute($this->node, $this->rowDecorator, $row, $i, $attributes);
      }

      $rows= $this->node->open('tr', $attributes);

      foreach($this->columns as $column)
      {
        $value = $column->getValue($row);
        $columnDecorator = $column->getColumnDecorator();

        $attributes = array();
        if($columnDecorator)
        {
          $this->decorator->execute($this->node, $columnDecorator, $value, $attributes);
        }

        $rows->open('td', $attributes)->setText($value)->close();
      }

      $rows->close();
    }
  }

  /**
   * Set decorator rules triggered before each row rendering
   * @param string |array $rules
   */
  public function setRowDecorator($rules = null)
  {
    $this->rowDecorator = $rules;
  }

}