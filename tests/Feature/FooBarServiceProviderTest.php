<?php

namespace Tests\Feature;

use App\Data\{Foo, Bar};
use App\Services\HelloService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FooBarServiceProviderTest extends TestCase
{

    public function testServiceProvider()
    {
        $foo1 = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);

        self::assertSame($foo1, $foo2);

        $bar1 = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);

        self::assertSame($bar1, $bar2);
    }

    public function testPropertySingletons()
    {
        $helloServcie1 = $this->app->make(HelloService::class);
        $helloServcie2 = $this->app->make(HelloService::class);

        self::assertSame($helloServcie1, $helloServcie2);
    }

    public function testEmpty()
    {
        self::assertTrue(true);
    }
}
