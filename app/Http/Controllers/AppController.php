<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class AppController extends Controller
{
    public function index(): JsonResponse
    {
        $info = [
            'name' => config('app.name'),
            'version' => app()->version(),
            'timezone' => config('app.timezone'),
            'now' => Carbon::now()->format('d/m/Y H:i:s'),
        ];

        return response()->json($info);
    }

    public function info()
    {
        xdebug_info();
    }
}
