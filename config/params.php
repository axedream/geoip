<?php

return [
    'adminEmail' => 'admin@example.com',
    'getApi' =>  [
        'freegeoip' => [
            'url'       =>  'http://freegeoip.net/json/[ip]',
            'la'        =>  'longitude',
            'lo'        =>  'latitude',
            'city'      =>  'city',
            'country'   => 'country_name',
        ],
        /*
        'nekudo'  =>  [
            'url'       =>  'http://geoip.nekudo.com/api/[ip]/en/',
            'la'        =>  ['location'=>'latitude'],
            'lo'        =>  ['location' =>'longitude'],
            'city'      =>  'city',
            'country'   =>  ['country'=>'name'],
        ]
        */
    ],
];
