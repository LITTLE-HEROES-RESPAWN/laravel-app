<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        {{-- 追加 --}}
        <h3 class="text-lg font-bold text-white px-6 py-3 -mx-6 -mt-4 mb-4 bg-red-500 rounded-t">管理者ログイン</h3>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        {{-- ルート変更 --}}
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf

            <div>
                <x-input-label for="login-id" value="ログインID" />

                <x-text-input id="login-id" class="block mt-1 w-full" type="text" name="login_id" :value="old('login_id')"
                    required autofocus />

                <x-input-error :messages="$errors->get('login_id')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            {{-- Remember Me 削除 --}}

            <div class="flex items-center justify-end mt-4">

                {{-- 未登録ルート削除（password.request） --}}

                <x-primary-button class="ml-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
