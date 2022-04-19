<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <a href="{{url('/')}}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-48">
            </a>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />
        <form method="POST" action="{{ route('registerRole') }}" >
            @csrf
            <legend class="text-white mb-5">Account type</legend>
            @if(isset($userEncode))
            <input type="hidden" name="user" value="
                    {{$userEncode}}
                    ">
                    @endif
                    
            <div class="mt-4 flex justify-around items-center">
                <div class="flex flex-col justify-center items-center">
                    <x-jet-label for="user" value="{{ __('User') }}" class="text-white text-2xl"/>
                    <input type="radio" name="role" id="user" value="user" checked>
                </div>
                <div class="flex flex-col justify-center items-center">
                    <x-jet-label for="company" value="{{ __('Company') }}" class="text-white text-2xl"/>
                    <input type="radio" name="role" id="company" value="company">
                </div>
            </div>


            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Next') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>