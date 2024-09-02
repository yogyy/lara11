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
}
