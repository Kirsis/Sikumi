<?php

$tgt = (int)date("G");
echo "nemam datus \n";
$n  = @json_decode(file_get_contents('http://lax.lv/electricity-price-json/'),true);
print_r($n['hourly']);
$diena = "sodien";


$hourly = $n['hourly'];
//print_r($hourly);
$min = 100000000;
$max = 0;
for($i = 0; $i < 48; $i++)
{
    if($hourly[$i] == 0)
    {
        $laikss = $i;
        break;

    }
}
for($i = 0; $i < $laikss; $i++)
{
    echo "$i $hourly[$i]\n";
    if($hourly[$i] < $min)
    {
        $min = $hourly[$i];
        $index = $i;
    }
        if($hourly[$i] > $max)
        {
            $max = $hourly[$i];
            $index = $i;
        }
        if($i == $tgt)
        {
            $stundas = $hourly[$i] ; 
        }
}
echo "\nminimala cena ir $min  \n";
echo "maximala cena ir $max \n"; 
if($index > 24)
{
    $diena = "ritdiena";
    $index = $index - 24;
}
echo "zemaka cena ir $diena pulkst $index:00 \n";
echo "cena saja stunda : $stundas ";