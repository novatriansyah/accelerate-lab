<?php

namespace Tests\Feature;

use Tests\TestCase;

class OpenGraphAssetTest extends TestCase
{
    public function test_default_opengraph_cover_image_exists_and_is_valid_png(): void
    {
        $coverPath = public_path('images/og-cover.png');

        $this->assertFileExists($coverPath, 'Default OG cover image must exist in public/images/og-cover.png');
        $this->assertGreaterThan(10000, filesize($coverPath), 'OG cover image must be a non-trivial file');

        $imageInfo = getimagesize($coverPath);
        $this->assertNotFalse($imageInfo, 'File must be a valid image');
        $this->assertEquals(IMAGETYPE_PNG, $imageInfo[2], 'OG cover must be a PNG image');
    }
}
