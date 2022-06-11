<?php

use App\Models\Signature;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Dusk\Browser;

uses(
    DatabaseMigrations::class,
    WithFaker::class
);

beforeEach(function () {
    App::setLocale('fr');
});

it('has a signature page without signatures', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/signatures')
            ->assertSee(__('signatures.table.empty', locale: 'fr'))
            ->assertSourceMissing(__('pagination.nav_label', locale: 'fr'));
        $browser->visit('/en/signatures')
            ->assertSee(__('signatures.table.empty', locale: 'en'))
            ->assertSourceMissing(__('pagination.nav_label', locale: 'en'));
    });
});
it('has one signature page with 10 signatures', function () {
    Signature::factory()->confirmed()->count(10)->create();
    $this->browse(function (Browser $browser) {
        $browser->visit('/signatures')
            ->assertSee(Signature::confirmed()->first()->full_name)
            ->assertSourceMissing(__('pagination.nav_label', locale: 'fr'));
        $browser->visit('/en/signatures')
            ->assertSee(Signature::confirmed()->first()->full_name)
            ->assertSourceMissing(__('pagination.nav_label', locale: 'en'));
    });
});
it('has a first signature page with 20 signatures on two pages', function () {
    Signature::factory()->confirmed()->count(20)->create();
    $this->browse(function (Browser $browser) {
        $browser->visit('/signatures?page=1')
            // "De 1 à 10 sur 20 résultats"
            ->assertSee(__('pagination.showing', locale: 'fr') . ' 1 ' . __('pagination.to', locale: 'fr') . ' 10 ' . __('pagination.of', locale: 'fr') . ' 20 ' . __('pagination.results', locale: 'fr'))
            ->assertSourceHas(__('pagination.nav_label', locale: 'fr'))
            ->assertSourceHas('<span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-white bg-theme border border-theme cursor-default leading-5">1</span>');
    });
    $this->browse(function (Browser $browser) {
        $browser->visit('/en/signatures?page=1')
            // "Showing 1 to 10 of 20 results"
            ->assertSee(__('pagination.showing', locale: 'en') . ' 1 ' . __('pagination.to', locale: 'en') . ' 10 ' . __('pagination.of', locale: 'en') . ' 20 ' . __('pagination.results', locale: 'en'))
            ->assertSourceHas(__('pagination.nav_label', locale: 'en'))
            ->assertSourceHas('<span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-white bg-theme border border-theme cursor-default leading-5">1</span>');
    });
});
it('has a second signature page with 20 signatures on two pages', function () {
    Signature::factory()->confirmed()->count(20)->create();
    $this->browse(function (Browser $browser) {
        $browser->visit('/signatures?page=2')
            // "De 11 à 20 sur 20 résultats"
            ->assertSee(__('pagination.showing', locale: 'fr') . ' 11 ' . __('pagination.to', locale: 'fr') . ' 20 ' . __('pagination.of', locale: 'fr') . ' 20 ' . __('pagination.results', locale: 'fr'))
            ->assertSourceHas(__('pagination.nav_label', locale: 'fr'))
            ->assertSourceHas('<span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-white bg-theme border border-theme cursor-default leading-5">2</span>');
    });
    $this->browse(function (Browser $browser) {
        $browser->visit('/en/signatures?page=2')
            // "Showing 11 to 20 of 20 results"
            ->assertSee(__('pagination.showing', locale: 'en') . ' 11 ' . __('pagination.to', locale: 'en') . ' 20 ' . __('pagination.of', locale: 'en') . ' 20 ' . __('pagination.results', locale: 'en'))
            ->assertSourceHas(__('pagination.nav_label', locale: 'en'))
            ->assertSourceHas('<span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-white bg-theme border border-theme cursor-default leading-5">2</span>');
    });
});
it('does not have a third signature page with 20 signatures on two pages', function () {
    Signature::factory()->confirmed()->count(20)->create();
    $this->browse(function (Browser $browser) {
        $browser->visit('/signatures?page=3')
            ->assertSee(__('signatures.table.out_of_range', locale: 'fr'))
            // "De à sur 20 résultats"
            ->assertSee(__('pagination.showing', locale: 'fr') . ' ' . __('pagination.to', locale: 'fr') . ' ' . __('pagination.of', locale: 'fr') . ' 20 ' . __('pagination.results', locale: 'fr'))
            ->assertSourceHas(__('pagination.nav_label', locale: 'fr'))
            ->assertSourceMissing('<span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-white bg-theme border border-theme cursor-default leading-5">3</span>');
    });
    $this->browse(function (Browser $browser) {
        $browser->visit('/en/signatures?page=3')
            ->assertSee(__('signatures.table.out_of_range', locale: 'en'))
            // "Showing to of 20 results"
            ->assertSee(__('pagination.showing', locale: 'en') . ' ' . __('pagination.to', locale: 'en') . ' ' . __('pagination.of', locale: 'en') . ' 20 ' . __('pagination.results', locale: 'en'))
            ->assertSourceHas(__('pagination.nav_label', locale: 'en'))
            ->assertSourceMissing('<span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-white bg-theme border border-theme cursor-default leading-5">3</span>');
    });
});
