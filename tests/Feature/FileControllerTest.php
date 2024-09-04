<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class FileControllerTest extends TestCase
{

    public function testUpload(): void
    {
        $pict = UploadedFile::fake()->image('klein.png');

        $this->post('/file/upload', [
            'picture' => $pict
        ])->assertSeeText("OK klein.png");
    }
}
