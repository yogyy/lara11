<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase
{
    public function testInput()
    {
        $this->get('/input/hello?name=Constantine')
            ->assertSeeText("Hello Constantine");

        $this->post('/input/hello', ['name' => 'Constantine'])
            ->assertSeeText("Hello Constantine");
    }

    public function testNestedInput()
    {
        $this->post('/input/hello/first', [
            'name' => [
                'first' => 'Klein',
                'last' => 'Moretti'
            ]
        ])->assertSeeText('Hello Klein');
    }

    public function testAllInput()
    {
        $this->post('/input/hello/input', [
            'name' => [
                'first' => 'Klein',
                'last' => 'Moretti'
            ]
        ])
            ->assertSeeText('name')
            ->assertSeeText('first')->assertSeeText('last')
            ->assertSeeText('Klein')->assertSeeText('Moretti');
    }

    public function testInputArray()
    {
        $this->post('/input/hello/array', [
            "products" => [
                [
                    "name" => "Apple Mac Book Pro",
                    "price" => 30000000
                ],
                [
                    "name" => "Samsung Galaxy S10",
                    "price" => 15000000
                ]
            ]
        ])->assertSeeText("Apple Mac Book Pro")
            ->assertSeeText("Samsung Galaxy S10");
    }

    public function testInputType()
    {
        $this->post('/input/type', [
            'name' => 'Klein Moretti',
            'married' => 'false',
            'birth_date' => '1327-03-04'
        ])->assertSeeText('Klein Moretti')->assertSeeText("false")->assertSeeText("1327-03-04");
    }

    public function testFilterOnly()
    {
        $this->post('/input/filter/only', [
            "name" => [
                "first" => "Klein",
                "alias" => "The Fool",
                "last" => "Moretti"
            ]
        ])->assertSeeText("Klein")->assertSeeText("Moretti")
            ->assertDontSeeText("The Fool");
    }

    public function testFilterExcept()
    {
        $this->post('/input/filter/except', [
            "username" => "klein",
            "password" => "fool",
            "admin" => "true"
        ])->assertSeeText("klein")->assertSeeText("fool")
            ->assertDontSeeText("admin");
    }

    public function testFilterMerge()
    {
        $this->post('/input/filter/merge', [
            "username" => "fool",
            "password" => "bathroom",
            "admin" => "true"
        ])->assertSeeText("fool")->assertSeeText("bathroom")
            ->assertSeeText("admin")->assertSeeText("false");
    }
}
