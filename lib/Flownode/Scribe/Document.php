<?php
/**
 * This file is part of the Flownode package
 *
 * (c) Laurent CALLAREC <lcallarec@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flownode\Scribe;

use
  Flownode\Scribe\Element\ElementInterface,
  Flownode\Writer\WriterInterface,
  Flownode\Scribe\Manager\Manager
;

/**
 * Main Document wrapper
 *
 * Be careful : the format is only done when Document::format() is called
 * So all your components can be modified during runtime before Document::format() call
 *
 * @author Laurent CALLAREC <l.callarec@gmail.com>
 */
class Document implements ElementInterface, \ArrayAccess
{
  /**
   * Container all elements
   * @var \Flownode\Scribe\Element\Element
   */
  protected $elements = array();

  /**
   * Current iterator position
   * Adding an element increment $position by 10
   * It's easier to move elements after assignation
   *
   * @var int
   */
  protected $position = 0;

  /**
   * @var WriterInterface
   */
  protected $writer;

  /**
   * Hash of manager
   * @var array
   */
  protected $managers;

  /**
   *
   * @param WriterInterface $writer
   */
  public function __construct(WriterInterface $writer)
  {
    $this->writer = $writer;
  }

  /**
   * Add a component to the document
   *
   * @param \Flownode\Scribe\Element\ElementInterface $element
   * @param int $position   The element position ; is used to assign an element before another
   * @return \Flownode\Scribe\Element\ElementInterface
   */
  public function add(ElementInterface $element, $position = null)
  {
    $element->setDocument($this);

    if(null === $position)
    {
      $this->position += 10;
      (int) $position = $this->position;
    }

    $this->offsetSet($position, $element);

    return $element;
  }

  /**
   * Launch format process
   *
   * @return \Flownode\Scribe\Document\Document
   */
  public function format()
  {
    //sort elements by keys, if an element was adding at a specified position
    ksort($this->elements);
    foreach($this->elements as $position => $element)
    {
      $element->render(get_class($element));
    }

    return $this;
  }

  /**
   * Return the formatted content, which could not be human readable
   *
   * @return mixed
   */
  public function getContent()
  {
    return $this->writer->getContent();
  }

  /**
   * @param WriterInterface $writer
   * @return self
   */
  public function setWriter(WriterInterface $writer)
  {
    $this->writer = $writer;

    return $this;
  }

  /**
   *
   * @return WriterInterface $writer
   */
  public function getWriter()
  {
    return $this->writer;
  }

   /**
   *
   * @param Manager $manager
   * @return self
   */
  public function setManager(Manager $manager)
  {
    //$manager->setFormatter($this->formatter);
    $this->managers[$manager::NAME] = $manager;

    return $this;
  }

  /**
   * @return mixed  Manager or null if none was found
   */
  public function getManager($type)
  {
    if(isset($this->managers[$type]))
    {
      return $this->managers[$type];
    }

    return null;
  }

  public function offsetSet($offset, $value)
  {
    $this->position = $offset;

    $this->elements[$this->position] = $value;

    return $this;
  }

  public function offsetGet($offset)
  {
    return $this->elements[$offset];
  }

  public function offsetUnset($offset)
  {
    unset($this->elements[$offset]);

    return $this;
  }

  public function offsetExists($offset)
  {
    return isset($this->elements[$offset]);
  }
}