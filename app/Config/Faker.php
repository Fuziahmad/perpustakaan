<?php

namespace Config;

class Faker
{
    /**
     * Faker locale
     *
     * @var string
     */
    public $locale = 'id_ID';

    /**
     * Faker providers
     *
     * @var array
     */
    public $providers = [
        \Faker\Provider\Lorem::class,
        // Tambahkan provider lain yang Anda butuhkan di sini
    ];
}
