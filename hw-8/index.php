<?php

require_once 'vendor/autoload.php';

$item = [
    'price' => 1750000,
    'attributes' => '{"memory":"8GB","color":"silver"}',
    'updated_at' => 1649428269
];

$product = new \Hillel\Entities\Product(
    $item['price'],
    $item['attributes'],
    $item['updated_at']
);

$attributes = $product->attributes;
$attributes['year'] = 2021;
$product->attributes = $attributes;

$product->price = 18500;

$product->updatedAt = time();          
echo '<pre>';
echo $product;
echo PHP_EOL;
echo $product->price;
echo PHP_EOL;
print_r($product->attributes);
echo PHP_EOL;
echo $product->updatedAt;
