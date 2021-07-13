<?php

date_default_timezone_set("Europe/Riga");
$diena = " ir sodien";
$dien = " ir sodien";
echo "Šobrīd ir " .date("H:i:s") . " \n";

echo "Ielādēju Wetaher Cesis json data... \n";
$n = json_decode(file_get_contents('http://lax.lv/data/weather.php'),  true);

//echo "te ir visi weather dati. Redzam, ka masīvs ar 3 elementiem \n";
//print_r($n);

echo "\nIzvadam tikai temperatūras datus:\n";
$temperatureData = $n[0]['data'];
$windData = $n[2]['data']; //dati par temperatūru atrodas masīva 0-tajā indexaa
//print_r($temperatureData); //šo nokomentē, kad esi iepazinies ar datu struktūru


//izvadam kā piemēru sev 0-tā indexa laiku un temperaturu
// katrs elements satur asociatīvo masīvu, kur x ir timestamp, bet y ir vērtība

$myTime = $temperatureData[0]['x'];
$myValue = $temperatureData[0]['y'];

//echo date('j.M.Y G:i', $myTime) ." = " .$myValue .' °C'; //šo nokomentē, kad saprasts un nav tev vairs vajadzigs


/*
1. uztaisam ciklu, kas izdrukā visus masīva laikus un atbilstošās temperatūras tajos*/
$min = 100;
$min2 = 100;
$avg = 600;
$avg2 = 600;
$num = 0;
$num2 = 0;
$min = 10000;
$max = 0;
$girts = [];

for($i = 0; $i < count($temperatureData); $i++)
{
 echo date('j.M.Y G:i',$temperatureData[$i]['x']). " = " . $temperatureData[$i]['y']. " °C "."\n";
 if($temperatureData[$i]['y'] < $min )
 {
     $min = $temperatureData[$i]['y'];
     $index = $i;
 }
 if($temperatureData[$i]['y'] > $max )
 {
     $max = $temperatureData[$i]['y'];
     $in = $i;
 }
}
if($index > 24)
{
    $diena = "bija vakar";
}
if($in > 24)
{
    $dien = "bija vakar";
}
//echo "zemaka temperatura $diena : $min °C\n";
//echo "augstaka temperatura $dien : $max °C\n";




//echo $temperatureData[$i]['x'] ."\n";
/*2. Atrodam min / max temperatūras cēsīs izvadam tās kopā ar laiku, kad bija (arī dienu)*/




/*3. atrodam vidējo gaisa temperatūru cēsīs šodien, līdz šim brīdim*/

foreach($temperatureData as $av){
if(date('j', $av['x']) == date('j')){
    $num++;
$arrayx = $arrayx + $av['y'];

}
}
$avg = $arrayx / $num;

for($i = 0; $i <= 45; $i++){
//echo date('j.m.Y G:i',$windData[$i]['x']) ." ir " .$windData[$i]['y'] ." m\s\n";
 if($windData[$i]['y'] < $min2){
    $min2 = $windData[$i]['y'];
    $minTime2 = $windData[$i]['x'];
    $minIn2 = $i;
    
    }
    if($windData[$i]['y'] > $max2){
    $max2 = $windData[$i]['y'];
    $maxTime2 = $windData[$i]['x'];
    $maxIn2 = $i;
    }
}
if($minIn2 > 24)
{
    $string2 = "bija vakar";
}
if($maxIn2 > 24)
{
    $strin2 = "bija vakar";
}

foreach($windData as $av)
{
    if(date('j', $av['x']) == date('j'))
    {
        $num2++;
        $arrayx2 = $arrayx2 + $av['y'];
    }
}
$avg2 = $arrayx2 / $num2;

//echo "vidējais gaisa siltums šodien ir " .round($avg,2), " °C\n\n";
//echo "\ntagad ir " .date('j.M.Y G:i', $myTime2) ." = " .$myValue2 .' m\s' ."\n";
//echo "mazākais vēja ātrums $string2 " .date('j.m.Y G:i',$minTime2) ." = $min2 m\s\n";
//echo "lielākais vēja ātrums $strin2 " .date('j.m.Y G:i',$maxTime2) ." = $max2 m\s\n";
//echo "vidējais vēja ātrums šodien ir " .round($avg2,2), " m\s";
/*777. to pašu ar vēja ātrumu un vēja brāzmām m/s*/