<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{

    public function testView(): void
    {
        $this->get('/hello')->assertSeeText('Hello Constantine');
    }

    public function testNestedView(): void
    {
        $this->get('/hello-world')->assertSeeText('World Constantine');
    }

    public function testTemplate()
    {
        $this->view('hello', ['name' => 'Constantine'])->assertSeeText('Hello Constantine');
        $this->view('hello.world', ['name' => 'Constantine'])->assertSeeText('World Constantine');
    }
}
