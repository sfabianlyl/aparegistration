<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-auto fill-current text-gray-500" style="height:10rem"/>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.change.process') }}">
            @csrf

            

            <!-- Old Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Old Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="new_password" :value="__('New Password')" />

                <x-input id="new_password" class="block mt-1 w-full" type="password" name="new_password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="new_password_confirmation" :value="__('Confirm New Password')" />

                <x-input id="new_password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="new_password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Change Password') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
