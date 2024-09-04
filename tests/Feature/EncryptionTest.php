<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Crypt;
use Tests\TestCase;

class EncryptionTest extends TestCase
{
    public function test_example(): void
    {
        $enc = Crypt::encrypt("The Fool");
        $dec  = Crypt::decrypt($enc);

        var_dump($enc);

        self::assertEquals('The Fool', $dec);
    }
}
