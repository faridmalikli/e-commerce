<?php

function presentPrice($price)
{   
    return "$ ".number_format($price / 100, 2);
    // return money_format('$i%', $price / 100);
}


function setActiveCategory($category, $output = 'active')
{
    return request()->category == $category ? $output : '';
}