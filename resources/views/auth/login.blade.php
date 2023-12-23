<x-app-layout>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')"/>

        <div class="sm:mx-auto sm:w-full sm:max-w-sm mt-12">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
                Війти в аккаунт
            </h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="{{ route('login') }}" method="POST">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Пошта</label>
                    <div class="mt-2">
                        <x-text-input id="email" name="email" type="email" :value="old('email')"
                                      required autofocus autocomplete="email" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Пароль</label>
                        <div class="text-sm">
                            <a href="{{ route('password.request') }}" class="font-semibold text-indigo-600 hover:text-indigo-500">
                                Забули пароль?
                            </a>
                        </div>
                    </div>
                    <div class="mt-2">
                        <x-text-input id="password" name="password" type="password" autocomplete="current-password" required/>
                    </div>
                </div>

                <div>
                    <x-primary-button>Війти</x-primary-button>
                </div>
                <div>
                    <a href="{{ route('register') }}">
                        <x-secondary-button>Зареєструватися</x-secondary-button>
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
