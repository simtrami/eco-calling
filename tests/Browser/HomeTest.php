<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;


uses(DatabaseMigrations::class);

beforeEach(function () {
    App::setLocale('fr');
});

it('has a manifesto page', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/')
            ->assertSourceHas(__('index.title', locale: 'fr'));
        $browser->visit('/en')
            ->assertSourceHas(__('index.title', locale: 'en'));
    });
});
