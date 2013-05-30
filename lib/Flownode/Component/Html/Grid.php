<?php
namespace Flownode\Component\Html;
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
class Grid
{
  use \Flownode\Component\Grid\GridTrait;

  /**
   *
   * @var Flownode\Writer\Html\Node
   */
  protected $writer;

  protected $columns = array();

  /**
   *
   * @var Flownode\Scribe\Decorator\Decorator;
   */
  protected $decorator;

  /**
   *
   * @var type
   */
  protected $rowDecorator = null;

  /**
   *
   * @var type
   */
  protected $data;

  public function __construct($data, $decorator, $writer)
  {
    $this->data      = $data;
    $this->decorator = $decorator;
    $this->writer    = $writer;

    $this->node = $this->writer->open('table');
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

    foreach($this->data as $i => $row)
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

      $this->node->close();
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

  public function render()
  {
    return $this->writer->getText();
  }

}