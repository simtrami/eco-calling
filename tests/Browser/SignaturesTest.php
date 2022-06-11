<?php

use App\Models\Signature;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Dusk\Browser;

uses(DatabaseMigrations::class);
uses(WithFaker::class);

it('has a signature page without signatures', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/signatures')
            ->assertSee(__('signatures.table.empty'))
            ->assertSourceMissing(__('pagination.nav_label'));
    });
});
it('has one signature page with 10 signatures', function () {
    Signature::factory()->confirmed()->count(10)->create();
    $this->browse(function (Browser $browser) {
        $browser->visit('/signatures')
            ->assertSee(Signature::confirmed()->first()->full_name)
            ->assertSourceMissing(__('pagination.nav_label'));
    });
});
it('has a first signature page with 20 signatures on two pages', function () {
    Signature::factory()->confirmed()->count(20)->create();
    $this->browse(function (Browser $browser) {
        $browser->visit('/signatures?page=1')
            ->assertSee("De 1 à 10 sur 20 résultats")
            ->assertSourceHas(__('pagination.nav_label'))
            ->assertSourceHas('<span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-white bg-theme border border-theme cursor-default leading-5">1</span>');
    });
});
it('has a second signature page with 20 signatures on two pages', function () {
    Signature::factory()->confirmed()->count(20)->create();
    $this->browse(function (Browser $browser) {
        $browser->visit('/signatures?page=2')
            ->assertSee("De 11 à 20 sur 20 résultats")
            ->assertSourceHas(__('pagination.nav_label'))
            ->assertSourceHas('<span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-white bg-theme border border-theme cursor-default leading-5">2</span>');
    });
});
it('does not have a third signature page with 20 signatures on two pages', function () {
    Signature::factory()->confirmed()->count(20)->create();
    $this->browse(function (Browser $browser) {
        $browser->visit('/signatures?page=3')
            ->assertSee(__('signatures.table.out_of_range'))
            ->assertSee("De à sur 20 résultats")
            ->assertSourceHas(__('pagination.nav_label'))
            ->assertSourceMissing('<span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-white bg-theme border border-theme cursor-default leading-5">3</span>');
    });
});
