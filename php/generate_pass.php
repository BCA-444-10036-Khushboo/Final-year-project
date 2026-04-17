<?php
$pattern = "GA0a!b1|cBdN@efg2hCiH3'Jkd#p41M%nOm^_JVo\5pRE)SIK9rs6&tT*uUF,L-(vZ/7w~Wx+8yX>zY";

$length= strlen($pattern);
$password=[];
for($i=0;$i<8;$i++)
{
 $index= rand(0,$length);
 $password[]=$pattern[$index];
}

echo implode($password);


?>