# PHPDSL

Domain-Specific Language Class for PHP 

Hi guys, I am coding a cool project so, I developed my own class in PHP to manage my DSL for the project. I want to share a short version of the class I coded and, I hope you will find it useful.

# Try It

```php
<?php

include("PHPDSL.php");

# My own code
$input  = 'search port:80 protocols:HTTP';

# Start the analyzer
$result = PHPDSL::analyze($input);

# Print results. Pss: use firefox to view results.
header("Content-type:application/json");
echo json_encode($result);

```

# How to use it

1. Imagine your own syntax: ```<command> <option>:<parameter>```
2. Write your regex code for each element: ```<command> => /^(\w+)/```. Tip: this website can be helpful [Regex101](https://regex101.com/)
3. Always remember to use ^ at start and, always to include the match between ()
4. Add/substitute the regex code into the PHPDSL.php file
```php
protected static $syntax = 
 [
		"/^(\w+)/" => "COMMAND", 
		"/(\s+)/" =>   "WHITESPACES" 
    ];
```
5. Be careful when you order the regex codes!!!
6. Good WorK!

 
