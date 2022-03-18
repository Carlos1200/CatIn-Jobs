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
            <legend class="text-white mb-5">Personal Information</legend>
            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" class="text-white"/>
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="John Snow..." />
            </div>

            <div class="mt-4">
                <x-jet-label for="gender" value="{{ __('Gender') }}" class="text-white"/>
                <select name="gender" id="gender" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" required>
                    <option value="" disabled selected> --Select-- </option>
                    @foreach ($genders as $gender)
                        <option value="{{$gender->id}}">{{$gender->gender}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="birthday" value="{{ __('Birthday') }}" class="text-white"/>
                <input type="date" name="birthday" id="birthday" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" :value="old('birthday')">
            </div>

            <div class="mt-4">
                <x-jet-label for="nationality" value="{{ __('Nationality') }}" class="text-white"/>
                <x-jet-input id="nationality" class="block mt-1 w-full" type="text" name="nationality" :value="old('nationality')" required placeholder="Winterfell" />
            </div>

            <div class="mt-4">
                <x-jet-label for="phone_contact" value="{{ __('Phone Contact') }}" class="text-white"/>
                <x-jet-input id="phone_contact" class="block mt-1 w-full" type="text" name="phone_contact" :value="old('phone_contact')" required placeholder="78894455" />
            </div>

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

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-white hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
