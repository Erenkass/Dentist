<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'api/erenin-sitesi'  // buraya ekleme sebebi paytr nin attığı post bir atak olarak görülmemesi için eklenmek zorunludur
    ];
}
