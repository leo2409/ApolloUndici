<x-layouts.app :title="$title">
    <div class="max-w-screen-sm mx-auto rounded-4xl bg-3down py-6 shadow-lg-center-black border border-black">
        <h1 class="text-center text-3xl text-a-yellow text-shadow-sm-yellow">Domanda adesione soci</h1>
        <form action="/soci/store" method="POST" class="max-w-sm space-y-3 mx-auto mt-4 px-4">
            @csrf
            <div>
                <label for="name" class="block mb-0.5 font-semibold">
                    Nome e Cognome
                </label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="bg-up focus:border-a-blue focus:ring-a-blue rounded-lg w-full border-gray-500" autofocus required>
                @error('name')
                <p class="text-sm text-red-500 mt-1">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="flex flex-row justify-between gap-x-2">
                <div>
                    <label for="birth_place" class="block mb-0.5 font-semibold">
                        Luogo di nascita
                    </label>
                    <input type="text" name="birth_place" id="birth_place" value="{{ old('birth_place') }}" class="bg-up focus:border-a-blue focus:ring-a-blue rounded-lg w-full border-gray-500" required>
                    @error('birth_place')
                    <p class="text-sm text-red-500 mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div>
                    <label for="birthday" class="block mb-0.5 font-semibold">
                        Data di nascita
                    </label>
                    <input type="date" name="birthday" id="birthday" value="{{ old('birthday') }}" class="bg-up focus:border-a-blue focus:ring-a-blue rounded-lg w-full border-gray-500" required>
                    @error('birthday')
                    <p class="text-sm text-red-500 mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
            </div>
            <div>
                <label for="address" class="block mb-0.5 font-semibold">
                    Indirizzo
                </label>
                <input type="text" name="address" id="address" value="{{ old('address') }}" class="bg-up focus:border-a-blue focus:ring-a-blue rounded-lg w-full border-gray-500" required>
                @error('address')
                <p class="text-sm text-red-500 mt-1">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="flex flex-row justify-between gap-x-2">
                <div>
                    <label for="city" class="block mb-0.5 font-semibold">
                        Città
                    </label>
                    <input type="text" name="city" id="city" value="{{ old('city') }}" class="bg-up focus:border-a-blue focus:ring-a-blue rounded-lg w-full border-gray-500" required>
                    @error('city')
                    <p class="text-sm text-red-500 mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div>
                    <label for="cap" class="block mb-0.5 font-semibold">
                        CAP
                    </label>
                    <input type="number" name="cap" id="cap" value="{{ old('cap') }}" class="bg-up focus:border-a-blue focus:ring-a-blue rounded-lg w-full border-gray-500" required>
                    @error('cap')
                    <p class="text-sm text-red-500 mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
            </div>
            <div>
                <label for="email" class="block mb-0.5 font-semibold">
                    Email
                </label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="lowercase bg-up focus:border-a-blue focus:ring-a-blue rounded-lg w-full border-gray-500" required>
                @error('email')
                <p class="text-sm text-red-500 mt-1">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div>
                <label for="email-confirm" class="block mb-0.5 font-semibold">
                    Conferma Email
                </label>
                <input type="email" name="email_confirmation" id="email-confirm" value="{{ old('email_confirmation') }}" class="lowercase bg-up focus:border-a-blue focus:ring-a-blue rounded-lg w-full border-gray-500" required>
                @error('email_confirmation')
                <p class="text-sm text-red-500 mt-1">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="flex flex-row-reverse justify-center">
                <button type="submit" class="w-full mt-4 px-8 py-1.5 bg-up border font-semibold border-a-yellow text-a-yellow rounded-lg hover:bg-a-yellow hover:text-gray-900 hover:shadow-a-yellow">Invia</button>
            </div>
        </form>
    </div>
</x-layouts.app>
