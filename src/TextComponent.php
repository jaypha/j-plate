<?php
//----------------------------------------------------------------------------
// Text component trait and class
//----------------------------------------------------------------------------

namespace Jaypha;

// Treats the template string as the actual template itself, rather than a
// filename.

trait TextComponentTrait
{
  function displayInner()
  {
    if ($this->_template)
    {
      // Get the layout from a text template
      extract($this->_vars);
      eval("?>$this->_template");
    }
    else
    {
      parent::displayInner();
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
