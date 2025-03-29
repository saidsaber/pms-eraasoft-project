<?php
    $total = 0;
    $fileCartData = realpath(__DIR__.'/../assets/cart.json');
    $fileProductData = realpath(__DIR__.'/../assets/products.json');
    function getCartData(){
        $cart = file_exists($GLOBALS['fileCartData'])? json_decode(file_get_contents($GLOBALS['fileCartData']) , true) : [];
        return $cart;
    }
    function getProductData(){
        $Product = file_exists($GLOBALS['fileProductData'])? json_decode(file_get_contents($GLOBALS['fileProductData']) , true) : [];
        return $Product;
    }

    function getData(){
        $cartsData = [];
        if(!empty($_SESSION['user'])){
            if(getCartData() != null && getProductData() !=null ){
                foreach(getCartData() as $data){
                    if($data['userId'] == $_SESSION['user']['id']){
                        foreach(getProductData() as $product){
                            if($product['id'] == $data['productId']){
                                $cartData = [
                                    'productName' => $product['name'],
                                    'price' => $product['price'],
                                    'count' => $data['count'],
                                    'total' => ($data['count'] * $product['price']),
                                    'image' => $product['path'],
                                    'id' => $data['id']
                                ];
                                $cartsData[] = $cartData;
                                $GLOBALS['total'] += ($data['count'] * $product['price']);
                            }
                        }
                    }
                }
            }
            return $cartsData;
        }
    }
    function getTotal(){
        $GLOBALS['total'] = 0;
        getData();
        return $GLOBALS['total'];
    }
