@extends('layout')

@section('stylesheets')
    @if (session('success'))
        <link href="{{ asset('src/css/success.css') }}" rel="stylesheet">
    @endif
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger d-flex mt-4">
            @lang('form.failure')
            <div class="flex-fill"></div>
            <a class="btn btn-sm btn-outline-danger" href="#form">@lang('form.correct')</a>
        </div>
    @endif
    @if (session('success'))
        <x-success></x-success>
    @endif

    <main role="main">
        <div class="page-title-section" id="home">
            <div class="container mt-5">
                <h1>
                    First title line,<br>
                    and a second one
                </h1>
                <p>Already <span class="background-signature">{{ $count }} people signed</span>!</p>
                <div class="button-find d-flex justify-content-center">
                    <div class="nav-link">
                        <p class="button-discover">Read our manifesto</p>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="themed-box">
            <div class="container">
                <p>Sunt amores manifestum audax, neuter acipenseres. Going to the mind doesn’t hurt joy anymore than
                    inventing creates outer stigma. Why does the ferengi warp?</p>
            </div>
        </div>

        <div id="main-corpus" class="corpus">
            <div class="socials">
                <div>
                    <span>
                        <i class="fas fa-share-alt"></i>
                    </span>
                </div>
                <hr/>
                <div>
                    <a href="{{ env('LINK_POST_FB') }}" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </div>
                <div>
                    <a href="{{ env('LINK_POST_TW') }}" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
                <div>
                    <a href="{{ env('LINK_POST_LIN') }}" target="_blank">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
            <div class="container">
                <div class="content-text">
                    <p>
                        Molestiae dolor dolorum enim praesentium sit voluptas qui sapiente. Dolorem odio consequatur
                        perferendis ad quo aut quisquam non. Esse expedita repellat temporibus sed fugit voluptatum.
                        Deleniti atque et consequatur quia suscipit. Illo debitis officiis dolorem accusamus et corporis
                        nihil. Distinctio qui esse est.
                    </p>
                    <h2>Sunt verpaes reperire fatalis, varius abactores.</h2>
                    <p>
                        Aliquid ea et et et non et repellendus enim. Consequatur sint delectus in. Placeat quae est et
                        eveniet. Excepturi optio eum eveniet iste aut eum.<br><br>
                        Velit accusantium cum est vero sed maiores. Maxime sed id voluptatem quaerat libero nobis.
                        Tenetur dolore quam aperiam expedita qui omnis temporibus. Vitae ducimus quia consequatur et
                        facere delectus cumque.<br><br>
                        Id dolor sit voluptas aut blanditiis ipsum distinctio et. Ducimus ullam sit natus id ducimus.
                        Quidem vero blanditiis ut error perferendis quae. Ab maxime ut sequi rerum explicabo accusamus
                        ipsam sed.
                    </p>
                    <h2>Camerarius eleates foris demittos humani generis est.</h2>
                    <ul>
                        <li>Yarr, haul me bung hole, ye sunny shipmate!</li>
                        <li>Arg, weird parrot. go to port royal.</li>
                        <li>Arg, passion!</li>
                        <li>Why does the mast stutter?</li>
                        <li>Golly gosh, wet strength!</li>
                    </ul>
                    <p>
                        Nullam at purus ut lectus consequat aliquam non vitae odio. Proin purus lacus, imperdiet vel
                        varius vitae, tincidunt ut justo. Nunc eget dapibus eros, sed maximus orci. Nam lobortis commodo
                        faucibus. Suspendisse ac purus eros. Donec vel tortor nec risus condimentum ultricies non luctus
                        diam. Morbi nibh nisi, sodales id mattis in, varius quis dolor. Vestibulum ante ipsum primis in
                        faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse sit amet leo cursus erat
                        ornare interdum ac et felis.
                    </p>
                    <h2>Ubi est festus verpa?</h2>
                    <p>
                        Nulla sit amet enim id eros malesuada porta. Phasellus porttitor posuere urna, id facilisis sem
                        euismod nec. Nunc a dolor et enim congue commodo. Donec pharetra commodo dolor, sed euismod
                        libero auctor at. Praesent vel risus at diam pretium maximus in id turpis. In hac habitasse
                        platea dictumst. Praesent consectetur ex a posuere interdum. Duis a aliquam nunc, at condimentum
                        tellus. Integer nec sollicitudin ipsum. Sed malesuada sapien quis erat fringilla hendrerit.
                        Donec sit amet pretium mauris. Fusce imperdiet laoreet justo, ac dictum nisl laoreet eget. Donec
                        ut lacus eget nisi fermentum bibendum.<br><br>
                        Suspendisse efficitur orci nulla, a rhoncus lorem auctor et. Sed ac lorem et tortor tincidunt
                        venenatis et quis odio. Quisque elit odio, tempus in maximus a, egestas non erat. Praesent
                        rutrum libero risus, vel accumsan magna commodo nec. Quisque non suscipit augue. Morbi blandit
                        risus ex, at molestie metus sollicitudin in. Mauris luctus risus at orci hendrerit auctor. Fusce
                        mattis metus a ultricies euismod.
                    </p>
                </div>
            </div>
        </div>

        <x-motivation></x-motivation>

        <div class="signing-form" id="form">
            <div class="container">
                <div class="header">
                    <h2>Sign</h2>
                    <p>Already <span class="background-signature">{{ $count }} people signed</span></p>
                </div>
                <div class="row">
                    <x-form></x-form>
                </div>
            </div>
        </div>

        <x-sponsors></x-sponsors>
    </main>
@endsection

@section('scripts')
@endsection
