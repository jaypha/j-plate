<?php
//----------------------------------------------------------------------------
// Text component trait and class
//----------------------------------------------------------------------------

namespace Jaypha;

// Treats the template string as the actual template itself, rather than a
// filename.

trait TextComponentTrait
{
  function __display()
  {
    if ($this->__template)
    {
      // Get the layout from a text template
      extract($this->__vars);
      eval("?>$this->__template");
    }
    else
    {
      parent::__display();
    }
  }
}

class TextComponent extends Component
{
  use TextComponentTrait;
}

//----------------------------------------------------------------------------
// Copyright (C) 2017 Jaypha.
// License: BSL-1.0
// Author: Jason den Dulk
//
