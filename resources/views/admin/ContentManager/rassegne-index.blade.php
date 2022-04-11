<x-layouts.admin>
    <div class="space-y-4 md:mt-3">
        <h1 class="text-2xl text-center bg-a-orange md:rounded-full px-8 py-0.5 max-w-screen-sm mx-auto font-semibold">RASSEGNE</h1>
        <a href="/admin/rassegne/crea" class="w-max py-1 px-2 mx-auto border border-gray-300 rounded-full flex flex-row justify-center items-center gap-x-2 hover:bg-admin-gray">
            <span class="text-sm font-semibold">Aggiungi</span>
            <img src="{{ asset('cms/images/plus.png') }}" alt="icon add" class="h-7">
        </a>
        <div class="flex flex-row flex-wrap justify-center sm:flex- gap-5 items-start max-w-screen-xl mx-auto">
            @foreach($rassegne as $rassegna)
                <div class="border border-gray-300 rounded-2xl max-w-sm">
                    <img src="{{ asset($rassegna->medium_cover) }}" alt="{{ $rassegna->name }}" class="max-w-sm rounded-t-2xl">
                    <div class="mx-2 my-1">
                        <h3 class="text-center text-2xl">{{ $rassegna->name }}</h3>
                        <p class="h-24 overflow-y-scroll">
                            {{ $rassegna->description }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layouts.admin>
