<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    function setUp(): void
    {
        parent::setUp();

        Cache::clear();

        File::cleanDirectory(config('orbit.paths.content'));
    }

    function tearDown(): void
    {
        Cache::clear();

        File::cleanDirectory(config('orbit.paths.content'));

        parent::tearDown();
    }
}
