<?php

use App\Models\Signature;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use function Pest\Laravel\artisan;
use function Pest\Laravel\assertDatabaseCount;
use function PHPUnit\Framework\assertFileExists;
use function PHPUnit\Framework\assertTrue;

uses(DatabaseMigrations::class);

it('generates sitemap.xml', function () {
    if (file_exists('public/sitemap.xml')) {
        assertTrue(unlink('public/sitemap.xml'));
    }
    Signature::factory()->confirmed()->count(20)->create();
    assertDatabaseCount('signatures', 20);
    artisan('sitemap:generate')->assertSuccessful();
    assertFileExists('public/sitemap.xml');
});
