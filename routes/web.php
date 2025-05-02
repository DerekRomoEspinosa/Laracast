<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/services', function () {
    return view('services', [
        'services' => [
            [
                'id' => 1,
                'title' => 'Diseño y desarrolo web',
                'description' => 'Creo sitios web modernos, rápidos y optimizados para dispositivos móviles, listos para representar tu marca.'
            ],
            [
                'id' => 2,
                'title' => 'Tiendas en línea (eCommerce)',
                'description' => 'Desarrollo tiendas funcionales con pasarelas de pago seguras y administración fácil de productos.'

            ],
            [
                'id' => 3,
                'title' => 'Mantenimiento y soporte tecnico',
                'description' => 'Actualizaciones, backups y solución de errores para que tu sitio siempre funcione perfectamente.'
            ]
        ]
    ]);
});

Route::get('/services/{id}', function ($id) {
    $services = [
            [
                'id' => 1,
                'title' => 'Diseño y desarrolo web',
                'description' => 'Creo sitios web modernos, rápidos y optimizados para dispositivos móviles, listos para representar tu marca.'
            ],
            [
                'id' => 2,
                'title' => 'Tiendas en línea (eCommerce)',
                'description' => 'Desarrollo tiendas funcionales con pasarelas de pago seguras y administración fácil de productos.'

            ],
            [
                'id' => 3,
                'title' => 'Mantenimiento y soporte tecnico',
                'description' => 'Actualizaciones, backups y solución de errores para que tu sitio siempre funcione perfectamente.'
            ]
         ];

         $service = Arr::first($services, fn($service) => $service['id'] == $id);

         return view('service', ['service' => $service]);

         });




Route::get('/contact', function () {
    return view('contact');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});


