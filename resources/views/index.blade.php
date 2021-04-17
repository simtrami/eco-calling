@extends('layout')

@section('stylesheets')
    @if (session('success'))
        <link href="{{ asset('src/css/success.css') }}" rel="stylesheet">
    @endif
@endsection

@section('scripts')
    <script src="{{ mix('js/index.js') }}"></script>
@endsection

@section('content')
    @if ($errors->any())
        <div id="error-alert" class="w-full flex justify-between items-center space-x-2 fixed top-[56px] bg-red-200 text-red-500 z-10 p-4
        md:top-[72px] md:px-4">
            <div><p>@lang('form.failure')</p></div>
            <button onclick="scrollToForm()" class="btn bg-red-500 text-sm text-white hover:bg-transparent hover:border-red-500
                    hover:text-red-500 focus:ring-red-500 md:text-base">@lang('form.correct')</button>
        </div>
    @endif
    {{--TODO--}}
    @if (session('success'))
        <x-success></x-success>
    @endif

    <main role="main">
        <!-- Jumbotron -->
        <div id="home" class="h-screen w-full min-h-[33rem] 2xl:min-h-[52rem]">
            <div class="font-title font-bold relative top-1/3 px-4 mx-auto
                md:max-w-screen-sm lg:max-w-screen-md xl:max-w-screen-lg 2xl:max-w-screen-xl xl:top-1/4">
                <h1 class="text-theme-dark text-5xl leading-snug md:text-6xl lg:text-7xl">
                    First title line,<br>
                    and a second one
                </h1>
                <p class="text-2xl mt-4">Already <span class="bg-theme text-white p-1">{{ $count }} people signed</span>!
                </p>
            </div>
            <div class="text-center text-accent flex justify-center relative top-1/2 2xl:top-2/3">
                <div onclick="scrollToTargetAdjusted('manifesto')" class="cursor-pointer">
                    <p class="font-semibold lg:text-lg">Read our manifesto</p>
                    <svg xmlns="http://www.w3.org/2000/svg" class="animate-bounce h-6 w-6 mx-auto mt-4 lg:h-8 lg:w-8"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>
            </div>
        </div>

        <div id="manifesto" class="w-full mb-12 md:text-lg">
            <!-- Headline -->
            <div class="bg-theme text-white py-10 px-4 md:px-20 lg:px-0">
                <p class="mx-auto max-w-4xl">
                    Sunt amores manifestum audax, neuter acipenseres.
                    Going to the mind doesn’t hurt joy anymore than
                    inventing creates outer stigma. Why does the ferengi warp?
                </p>
            </div>
            <!-- Socials -->
            <div class="text-theme flex-col sticky top-40 ml-4 mt-4 p-0 text-center hidden md:inline-flex">
                <div class="opacity-30 px-2.5 my-3 mx-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"/>
                    </svg>
                </div>
                <hr class="border-theme opacity-30 w-full my-4"/>
                <div class="px-2.5 my-3 mx-0">
                    <a class="hover:text-theme-dark" href="{{ env('LINK_POST_FB') }}" target="_blank"
                       title="Share on Facebook">
                        <x-icons.facebook></x-icons.facebook>
                    </a>
                </div>
                <div class="px-2.5 my-3 mx-0">
                    <a class="hover:text-theme-dark" href="{{ env('LINK_POST_TW') }}" target="_blank"
                       title="Share on Twitter">
                        <x-icons.twitter></x-icons.twitter>
                    </a>
                </div>
                <div class="px-2.5 my-3 mx-0">
                    <a class="hover:text-theme-dark" href="{{ env('LINK_POST_LIN') }}" target="_blank"
                       title="Share on LinkedIn">
                        <x-icons.linkedin></x-icons.linkedin>
                    </a>
                </div>
            </div>
            <!-- Manifesto -->
            <div class="px-4 mt-12 md:-mt-44 md:pr-8 md:pl-20 lg:px-0">
                <div class="mx-auto max-w-4xl">
                    <p class="mt-5">
                        Molestiae dolor dolorum enim praesentium sit voluptas qui sapiente. Dolorem odio consequatur
                        perferendis ad quo aut quisquam non. Esse expedita repellat temporibus sed fugit voluptatum.
                        Deleniti atque et consequatur quia suscipit. Illo debitis officiis dolorem accusamus et corporis
                        nihil. Distinctio qui esse est.
                    </p>
                    <h2 class="text-theme-dark font-title text-3xl font-bold mt-8 md:text-4xl">Sunt verpaes reperire
                        fatalis, varius abactores.</h2>
                    <p class="mt-5">
                        Aliquid ea et et et non et repellendus enim. Consequatur sint delectus in. Placeat quae est et
                        eveniet. Excepturi optio eum eveniet iste aut eum.
                    </p>
                    <p class="mt-5">
                        Velit accusantium cum est vero sed maiores. Maxime sed id voluptatem quaerat libero nobis.
                        Tenetur dolore quam aperiam expedita qui omnis temporibus. Vitae ducimus quia consequatur et
                        facere delectus cumque.
                    </p>
                    <p class="mt-5">
                        Id dolor sit voluptas aut blanditiis ipsum distinctio et. Ducimus ullam sit natus id ducimus.
                        Quidem vero blanditiis ut error perferendis quae. Ab maxime ut sequi rerum explicabo accusamus
                        ipsam sed.
                    </p>
                    <h2 class="text-theme-dark font-title text-3xl font-bold mt-8 md:text-4xl">Camerarius eleates foris
                        demittos humani generis est.</h2>
                    <ul class="list-disc mt-5 pl-8">
                        <li>Yarr, haul me bung hole, ye sunny shipmate!</li>
                        <li>Arg, weird parrot. go to port royal.</li>
                        <li>Arg, passion!</li>
                        <li>Why does the mast stutter?</li>
                        <li>Golly gosh, wet strength!</li>
                    </ul>
                    <p class="mt-5">
                        Nullam at purus ut lectus consequat aliquam non vitae odio. Proin purus lacus, imperdiet vel
                        varius vitae, tincidunt ut justo. Nunc eget dapibus eros, sed maximus orci. Nam lobortis commodo
                        faucibus. Suspendisse ac purus eros. Donec vel tortor nec risus condimentum ultricies non luctus
                        diam. Morbi nibh nisi, sodales id mattis in, varius quis dolor. Vestibulum ante ipsum primis in
                        faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse sit amet leo cursus erat
                        ornare interdum ac et felis.
                    </p>
                    <h2 class="text-theme-dark font-title text-3xl font-bold mt-8 md:text-4xl">Ubi est festus
                        verpa?</h2>
                    <p class="mt-5">
                        Nulla sit amet enim id eros malesuada porta. Phasellus porttitor posuere urna, id facilisis sem
                        euismod nec. Nunc a dolor et enim congue commodo. Donec pharetra commodo dolor, sed euismod
                        libero auctor at. Praesent vel risus at diam pretium maximus in id turpis. In hac habitasse
                        platea dictumst. Praesent consectetur ex a posuere interdum. Duis a aliquam nunc, at condimentum
                        tellus. Integer nec sollicitudin ipsum. Sed malesuada sapien quis erat fringilla hendrerit.
                        Donec sit amet pretium mauris. Fusce imperdiet laoreet justo, ac dictum nisl laoreet eget. Donec
                        ut lacus eget nisi fermentum bibendum.
                    </p>
                    <p class="mt-5">
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

        <!-- Form -->
        <div id="form"
             class="w-full flex items-center min-h-[calc(100vh-56px)] py-8 px-4 md:min-h-[calc(100vh-72px)] md:px-20 lg:px-0">
            <div class="mx-auto max-w-4xl">
                <div class="flex flex-col items-center space-y-4 md:flex-row md:justify-between md:items-baseline">
                    <h2 class="text-theme-dark font-title text-3xl font-bold md:text-4xl">Sign</h2>
                    <p class="text-xl">
                        Already <span class="bg-theme text-white p-1">{{ $count }} people signed</span>!
                    </p>
                </div>
                <x-form></x-form>
            </div>
        </div>

        <x-sponsors></x-sponsors>
    </main>
@endsection
