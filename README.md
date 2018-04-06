# Jaypha Templates

Written by Jason den Dulk

A simple, yet powerful template engine.

### Features

- Uses PHP itself as the template engine, so no need to reinvent the wheel or use
bloated parsers and interpreters, or learn yet another language.

- You can create custom component classes that allow you to have extra
component specific business logic that can be kept out of the template, or
handle boilerplate you dont want to have repeated in every template file.

- Specify the template either as a string or a file.

- Direct output. Displays content directly to output for faster rendering.
Output to a string (via `__toString`) is also supported.

- Hierarchical. Components can be added to other Components
to create output of arbitrary complexity. No need for partials, layouts or
helpers as `Component` can be used for all of these roles.

## Requirements

PHP v5.4.0 or greater.

## Installation

```
composer require jaypha/j-plate
```

## API

### class Component

`__construct($template, $initialData)`

Constructor for the `Component` class.  
`$template` - The template file to use.  
`$initialData` - Associative array for values to be used. May be non-associative
if no template is provided.

`void setTemplate(string $template = null)`
Sets the template file

`void setVars(array $values)`
Sets all the values.

`void set(string $name, mixed $value)`
Sets a single value

`void remove(mixed $name)`
Removes a value stored under $name.

`void add(mixed $value)`
Adds a value without a name. Use when no template is being used.

`void clear()`
Removes all values.

`void display()`
Outputs the contents to the output context.

`string __toString()`
Returns the contents as a string.

#### trait TextComponentTrait

A trait that allows the template to be provided directly instead of via a file.

#### class TextComponent

Behaves the same as `Component` except that the template is provided directly
instead of via a file.

## How to use templates

This project make use of PHP's ability to embed PHP code inside a text
file. Simply surround your code with `<?php` and `?>`, or `<?=` and `?>`.

All values are loaded into the context and can be accessed directly. For
example, a value set with the name `viewName`, can be printed with
`<?=$viewName?>`.

## License

Copyright (C) 2017 Jaypha.  
Distributed under the Boost Software License, Version 1.0.  
See http://www.boost.org/LICENSE_1_0.txt

