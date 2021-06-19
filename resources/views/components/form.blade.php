<form class="text-theme-dark dark:text-white grid grid-cols-1 gap-6 md:grid-cols-2 mt-10"
      method="POST" action="{{ route('sign') }}"
>
    @csrf
    <div>
        <label class="text-sm font-medium" for="first-name">{!! __('form.first_name.label') !!}</label>
        <div class="mt-1">
            <input class="caret-theme @error('first_name') border-red-600 focus:border-red-500 caret-red-500 @enderror"
                   type="text" name="first_name" id="first-name" placeholder="{{ __('form.first_name.placeholder') }}"
                   value="{{ old('first_name') }}"
            >
            @error('first_name')
            <div class="text-xs text-red-500">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div>
        <label class="text-sm font-medium" for="last-name">{!! __('form.last_name.label') !!}</label>
        <div class="mt-1">
            <input class="caret-theme @error('last_name') border-red-600 focus:border-red-500 caret-red-500 @enderror"
                   type="text" name="last_name" id="last-name" placeholder="{{ __('form.last_name.placeholder') }}"
                   value="{{ old('last_name') }}"
            >
            @error('last_name')
            <div class="text-xs text-red-500">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="md:col-span-2">
        <label class="text-sm font-medium" for="email">{!! __('form.email.label') !!}</label>
        <div class="mt-1">
            <input class="caret-theme @error('email') border-red-600 focus:border-red-500 caret-red-500 @enderror"
                   type="email" name="email" id="email" placeholder="{{ __('form.email.placeholder') }}"
                   value="{{ old('email') }}"
            >
            @error('email')
            <div class="text-xs text-red-500">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="md:col-span-2">
        <div class="flex items-start">
            <input class="mt-1 @error('register') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror"
                   type="checkbox" id="register-checkbox" name="register"
            > <label class="text-sm text-justify block ml-2" for="register-checkbox">{!! __('form.accept') !!}</label>
        </div>
        @error('register')
        <div class="text-xs text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="md:col-span-2">
        <button
            class="btn w-full rounded-full border-theme bg-theme text-white px-4 hover:bg-white dark:hover:bg-darker hover:text-theme dark:hover:text-theme-light dark:hover:border-theme-light focus:ring-theme dark:focus:ring-theme-light focus:ring-offset-white dark:focus:ring-offset-darker md:w-auto md:px-8 md:text-base md:h-auto md:block md:mx-auto"
            type="submit"
        >{{ __('form.submit') }}</button>
    </div>
</form>
