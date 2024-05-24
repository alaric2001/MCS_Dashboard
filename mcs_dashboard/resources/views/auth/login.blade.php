<x-guest-layout>
    
    <div class="flex flex-col w-screen ml-[170px]">

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        
        <p class="w-[720px] font-bold text-[64px] text-[#394C29] leading-[104%]">
            MONITORING SISTEM
            KOMUNIKASI TNI
        </p>

        <div class="flex justify-between items-center">
            <div class="my-[40px] flex flex-col gap-4">
                <form class="w-[400px]" method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
            
                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
            
                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />
            
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
            
                    <!-- Remember Me -->
                    {{-- <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div> --}}
            
                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600  hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 " href="/register">
                            {{ __("Don't have an account?") }}
                        </a>
            
                        <x-primary-button class="ms-3">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>

            <div class="">
                <img class="rounded-2xl" src="{{ asset('images/bg.png') }}" alt="bg">
            </div>
        </div>
    </div>
</x-guest-layout>
