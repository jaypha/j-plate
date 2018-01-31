<?php
//----------------------------------------------------------------------------
//
//----------------------------------------------------------------------------

use \Jaypha\Component;

require "../src/Component.php";

$page = new Component("template.tpl");
$page->set("title", "User Profile");


$content = new Component(
  "profile.tpl",
  [ "name" => "Jonathon", "word" => "serendipity" ]
);

$page->set("content", $content);

echo $page;

//----------------------------------------------------------------------------
// Copyright (C) 2017 Jaypha.
// License: BSL-1.0
// Author: Jason den Dulk
//
