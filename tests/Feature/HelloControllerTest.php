<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HelloControllerTest extends TestCase
{
    public function test_example(): void
    {
        $this->get('/controller/fool')->assertSeeText('Halo fool');
    }
}
