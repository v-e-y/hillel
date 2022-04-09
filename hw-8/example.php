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

$attributes = $product->attributes;     // get Product attributes
$attributes['year'] = 2021;             // set attr product year
$product->attributes = $attributes;     // Set Product attributes

$product->price = 18500;                // change product price

$product->updatedAt = time();           // 

echo $product;

echo $product->price;
print_r($product->attributes);
echo $product->updatedAt;
