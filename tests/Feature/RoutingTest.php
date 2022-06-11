<?php

use App\Models\Signature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\followingRedirects;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

uses(RefreshDatabase::class);
uses(WithFaker::class);

it('has a manifesto page')->get('/')->assertOk();
it('registers a new signature when posted correctly', function () {
    followingRedirects()->post('/', [
        'first_name' => 'Foo',
        'last_name' => 'Bar',
        'email' => 'foo@bar.tld',
        'register' => 'on',
    ])->assertValid([
        'first_name',
        'last_name',
        'email',
        'register',
    ])->assertSee(__('success.title'));

    assertDatabaseCount('signatures', 1);
    assertDatabaseHas('signatures', [
        'first_name' => 'Foo',
        'last_name' => 'Bar',
        'email' => 'foo@bar.tld',
    ]);
});
it('does not register a new signature when posted incorrectly', function () {
    post('/', [
        'last_name' => 'Bar',
        'email' => 'foo@bar.tld',
        'register' => 'on',
    ])->assertValid([
        'last_name',
        'email',
        'register',
    ])->assertInvalid([
        'first_name',
    ])->assertRedirect('/');

    assertDatabaseCount('signatures', 0);
});

it('has a signature page')->get('/signatures')->assertOk();
it('has a signature page when there are 10 signatures', function () {
    Signature::factory()->confirmed()->count(10)->create();
    get('/signatures')->assertOk();
});
it('has a first signature page where there are 20 signatures', function () {
    Signature::factory()->confirmed()->count(20)->create();
    get('/signatures?page=1')->assertOk();
});
it('has a second signature page where there are 20 signatures', function () {
    Signature::factory()->confirmed()->count(20)->create();
    get('/signatures?page=2')->assertOk();
});
it('has a third signature page where there are 20 signatures', function () {
    Signature::factory()->confirmed()->count(20)->create();
    get('/signatures?page=3')->assertOk();
});
