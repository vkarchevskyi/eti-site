<x-app-layout>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm mt-12 space-y-4">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
                Забули пароль?
            </h2>
            <p class="text-center font-semibold tracking-tight text-gray-900 text-lg">Розслабся 🤭</p>
            <p class="text-center tracking-tight text-gray-900 text-base">
                Просто впиши свою пошту та натисни на кнопочку у листі :)
            </p>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="{{ route('password.email') }}" method="POST">
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
                    <x-primary-button>Відправити лист</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
