<x-layouts.admin>
    <div class="mx-auto my-10 max-w-screen-sm ">
        <form action="/admin/login" id="login-form" method="POST" class="border border-gray-300 rounded-xl bg-white mx-2 px-2 py-4 bg-admin-gray">
            @csrf
            <h1 class="text-center text-4xl w-full">Login</h1>
            <div class="space-y-4 mt-5">
                @error('login')
                <p class="text-sm text-red-500 mt-1">
                    {{ $message }}
                </p>
                @enderror
                <div>
                    <label for="username" class="ml-3 block mb-0.5 font-semibold">
                        Username
                    </label>
                    <input type="text" name="username" id="username" placeholder="username" value="{{old('username') ?? '' }}" class="rounded-lg w-full border-gray-500" required autofocus>
                    @error('username')
                    <p class="text-sm text-red-500 mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="ml-3 block mb-0.5 font-semibold">
                        Password
                    </label>
                    <input type="password" name="password" id="password" placeholder="password" class="rounded-lg w-full border-gray-500" required>
                    @error('password')
                    <p class="text-sm text-red-500 mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div>
                    <button type="submit" form="login-form" class="text-xl bg-blue-500 text-white py-2 mt-5 rounded-xl w-full">Accedi</button>
                </div>
            </div>
        </form>
    </div>
</x-layouts.admin>
