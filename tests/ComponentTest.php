<?php
//----------------------------------------------------------------------------
//
//----------------------------------------------------------------------------

use PHPUnit\Framework\TestCase;
use Jaypha\Component;

class ComponentTest extends TestCase
{
  function testEmpty()
  {
    $x = new Component();
    $this->assertEquals($x, "");
  }

  function testAdd()
  {
    $x = new Component();
    $x->add("a");
    $x->add("bcd");
    $x->add(5);
    $this->assertEquals($x, "abcd5");
  }

  function testSet()
  {
    $x = new Component();
    $x->setTemplate(__DIR__."/template1.tpl");
    $x->set("abc", "tent");
    $x->set("mon", "nom");

    // Important to note that the template file does end with a newline.
    // This may not appear in some text editors.
    $this->assertEquals($x, "123tentxyznom.\n");
  }

  function testThroughConstructor()
  {
    $x = new Component(
      __DIR__."/template1.tpl",
      [ "abc" => "09", "mon" => 77 ]
    );
    $this->assertEquals($x, "12309xyz77.\n");
  }

  function testNested()
  {
    $y = new Component();
    $y->add("pokemon");
    $y->add("poketop");
    
    $x = new Component(
      __DIR__."/template1.tpl",
      [ "abc" => "19", "mon" => $y ]
    );
    $this->assertEquals($x, "12319xyzpokemonpoketop.\n");
  }
}

//----------------------------------------------------------------------------
// Copyright (C) 2018 Jaypha.
// License: BSL-1.0
// Author: Jason den Dulk
//
