<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    <h2 class="text-white">
        {{ __('Profile') }}
    </h2>
    <div class="container">
        <div class="row mt-5">
          <div class="col-sm">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.update-profile-information-form />
                </div>
            </div>
          </div>
          <div class="col-sm">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.update-password-form />
                </div>
            </div>
          </div>
        </div>
      </div>
</x-app-layout>
