<?php

namespace App\Providers;

use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(ResponseFactory $factory)
    {
        $factory->macro('services', function (bool $success, string $message = "", $data = [], $status = 200) use ($factory) {

            $body = [
                'success' => $success,
                'message' => $message,
                'data' => $data
            ];

            return $factory->json($body, $status);
        });
    }
}
