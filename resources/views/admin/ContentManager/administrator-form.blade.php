<x-layouts.admin>
    <form action="/admin/administrator{{ isset($administrator->id) ? "/{$administrator->id}" : "" }}" method="post" class="pb-5 mt-3 bg-admin-gray space-y-4 border-t border-b border-gray-300">
        @csrf
        @if(isset($administrator))
            @method('PUT')
        @endif
        <div class="max-w-screen-md mx-auto sm:space-y-4 font-semibold">
            <h1 class="text-center text-2xl">Dati amministratore</h1>
            <div class="mx-3 space-y-3">
                <div>
                    <label for="name" class="ml-3 block mb-0.5 font-semibold">
                        Nome completo
                    </label>
                    <input type="text" name="name" id="name" placeholder="nome e cognome" value="{{ $administrator->name ?? old('name') }}" class="rounded-lg w-full border-gray-500" required>
                    @error('name')
                    <p class="text-sm text-red-500 mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div>
                    <label for="username" class="ml-3 block mb-0.5 font-semibold">
                        Username
                    </label>
                    <input type="text" name="username" id="username" placeholder="username" value="{{ $administrator->username ?? old('username') }}" class="rounded-lg w-full border-gray-500" required>
                    @error('username')
                    <p class="text-sm text-red-500 mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div>
                    <label for="email" class="ml-3 block mb-0.5 font-semibold">
                        Email
                    </label>
                    <input type="text" name="email" id="email" placeholder="email" value="{{ $administrator->email ?? old('email') }}" class="rounded-lg w-full border-gray-500" required>
                    @error('email')
                    <p class="text-sm text-red-500 mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                @if(!isset($administrator))
                    <div>
                        <label for="password" class="ml-3 block mb-0.5 font-semibold">
                            Password
                        </label>
                        <input type="text" name="password" id="password" placeholder="password" value="{{ old('password') }}" class="rounded-lg w-full border-gray-500" required>
                        @error('password')
                        <p class="text-sm text-red-500 mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                @else
                    <div>
                        <label for="password" class="ml-3 block mb-0.5 font-semibold">
                            Nuova password
                        </label>
                        <li class="text-gray-500 font-normal text-sm mb-1">lasciare in bianco se non si vuole modificarla</li>
                        <input type="text" name="password" id="password" placeholder="nuova password" class="rounded-lg w-full border-gray-500">
                        @error('password')
                        <p class="text-sm text-red-500 mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                @endif
            </div>
            <div class="flex flex-row-reverse mt-4 mx-4">
                <div class="bg-yellow-300 border border-black text-2xl rounded-full w-max hover:shadow-md">
                    <button type="submit" class="px-9 py-2">{{ isset($administrator) ? 'Modifica' : 'Crea' }}</button>
                </div>
            </div>
        </div>
    </form>
</x-layouts.admin>
