<x-app-layout>
    <div class="flex min-h-full flex-col justify-center px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm mt-12">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
                Зареєструватися
            </h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="{{ route('register') }}" method="POST">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Ім'я користувача</label>
                    <div class="mt-2">
                        <x-text-input id="username" name="name" type="text"
                                      required autofocus autocomplete="username" />
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Пошта</label>
                    <div class="mt-2">
                        <x-text-input id="email" name="email" type="email"
                                      required autocomplete="email" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                </div>

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
                    <x-primary-button>Зареєструватися</x-primary-button>
                </div>
                <div>
                    <a href="{{ route('login') }}">
                        <x-secondary-button>Війти</x-secondary-button>
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
