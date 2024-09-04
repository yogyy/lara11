<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResponseControllerTest extends TestCase
{
    public function testResponse()
    {
        $this->get('/response/hello')
            ->assertStatus(200)
            ->assertSeeText('hello response');
    }

    public function testHeader()
    {
        $this->get('/response/header')
            ->assertStatus(200)
            ->assertSeeText('Klein')->assertSeeText('Moretti')
            ->assertHeader('Content-Type', 'application/json')
            ->assertHeader('Author', 'The Fool')
            ->assertHeader('App', 'Belajar Laravel');
    }

    public function testView()
    {
        $this->get('/response/type/view')
            ->assertSeeText("Hello Klein");
    }

    public function testJson()
    {
        $this->get('/response/type/json')
            ->assertJson([
                "firstName" => 'Klein',
                "lastName" => "Moretti"
            ]);
    }

    public function testFile()
    {
        $this->get('/response/type/file')
            ->assertHeader('Content-Type', "image/jpeg");
    }

    public function testDownload()
    {
        $this->get('/response/type/download')
            ->assertDownload('moretti.jpg');
    }
}
