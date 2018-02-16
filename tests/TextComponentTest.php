<?php
//----------------------------------------------------------------------------
//
//----------------------------------------------------------------------------

use PHPUnit\Framework\TestCase;
use Jaypha\TextComponent;
use Jaypha\Component;

class TextComponentTest extends TestCase
{
  protected $template;

  function setUp()
  {
    $this->template = "123<?=\$abc?>xyz<?=\$mon?>.";
  }

  function testEmpty()
  {
    $x = new TextComponent();
    $this->assertEquals($x, "");
  }

  function testSet()
  {
    $x = new TextComponent();
    $x->setTemplate($this->template);
    $x->set("abc", "tent");
    $x->set("mon", "nom");
    $this->assertEquals($x, "123tentxyznom.");
  }

  function testThroughConstructor()
  {
    $x = new TextComponent(
      $this->template,
      [ "abc" => "09", "mon" => 77 ]
    );
    $this->assertEquals($x, "12309xyz77.");
  }

  function testNested()
  {
    $y = new Component();
    $y->add("pokemon");
    $y->add("poketop");
    
    $x = new TextComponent(
      $this->template,
      [ "abc" => "19", "mon" => $y ]
    );
    $this->assertEquals($x, "12319xyzpokemonpoketop.");
  }
}

//----------------------------------------------------------------------------
// Copyright (C) 2018 Jaypha.
// License: BSL-1.0
// Author: Jason den Dulk
//
