<?php
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

  protected $formatter = null;

  protected $columns = array();

  protected $rowDecorator = null;

  protected $data;

  public function __construct($data)
  {
    $this->datas = $data;
  }

}