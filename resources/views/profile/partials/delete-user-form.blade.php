<section class="space-y-6" x-data="{
    showDelete: false,
    openModal() {
        this.showDelete = true;
    },
    closeModal() {
        this.showDelete = false;
    },
    deleteAccount() {
        // Perform deletion logic here
        // You can submit the form or make an AJAX request
        // If successful, you can redirect or show a success message
    }
}" x-init="$watch('showDelete', value => {
    if (value) {
        $dispatch('open-modal', 'confirm-user-deletion');
    } else {
        $dispatch('close-modal', 'confirm-user-deletion');
    }
})">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button x-on:click.prevent="openModal">
        {{ __('Delete Account') }}
    </x-danger-button>

    <x-modal name="confirm-user-deletion" trigger="showDelete" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6" x-on:submit.prevent="deleteAccount">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input id="password" name="password" type="password" class="block w-3/4 mt-1"
                    placeholder="{{ __('Password') }}" />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="flex justify-end mt-6">
                <x-secondary-button x-on:click="closeModal">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button type="submit" class="ml-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
