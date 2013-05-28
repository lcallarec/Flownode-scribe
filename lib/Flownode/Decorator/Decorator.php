<?php
/**
 * This file is part of the Flownode package
 *
 * (c) Laurent CALLAREC <l.callarec@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Flownode\Decorator;
/**
 * class for handling views
 *
 * @author Laurent CALLAREC <l.callarec@gmail.com>
 */
class Decorator
{
  /**
   * Contain all styles definitions
   * key   : string   style name
   * value : Closure  function to apply
   * @var array
   */
  protected $rules = array();

  /**
   *
   * @param string $rule
   * @param \Closure $decorator
   */
  public function set($name, \Closure $rule)
  {
    $this->rules[$name] = $rule;
  }

  /**
   * Get one or sevral rules
   *
   * @param string | array $rules
   * @return array         Array of Closures
   */
  function get($rules)
  {
    if(null !== $rules)
    {
      if(is_array($rules))
      {
        $_rules = array();
        foreach($rules as $name => $rule)
        {
          if(isset($this->rules[$rule]))
          {
            $_rules[$name] = $this->rules[$rule];
          }
        }

        return $_rules;
      }

      return array($rules => $this->rules[$rules]);
    }

    return array($rules => $this->rules['default']);
  }

  /**
   * Execute the decorator(s)
   *
   * Rules can be string or hash of strings for easier reuse
   * In some cases, we don't want the Closure to be registered, so we can give a Closure as argument
   *
   * @param Writer  $writer
   * @param mixed   $rules  Can be a string or a hash of string, or a Closure
   * @param mixed   $arg1
   * @param mixed   $arg2
   * @param mixed   $arg3
   * @param mixed   $arg4
   */
  public function execute($writer, $rules, &$arg1 = null, &$arg2 = null, &$arg3 = null, &$arg4 = null)
  {
    if(!is_callable($rules))
    {
      $closures = $this->get($rules);

      foreach($closures as $closure)
      {
        $closure($writer, $arg1, $arg2, $arg3, $arg4);
      }
    }
    else
    {
      $rules($writer, $arg1, $arg2, $arg3, $arg4);
    }

  }
}