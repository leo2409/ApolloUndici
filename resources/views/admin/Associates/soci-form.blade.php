<x-layouts.admin>
    <form action="/admin/soci{{ isset($user->id) ? "/{$user->id}" : "" }}" method="post" class="pb-5 mt-3 bg-admin-gray space-y-4 border-t border-b border-gray-300">
        @csrf
        @if(isset($user))
            @method('PUT')
        @endif
        <div class="max-w-screen-md mx-auto sm:space-y-4 font-semibold">
            <h1 class="text-center text-2xl">Dati socio</h1>
            <div class="mx-3 space-y-3">
                <div>
                    <label for="name" class="ml-3 block mb-0.5 font-semibold">
                        Nome completo
                    </label>
                    <input type="text" name="name" id="name" placeholder="nome e cognome" value="{{ $user->name ?? old('name') }}" class="rounded-lg w-full border-gray-500" required>
                    @error('name')
                    <p class="text-sm text-red-500 mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="flex flex-col sm:flex-row justify-between gap-x-2 gap-y-3">
                    <div class="w-full">
                        <label for="birth_place" class="ml-3 block mb-0.5 font-semibold">
                            Luogo di nascita
                        </label>
                        <input type="text" name="birth_place" id="birth_place" value="{{ $user->birth_place ?? old('birth_place') }}" class="rounded-lg w-full border-gray-500" required>
                        @error('birth_place')
                        <p class="text-sm text-red-500 mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="birthday" class="ml-3 block mb-0.5 font-semibold">
                            Data di nascita
                        </label>
                        <input type="date" name="birthday" id="birthday" value="{{ $user->birthday ?? old('birthday') }}" class="rounded-lg w-full border-gray-500" required>
                        @error('birthday')
                        <p class="text-sm text-red-500 mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="address" class="ml-3 block mb-0.5 font-semibold">
                        Indirizzo
                    </label>
                    <input type="text" name="address" id="address" value="{{$user->address ?? old('address') }}" class="rounded-lg w-full border-gray-500" required>
                    @error('address')
                    <p class="text-sm text-red-500 mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="flex flex-row justify-between gap-x-2">
                    <div class="w-full">
                        <label for="city" class="ml-3 block mb-0.5 font-semibold">
                            Città
                        </label>
                        <input type="text" name="city" id="city" value="{{ $user->city ?? old('city') }}" class="rounded-lg w-full border-gray-500" required>
                        @error('city')
                        <p class="text-sm text-red-500 mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="cap" class="ml-3 block mb-0.5 font-semibold">
                            CAP
                        </label>
                        <input type="number" name="cap" id="cap" value="{{ $user->cap ?? old('cap') }}" class="rounded-lg w-full border-gray-500" required>
                        @error('cap')
                        <p class="text-sm text-red-500 mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="email" class="ml-3 block mb-0.5 font-semibold">
                        Email
                    </label>
                    <input type="text" name="email" id="email" placeholder="email" value="{{ $user->email ?? old('email') }}" class="rounded-lg w-full border-gray-500" required>
                    @error('email')
                    <p class="text-sm text-red-500 mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
            </div>
            <div class="flex flex-row-reverse mt-4 mx-4">
                <div class="bg-yellow-300 border border-black text-2xl rounded-full w-max hover:shadow-md">
                    <button type="submit" class="px-9 py-2">{{ isset($user) ? 'Modifica' : 'Crea' }}</button>
                </div>
            </div>
        </div>
    </form>
</x-layouts.admin>
