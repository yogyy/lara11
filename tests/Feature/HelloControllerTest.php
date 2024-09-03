<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Tests\TestCase;

class HelloControllerTest extends TestCase
{
    public function testHallo(): void
    {
        $this->get('/controller/hello/fool')->assertSeeText('Halo fool');
    }

    public function testRequest(): void
    {
        $this->get('/controller/hello/request', ["Accept" => "plain/text"])
            ->assertSeeText('/controller/hello/request')
            ->assertSeeText('http://localhost/controller/hello/request');
    }
}
