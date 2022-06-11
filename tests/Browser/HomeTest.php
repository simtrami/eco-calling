<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;


uses(DatabaseMigrations::class);

it('has a manifesto page', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/')
            ->assertSourceHas(__('index.title'));
    });
});
