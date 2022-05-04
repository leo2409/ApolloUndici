<x-layouts.admin>
    <h1 class="md:mt-3 text-2xl text-center bg-green-400 md:rounded-full px-8 py-0.5 max-w-screen-sm mx-auto font-semibold">SOCI</h1>
    <div class="flex flex-row justify-center gap-x-2 flex-nowrap items-center mt-2">
        <div id="switch-operation" class="text-center flex flex-row justify-center">
            <button id="requests-button" onclick="onlyAccept(this)" class="border border-gray-300 rounded-l-full px-3 py-1.5 w-28 bg-gray-200 text-blue-600">Richieste</button>
            <button id="payments-button" onclick="alsoPayments(this)" class="border border-l-0 border-gray-300 rounded-r-full px-3 py-1.5 w-28">Pagamenti</button>
        </div>
        <a href="{{ route('admin.soci.create') }}" class="py-1 px-2 border border-gray-300 rounded-full flex flex-row justify-center items-center gap-x-2 hover:bg-admin-gray">
            <span class="text-sm font-semibold">Aggiungi</span>
            <img src="{{ asset('cms/images/plus.png') }}" alt="icon add" class="h-7">
        </a>
    </div>
    <div class="mx-3 mt-3 flex flex-row flex-nowrap justify-between gap-3 max-w-screen-md mx-auto">
        <form method="GET" action="#" class="w-full">
            <input onkeydown="searchSoci(this)" type="text" placeholder="Cerca..." name="search" value="{{ request('search') }}" class="border border-gray-300 rounded-full w-full">
        </form>
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
