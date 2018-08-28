
<?php

$array = array();
$array[] = array('id'=>1,	'parent'=>0,	'title'=>'Tehnika');
$array[] = array('id'=>2,	'parent'=>0,	'title'=>'Mēbeles');
$array[] = array('id'=>3,	'parent'=>1,	'title'=>'Telefoni');
$array[] = array('id'=>4,	'parent'=>1,	'title'=>'Sadzīves tehnika');
$array[] = array('id'=>5,	'parent'=>1,	'title'=>'Datortehnika');
$array[] = array('id'=>6,	'parent'=>2,	'title'=>'Sekcijas');
$array[] = array('id'=>7,	'parent'=>3,	'title'=>'Nokia');
$array[] = array('id'=>8,	'parent'=>3,	'title'=>'Samsung');
$array[] = array('id'=>9,	'parent'=>3,	'title'=>'LG');
$array[] = array('id'=>10,	'parent'=>4,	'title'=>'Veļas mašīnas');
$array[] = array('id'=>11,	'parent'=>4,	'title'=>'Putekļu sūcēji');
$array[] = array('id'=>12,	'parent'=>4,	'title'=>'Ledusskapji');
$array[] = array('id'=>13,	'parent'=>5,	'title'=>'Portatīvie datori');
$array[] = array('id'=>14,	'parent'=>5,	'title'=>'Planšetdatori');
$array[] = array('id'=>15,	'parent'=>5,	'title'=>'Stacionārie datori');
$array[] = array('id'=>16,	'parent'=>6,	'title'=>'Viesistaba');
$array[] = array('id'=>17,	'parent'=>6,	'title'=>'Guļamistaba');
$array[] = array('id'=>18,	'parent'=>6,	'title'=>'Ēdamistaba');




foreach ($array as $key5 => $val5 )

if($val5['parent']===0){
	
echo "<ul><li>";	
echo $val5['title'];
echo "</li></ul>";
}

echo "<hr>";

$empty_array_for_result = array(); 

$nacalnije_uslovija[$uroven] = $uroven = 0; 

while ($uroven >= 0)
{
	
	if ( $e = each($array) )
	{
		
		if ($e[1]['parent'] === $nacalnije_uslovija[$uroven])
		{
			
			$e[1]['level'] = $uroven;
			$tmp[] = $e[1];
			
			unset($array[$e[0]]);
			
			foreach ($t = $array as $val)
			{
				
				if ( $val['parent'] === $e[1]['id'] )
				{
					
					$nacalnije_uslovija[++$uroven] = $e[1]['id'];
					
					reset($array);
					break;
				}
			}
		}
	}
	
	else
	{
		$uroven--;
		reset($array);
	}
}

$echo = "<ul class='tree'>"; 

foreach ($tmp as $key => $val)
{

	$replace = array();
	foreach ($val as $key2 => $val2 )
	{
		
		$replace["??$key2??"] = $val2;
	}
	
	$echo .= str_replace(array_keys($replace),$replace,'<li>??title??');
	
	if ( isset($tmp[$key+1]) )
	{
		
		if ($tmp[$key+1]['level']>$val['level'])
		{
			$echo .= "<ul>";
		}
		
		if ($tmp[$key+1]['level']==$val['level'])
		{
			$echo .= "</li>";
		}
		
		if ($tmp[$key+1]['level']<$val['level'])
		{
			$k = $val['level'] - $tmp[$key+1]['level'];
			for ( $i=0; $i<$k; $i++ )
			{
				$echo .= "</li></ul>";
			}
		}
	}

	else
	{
		$echo .= "</li>";
		$k = $val['level'];
		for ( $i=0; $i<$k; $i++ )
		{
			$echo .= "</ul></li>";
		}
	}
}
$echo .= '</ul>';
echo $echo;


?>