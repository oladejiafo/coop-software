<?php 
/*________________________________________________________________


lixlpixel PHParadise

_______________________________________________________________________


category :	
string handling

snippet :		
number to words

downloaded :	
02.16.2009 - 03:
27

file URL :		
http://www.fundisom.com/phparadise/php/string_handling/number_to_words

description :	
this function spells out numbers in english text.
number to words conversion.


___________________________START___COPYING___HERE__________________*/ 
?>




<?php
$nwords = array(	"zero", "one", "two", "three", "four", "five", "six", "seven",
	
			"eight", "nine", "ten", "eleven", "twelve", "thirteen",
		
			"fourteen", "fifteen", "sixteen", "seventeen", "eighteen",
		
			"nineteen", "twenty", 30 => "thirty", 40 => "forty",
	
			50 => "fifty", 60 => "sixty", 70 => "seventy", 80 => "eighty",
	
			90 => "ninety" );



function int_to_words($x)

{

	global $nwords;

	if(!is_numeric($x))

	{

		$w = '#';

	}
	else if(fmod($x, 1) != 0)

	{

		$w = '#';

	}
	else
	{

		if($x < 0)
	
		{
		
			$w = 'minus ';

			$x = -$x;

		}
		else
		{
	
			$w = '';

		}

		if($x < 21)

		{
	
			$w .= $nwords[$x];

		}
		else if($x < 100)

		{
	
			$w .= $nwords[10 * floor($x/10)];

			$r = fmod($x, 10);
	
			if($r > 0)
	
			{
	
				$w .= '-'. $nwords[$r];
			}

		}
		else if($x < 1000)

		{
		
			$w .= $nwords[floor($x/100)] .' hundred';

			$r = fmod($x, 100);

			if($r > 0)

			{

				$w .= ' and '. int_to_words($r);

			}

		}
		else if($x < 1000000)

		{

			$w .= int_to_words(floor($x/1000)) .' thousand';

			$r = fmod($x, 1000);

			if($r > 0)
		
			{

				$w .= ' ';
				
				if($r < 100)
				
				{
				
					$w .= 'and ';
			
				}

				$w .= int_to_words($r);

			}

		} else {

			$w .= int_to_words(floor($x/1000000)) .' million';

			$r = fmod($x, 1000000);

			if($r > 0)

			{

				$w .= ' ';
				if($r < 100)

				{

					$word .= 'and ';

				}

				$w .= int_to_words($r);

			}

		}

	}

	return $w;

}


// demonstration


if(isset($_POST['num']))

{

	echo '
	the number reads ' . int_to_words($_POST['num']) . '
	<p>
	<a href="' . $_SERVER['PHP_SELF'] . '"> try again </a>';

}else{

	echo '
	<form method="post" action="'.$_SERVER['PHP_SELF'].'">

		<input type="text" name="num">

		<input type="submit" value="spell number">

	</form>';

}

?>



<?php 
/*_____________________END___OF___THE___CODE______________________


get more code from http://www.fundisom.com/phparadise/


___________________________________________________________________*/
?>