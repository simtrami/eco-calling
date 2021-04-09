@extends('layout')

@section('stylesheets')
{{--    <link href="{{ mix('css/signatures.css') }}" rel="stylesheet">--}}
@endsection

@section('content')
    <main role="main">
        @if (session('success'))
            <div class="alert alert-success d-flex mt-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="page-title-section">
            <div class="container mt-5">
                <h1>All the <span class="background-signature">{{ $count }} people</span><br/>
                    who support us
                </h1>
                <div class="button-find d-flex align-items_center justify-content-center">
                    <a href="#signatures">
                        <p>Meet the signatories</p>
                        <i class="fas fa-chevron-down"></i>
                    </a>
                </div>
            </div>
        </div>

        <x-motivation></x-motivation>

        <div class="corpus" id="signatures">
            <div class="container">
                <h2>Look at all of us!</h2>
                <table class="table table-sm table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($signatures as $signature)
                        <tr>
                            <td>{{ $signature->full_name }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td>@lang('signatures.empty')</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <x-paginate page="{{ $page }}" last="{{ $last }}"></x-paginate>
            </div>

            <p class="after-table">Want to be a part of it?<br>It's this way 👇</p>
            <div class="button-register mt-3">
                <a href="{{ route('home') }}#form">
                    <div class="btn btn-sign my-2 px-3">@lang('form.submit')</div>
                </a>
            </div>

            <x-sponsors></x-sponsors>
        </div>
    </main>
@endsection

@section('scripts')
@endsection
