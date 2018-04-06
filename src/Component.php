<?php
//----------------------------------------------------------------------------
// Simple, but powerful template engine.
//----------------------------------------------------------------------------

namespace Jaypha;

class Component
{
  protected $_template;
  protected $_vars;

  function __construct(string $t = null, array $initialData = [])
  {
    $this->_template = $t;
    $this->_vars = $initialData;
  }

  function setTemplate(string $t = null)  { $this->_template = $t; }
  function setVars(array $v) { $this->_vars = $v; }

  function set(string $p, $v) { $this->_vars[$p] = $v; }
  function remove($p)  { unset($this->_vars[$p]); }
  function add($v) { $this->_vars[] = $v; }
  function clear() { $this->_vars = []; }

  //-----------------------------------

  function display() { $this->displayInner(); }

  // Deprecated
  protected function __display() { $this->displayInner(); }


  // This mechanism allows two stage display
  protected function displayInner() {
    if ($this->_template)  {
      // Get the layout from a template file
      extract($this->_vars);
      include($this->_template);
    }
    else {
      // Echo each child in order
      foreach ($this->_vars as &$child)
        if ($child instanceof Component)
          $child->display();
        else
          echo $child;
    }
  }

  //-----------------------------------

  function __toString() {
    ob_start();
    $this->display();
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
  }
}

//----------------------------------------------------------------------------
// Copyright (C) 2017 Jaypha.
// License: BSL-1.0
// Author: Jason den Dulk
//
