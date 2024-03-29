<x-app-layout>
    <x-slot name="header">
        <h2 class="">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="">
            <div class="">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
