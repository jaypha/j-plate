<?php
//----------------------------------------------------------------------------
// Simple, but powerful template engine.
//----------------------------------------------------------------------------

namespace Jaypha;

class Component
{
  protected $__template;
  protected $__vars;

  function __construct(string $t = null, array $initialData = [])
  {
    $this->__template = $t;
    $this->__vars = $initialData;
  }

  function setTemplate(string $t = null)  { $this->__template = $t; }
  function setVars(array $v) { $this->__vars = $v; }

  function set(string $p, $v) { $this->__vars[$p] = $v; }
  function add($v) { $this->__vars[] = $v; }

  //-----------------------------------

  function display() { $this->__display(); }

  protected function __display() {
    if ($this->__template)  {
      // Get the layout from a template file
      extract($this->__vars);
      include($this->__template);
    }
    else {
      // Echo each child in order
      foreach ($this->__vars as &$child)
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
