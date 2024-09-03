<?php

namespace App\Http\Controllers;

use App\Services\HelloService;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    private HelloService $helloService;

    public function __construct(HelloService $helloService)
    {
        $this->helloService = $helloService;
    }

    public function  hello(string $name)
    {
        return $this->helloService->hello($name);
    }

    public function request(Request $req)
    {
        return $req->path() . PHP_EOL .
            $req->url() . PHP_EOL  .
            $req->fullUrl() . PHP_EOL .
            $req->method() . PHP_EOL .
            $req->header('Accept') . PHP_EOL;
    }
}
