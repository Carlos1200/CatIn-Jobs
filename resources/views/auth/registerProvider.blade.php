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
            <input type="hidden" name="user" value="{{$user}}">
            <input type="hidden" name="role" value="{{$role}}">

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

            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
