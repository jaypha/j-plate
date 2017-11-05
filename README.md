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
to create output of arbitrary complexity. No need for specially defined
partials, layouts or helpers as `Component` can be used for all of these roles.

## Requirements

PHP v5.4.0 or greater.

## Installation

```
composer require jaypha/j-plate
```

## License

Copyright (C) 2017 Jaypha.  
Distributed under the Boost Software License, Version 1.0.  
See http://www.boost.org/LICENSE_1_0.txt

