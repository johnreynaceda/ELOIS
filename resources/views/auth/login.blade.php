<x-guest-layout>
  <!-- Session Status -->
  <x-auth-session-status class="mb-4" :status="session('status')" />

  <form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email Address -->
    <div>

      <x-input right-icon="user-circle" label="Email" id="email" type="email" name="email" :value="old('email')"
        required autofocus autocomplete="username" placeholder="" />
      {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
    </div>

    <!-- Password -->
    <div class="mt-4">
      <x-inputs.password label="Password" value="" id="password" name="password" required
        autocomplete="current-password" />

      {{-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
    </div>

    <!-- Remember Me -->
    <div class=" mt-4 flex justify-between items-center ">
      <label for="remember_me" class="inline-flex items-center">
        <input id="remember_me" type="checkbox"
          class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
          name="remember">
        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
      </label>
      @if (Route::has('password.request'))
        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
          href="{{ route('password.request') }}">
          {{ __('Forgot your password?') }}
        </a>
      @endif
    </div>

    <div class=" mt-5">
      <div class="">
        <x-button label="Sign In" type="submit" class="w-full" dark positive right-icon="login" />
      </div>

      <div class="mt-3">
        <span class="text-gray-600 text-sm lg:text-md">If you don't have an account, <a
            class="text-sky-400 hover:text-sky-500" href="{{ route('register') }}">Register
            Here</a></span>
      </div>
    </div>
  </form>
</x-guest-layout>
