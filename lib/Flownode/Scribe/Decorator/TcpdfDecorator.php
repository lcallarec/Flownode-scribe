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
class TcpdfDecorator extends Decorator
{

  public function __construct()
  {
    $this->set('default', function($writer, &$value) {
      $writer->SetTextColorArray(array(0, 0, 0));
      $writer->SetFillColorArray(array(255, 255, 255));
      $writer->SetFont($writer->getFontFamily(), '', 10);
    });

    $this->set('grid.default', function($writer, &$value) {

    });

    $this->set('grid.reset', function($writer, &$value) {

    });

    $this->set('header.0', function($writer, &$value, &$borders) {

      $writer->SetTextColorArray(array(33, 64, 95));
      $writer->SetFontSize(24);

      $borders = array('B' => array('width' => 0.2, 'color' => array(33, 64, 95)));

    });

    $this->set('header.1', function($writer, &$value, &$borders) {

      $writer->SetTextColorArray(array(33, 64, 95));
      $writer->SetFontSize(18);

      $borders = array('B' => array('width' => 0.2, 'color' => array(33, 64, 95)));

    });

    $this->set('header.2', function($writer, &$value, &$borders) {

      $writer->SetTextColorArray(array(33, 64, 95));
      $writer->SetFontSize(16);

      $borders = array('B' => array('width' => 0.2, 'color' => array(33, 64, 95)));

    });

    $this->set('header.3', function($writer, &$value, &$borders) {

      $writer->SetTextColorArray(array(33, 64, 95));
      $writer->SetFontSize(16);

      $borders = array('B' => array('width' => 0.2, 'color' => array(33, 64, 95)));

    });

    $this->set('header.4', function($writer, &$value, &$borders) {

      $writer->SetTextColorArray(array(33, 64, 95));
      $writer->SetFontSize(16);

      $borders = array('B' => array('width' => 0.2, 'color' => array(33, 64, 95)));

    });

    //Styles
    $this->set('strong', function($writer, &$value) {
      $writer->SetFont('dejavusans', $writer->getFontStyle().'B', $writer->getFontSizePt());
    });

    $this->set('italic', function($writer, &$value) {
      $writer->SetFont('dejavusans', $writer->getFontStyle().'I', $writer->getFontSizePt());
    });

    $this->set('underline', function($writer, &$value) {
      $writer->SetFont('dejavusans', $writer->getFontStyle().'U', $writer->getFontSizePt());
    });

    $this->set('strikeout', function($writer, &$value) {
      $writer->SetFont('dejavusans', $writer->getFontStyle().'D', $writer->getFontSizePt());
    });
  }
}