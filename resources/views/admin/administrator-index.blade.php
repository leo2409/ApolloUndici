<x-layouts.admin>
    <div class="space-y-4 md:mt-3">
        <h1 class="text-2xl text-center bg-purple-400 md:rounded-full px-8 py-0.5 max-w-screen-sm mx-auto font-semibold">AMMINISTRATORI</h1>
        <a href="{{ route('admin.administrator.create') }}" class="w-max py-1 px-2 mx-auto border border-gray-300 rounded-full flex flex-row justify-center items-center gap-x-2 hover:bg-admin-gray">
            <span class="text-sm font-semibold">Aggiungi</span>
            <img src="{{ asset('cms/images/plus.png') }}" alt="icon add" class="h-7">
        </a>
        <div class="max-w-screen-lg mx-auto">
            <table class="w-full border border-gray-700 border-collapse table-auto">
                <thead class="text-left bg-blue-300 border-b border-gray-700 font-bold">
                    <th class="py-3 px-3">Nome</th>
                    <th class="py-3 px-3 ">Username</th>
                    <th class="py-3 px-3 hidden md:table-cell">Email</th>
                    <th class="py-3 px-3">Modifiche</th>
                </thead>
                <tbody>
                @foreach($administrators as $administrator)
                    <x-admin.administrators-table-row :administrator="$administrator" :loop="$loop"/>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.admin>
