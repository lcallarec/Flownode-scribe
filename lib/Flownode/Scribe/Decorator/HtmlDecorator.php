<?php
/**
 * This file is part of the Flownode package
 *
 * (c) Laurent CALLAREC <l.callarec@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Flownode\Scribe\Decorator;
/**
 * Class for handling styles
 *
 * @author Laurent CALLAREC <l.callarec@gmail.com>
 */
class HtmlDecorator extends Decorator
{
  public function __construct()
  {
    $this->set('default', function($writer, &$value) {

    });

    $this->set('grid.default', function($writer, &$value) {

    });

    $this->set('grid.reset', function($writer, &$value) {

    });

    $this->set('header.0', function($writer, &$value) {
      return array('style' => 'color: red;');
    });

    $this->set('header.1', function($writer, &$value) {
      return array('style' => 'font-size: 1.5em; border-bottom: 1px solid grey;');
    });

    $this->set('header.2', function($writer, &$value) {
      return array('style' => 'font-size: 1.2em; border-bottom: 1px solid grey;');
    });

    $this->set('header.3', function($writer, &$value) {
      return array('style' => 'font-size: 1.5em; border-bottom: 1px solid grey;');
    });

    $this->set('header.4', function($writer, &$value) {
      return array('style' => 'font-size: 1.2em; border-bottom: 1px solid grey;');
    });

    //Styles
    $this->set('strong', function($writer, &$value) {
      $value = '<strong>'.$value.'</strong>';
    });

    $this->set('italic', function($writer, &$value) {
      $value = '<i>'.$value.'</i>';
    });

    $this->set('underline', function($writer, &$value) {
      $value = '<u>'.$value.'</u>';
    });

    $this->set('strikeout', function($writer, &$value) {
      $value = '<del>'.$value.'</del>';
    });
  }

}