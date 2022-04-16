<x-layouts.admin>
    <div class="space-y-4 md:mt-3">
        <h1 class="text-2xl text-center bg-green-300     md:rounded-full px-8 py-0.5 max-w-screen-sm mx-auto font-semibold">I MIEI DATI</h1>
        <div class="mx-auto my-10 max-w-screen-sm rounded-xl border border-gray-500 bg-admin-gray px-5 py-3">
            <h1 class="text-2xl mb-2 font-bold">{{ $io->name }}</h1>
            <div class="px-3">
                <h4 class="font-bold text-lg">Username</h4>
                <p>{{ $io->username }}</p>
                <h4 class="font-bold text-lg">Email</h4>
                <p>{{ $io->email }}</p>
            </div>
            <div class="flex flex-row justify-end items-center gap-x-3">
                <a href="{{ route('admin.profile.logout') }}" class="px-5 py-1 border border-gray-500 text-white bg-yellow-400 text-xl font-semibold rounded-full">
                    MODIFICA <img src="{{ asset('cms/images/edit.png') }}" alt="exit icon" class="pl-2 h-7 inline">
                </a>
                <a href="{{ route('admin.profile.logout') }}" class="px-5 py-1 border border-gray-500 text-white bg-red-500 text-xl font-semibold rounded-full">
                    ESCI <img src="{{ asset('cms/images/exit.png') }}" alt="exit icon" class="pl-2 h-7 inline">
                </a>
            </div>
        </div>
    </div>
</x-layouts.admin>
