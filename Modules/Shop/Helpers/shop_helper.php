<?php
if (!function_exists('shop_product_link')) {
    function shop_product_link($product)
    {
        $categorySlug = 'product';
        $productSlug = $product->slug . '-' . $product->sku;

        if ($product->categories->count() > 0) {
            $categorySlug = $product->categories->first()->slug;
        }

        return route('products.show', [$categorySlug, $productSlug]);
    }
}

if (!function_exists('shop_category_link')) {
    function shop_category_link($category){
        return route('products.category', [$category->slug]);
    }
}