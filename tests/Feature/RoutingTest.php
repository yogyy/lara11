<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{

    public function testGet()
    {
        $this->get('/fool')->assertStatus(200)->assertSeeText('Hello Mr. Fool');
    }

    public function testRedirect()
    {
        $this->get('/clown')->assertStatus(301)->assertRedirect('/fool');
    }

    public function testFallback()
    {
        $this->get('/neverexist')->assertSeeText("i'm going back to 404");

        $this->get('/404')->assertSeeText("i'm going back to 404");
    }

    public function testRouteParam()
    {
        $this->get('/product/1')->assertSeeText("Product 1");
        $this->get('/product/1/items/yyyy')->assertSeeText("Product 1, item yyyy");
    }

    public function testRouteParamRegex()
    {
        $this->get('categories/21')->assertSeeText('Category 21');

        $this->get('categories/fool')->assertSeeText("i'm going back to 404");
    }

    public function testRouteParamOptional()
    {
        $this->get('user')->assertSeeText('User 404');

        $this->get('user/21')->assertSeeText("User 21");
    }

    public function  testRouteConflict()
    {
        $this->get('conflict/moretti')->assertSeeText('Conflict moretti');

        $this->get('conflict/fool')->assertSeeText('Conflict Fool');
    }

    public function  testNamedRoute()
    {
        $this->get('produk/12345')->assertSeeText('product/12345');

        $this->get('produk-redrect/12345')->assertSeeText('product/12345');
    }
}
