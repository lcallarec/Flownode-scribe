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

/**
 * Table of content formatter
 *
 * @author Laurent CALLAREC <l.callarec@gmail.com>
 */
class TOCFormatter
{
  public function __construct($node, $toc)
  {
    foreach($toc->getTitles() as $title)
    {
      $node->open('a')->href("#".$title['id'])->setText($title['prefix'].' '.$title['name'])->close()->open('br')->close(true);
    }
  }

}