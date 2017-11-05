<?php
//----------------------------------------------------------------------------
// Simple, but powerful template engine.
//----------------------------------------------------------------------------

namespace Jaypha;

class Component
{
  protected $__template;
  protected $__vars = [];

  function __construct(string $t = "", array $initialData = [])
  {
    $this->__template = $t;
    foreach ($initialData as $i=>$v)
      $this->$i = $v;
  }

  function setTemplate(string $t)  { $this->__template = $t; }
  function setVars(array $v) { $this->__vars = $v; }

  function __set($p, $v) { $this->__vars[$p] = $v; }

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

  function display() { $this->__display(); }

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
