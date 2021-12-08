<x-layouts.admin>
    <div class="mt-3 w-full text-center">
        <h1 class="text-2xl">Soci</h1>
    </div>
    <div id="switch-operation" class="w-full text-center flex flex-row justify-center mt-2">
        <button id="requests-button" class="border border-gray-300 rounded-l-full px-3 py-1 w-28">Richieste</button>
        <button id="payments-button" class="border border-l-0 border-gray-300 rounded-r-full px-3 py-1 w-28">Pagamenti</button>
    </div>
    <div class="mx-3 mt-3 flex flex-row flex-nowrap justify-between gap-3">
        <input type="text" placeholder="Cerca..." class="border border-gray-300 rounded-full w-full">
        <button type="button" class="border border-gray-300 rounded-full min-w-max">
            <img src="{{ asset('cms/images/back-in-time.png') }}" alt="icon cronology" class="h-10 py-1 px-2">

        </button>
    </div>
    <div class="mt-2 w-full">
        <table class="w-full border border-gray-700 border-collapse">
            <thead class="py-5 text-left">
                <th class="py-3 px-3">Nome</th>
                <th class="py-3 px-3">Stato</th>
                <th class="py-3 px-3">Operazioni</th>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <x-admin.associate-table-row :user="$user"/>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.admin>
