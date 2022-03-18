<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <a href="{{url('/')}}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-48">
            </a>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />
        <form method="POST" action="{{ route('registerProvider') }}" >
            @csrf

            <legend class="text-white mb-5">Company Information</legend>
            <input type="hidden" name="role" value="{{$role}}">

            <div class="mt-4">
                <x-jet-label for="company_name" value="{{ __('Company Name') }}" class="text-white"/>
                <x-jet-input id="company_name" class="block mt-1 w-full" type="text" name="company_name" :value="old('company_name')" required/>
            </div>

            <div class="mt-4">
                <x-jet-label for="work_area" value="{{ __('Work Area') }}" class="text-white"/>
                <x-jet-input id="work_area" class="block mt-1 w-full" type="text" name="work_area" :value="old('work_area')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="location" value="{{ __('Location') }}" class="text-white"/>
                <x-jet-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="number_employees" value="{{ __('Number Employees') }}" class="text-white"/>
                <x-jet-input id="number_employees" class="block mt-1 w-full" type="text" name="number_employees" :value="old('number_employees')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="information" value="{{ __('Information') }}" class="text-white"/>
                <textarea name="information" id="information" class="resize-none h-24 block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{old('information')}}</textarea>
            </div>

            @if (isset($user))
                <input type="hidden" name="user" value="{{$user}}">
            @else
                <legend class="text-white mt-6">Account Information</legend>

                <div class="mt-4">
                    <x-jet-label for="email" value="{{ __('Email') }}" class="text-white"/>
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required placeholder="john.snow@north.com" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Password') }}" class="text-white"/>
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="******" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="text-white"/>
                    <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="******" />
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
