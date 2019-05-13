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


function getNumbers()
    {
        $tax = config('cart.tax') / 100;
        $discount = session()->get('coupon')['discount'] ?? 0;
        $newSubtotal = (Cart::subtotal() - $discount);
        if ($newSubtotal < 0) {
            $newSubtotal = 0;
        }
        $newTax = $newSubtotal * $tax;
        $newTotal = $newSubtotal * (1 + $tax);

        return collect([
            'tax'         => $tax,
            'discount'    => $discount,
            'newSubtotal' => $newSubtotal,
            'newTax'      => $newTax,
            'newTotal'    => $newTotal   
        ]);
    }