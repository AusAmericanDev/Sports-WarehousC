<section class="sw-card">
    <h2>{{ __('Update password') }}</h2>
    <p class="desc">{{ __('Ensure your account is using a long, random password to stay secure.') }}</p>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="field-row single">
            <div class="field">
                <x-input-label for="update_password_current_password" :value="__('Current password')" />
                <x-text-input id="update_password_current_password" name="current_password" type="password" class="sw-input" placeholder="Enter current password" autocomplete="current-password" />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </div>
        </div>

        <div class="field-row">
            <div class="field">
                <x-input-label for="update_password_password" :value="__('New password')" />
                <x-text-input id="update_password_password" name="password" type="password" class="sw-input" placeholder="New password" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>

            <div class="field">
                <x-input-label for="update_password_password_confirmation" :value="__('Confirm password')" />
                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="sw-input" placeholder="Confirm new password" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </div>
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="btn-sw-primary">{{ __('Update password') }}</button>

            @if (session('status') === 'password-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-green-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>