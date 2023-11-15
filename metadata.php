<?php

$sMetadataVersion = '2.1';


$aModule = [
        'id'          => 'nncoupons',
        'title'       => [
            'de' => 'Novalnet Coupons',
            'en' => 'Novalnet Coupons',
        ],
        'description' => [ 'de' => 'This Extension Helpfull for Display the Avaliable Coupons in USER My Account',
                           'en' => 'This Extension Helpfull for Display the Avaliable Coupons in USER My Account',
        ],
        'version'     => '2.1.0',
        'author'      => 'Novalnet Developer',
        'url'         => 'https://www.novalnet.com',
        'email'       => 'technical@novalnet.de',
        'extend'      => [
            \OxidEsales\Eshop\Application\Controller\AccountController::class => Nncoupons\Controller\AvaliableCouponsController::class,
            
        ],
        'controllers'  => [  
                'avaliablecoupons'         => Nncoupons\Controller\AvaliableCouponsController::class,
            
        ],


        'settings'      => [
            ['group' => 'couponsdisplay', 'name' => 'couponname','type' => 'str',   'value'  => '', 'position' => 1 ],
            ['group' => 'couponsdisplay', 'name' => 'couponcode',    'type' => 'str',   'value'  => '', 'position' => 2 ],
            
        ],
        'events'    => [
           
        ],
];
