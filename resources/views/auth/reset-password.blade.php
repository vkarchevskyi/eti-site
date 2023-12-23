<x-app-layout>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm mt-12">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
                Відновлення паролю
            </h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="{{ route('password.store') }}" method="POST">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <input type="hidden" name="email" value="{{ $request->get('email') }}">

                <x-input-error :messages="$errors->get('email')" class="mt-2"/>

                <div>
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Пароль</label>
                    <div class="mt-2">
                        <x-text-input id="password" name="password" type="password"
                                      required autocomplete="new-password" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">
                        Підтвердження паролю
                    </label>
                    <div class="mt-2">
                        <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                                      required autocomplete="new-password" />
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
                </div>

                <div>
                    <x-primary-button>
                        Відновити пароль
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
