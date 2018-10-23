<?php
/*
 * Domain-specific Language class for PHP
 * 
 *         Coded by TheoRelativity
 * 
 * email: marioandrea.petruccelli@gmail.com
 *
 *
 */
class PHPDSL {
	
    protected static $syntax = 
	[
		"/^(\w+):/" => "OPTION",     # word:
		"/^:(\w+)/" => "PARAMETER",  # :word
        "/^(\w+)/" =>  "COMMAND",    # word
		"/(\s+)/" =>   "WHITESPACES" 
    ];

		
	public static function analyze($input)
	{
		$tokens = [];
		$offset = 0;
		$lenght = strlen($input);
		
		while($offset < $lenght)
		{
			$result = static::match($input,$offset);
			
			if($result===false) break; # Exception
			
			$tokens[] = $result;
			$offset += $result['offset'];

		}
		
		return $tokens;
		
	}

	protected static function match($input, $offset)
	{
	
		$string = substr($input, $offset);

	
		foreach(static::$syntax as $pattern => $name)
		{
			if( preg_match($pattern, $string, $matches) )
			{
				return 
				[
					'offset' => ($name == "PARAMETER") ? strlen($matches[0]) : strlen($matches[1]),
					'match'  => $matches[1],
					'token'  => $name,
					'string' => $string # Use this to debug 
				];
			}
		}
		return false;
	}


}




