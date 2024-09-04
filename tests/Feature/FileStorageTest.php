<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FileStorageTest extends TestCase
{
    public function testStorage(): void
    {
        $fs = Storage::disk("local");
        $fs->put("file.txt", "Klein Moretti");

        $content = $fs->get("file.txt");

        self::assertEquals("Klein Moretti", $content);
    }
}
