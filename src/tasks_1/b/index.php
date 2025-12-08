<?php
include("../Class/CurrencyConverter/CurrencyConverter.php");

$currencyConverter = new CurrencyConverter();

$curr_huf = new Currency('HUF');
$curr_eur = new Currency('EUR');
$curr_usd = new Currency('USD');

$currencyConverter->addCurrency($curr_huf);
$currencyConverter->addCurrency($curr_eur);
$currencyConverter->addCurrency($curr_usd);
$currencyConverter->addRate($curr_huf, $curr_eur, 1 / 380);
$currencyConverter->addRate($curr_huf, $curr_usd, 1 / 300);
$currencyConverter->addRate($curr_usd, $curr_eur, 1 / 0.8);

// var_dump($currencyConverter->getConvertionsRates());

echo $currencyConverter->convert(5000, $curr_huf, $curr_usd);
