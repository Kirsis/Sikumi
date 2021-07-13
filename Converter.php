<?php
echo "sveiki! vēlaties pārveidot euro uz usd vai otrādi?\n";
echo "tad lai pārveidotu eiro uz usd spidiet 1\n";
echo "ja vēlaties pārveidot usd uz eiro spiediet 2\n";


$sk = fgets(STDIN);
$sk = (int)($sk);

if ($sk == 1) {
    echo "pārveidosiet eiro uz usd! ievadiet naudas summu kuru gribat pārveidot\n";
    $eur = fgets(STDIN);
$eur = (int)($eur);
$us = $eur * 1.09650;

echo $us ."usd";
}
elseif($sk == 2) {
    echo "pārveidosiet usd uz eiro! ievadiet naudas summu kuru gribat pārveidot\n";
    $usd = fgets(STDIN);
$usd = (int)($usd);
$eu = $usd * 0.911990;
echo $eu ."euro";
}
