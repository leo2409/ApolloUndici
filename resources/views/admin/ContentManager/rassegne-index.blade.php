<x-layouts.admin>
    <div class="space-y-4 md:mt-3">
        <h1 class="text-2xl text-center bg-a-orange md:rounded-full px-8 py-0.5 max-w-screen-sm mx-auto font-semibold">RASSEGNE</h1>
        <a href="{{ route('admin.rassegne.create') }}" class="w-max py-1 px-2 mx-auto border border-gray-300 rounded-full flex flex-row justify-center items-center gap-x-2 hover:bg-admin-gray">
            <span class="text-sm font-semibold">Aggiungi</span>
            <img src="{{ asset('cms/images/plus.png') }}" alt="icon add" class="h-7">
        </a>
        <div class="flex flex-row flex-wrap justify-center sm:flex- gap-5 items-start max-w-screen-xl mx-auto">
            @foreach($rassegne as $rassegna)
                <div class="border border-gray-300 rounded-2xl max-w-sm">
                    <div class="flex flex-row justify-between items-center pl-3 pr-1">
                        <p class="text-gray-500 text-sm">Ultima modifica {{ $rassegna->updated_at->diffForHumans() }}</p>
                        <div class="relative">
                            <button role="button" onclick="toggleDropDown(this.nextElementSibling)" class="px-1 h-full">
                                <img src="{{ asset('cms/images/option.png') }}" alt="option icon" class="edit-icon h-7 no-double-tap-zoom">
                            </button>
                            <div class="dropdown-content hidden origin-top-right absolute right-0 bg-white border border-gray-300 rounded-md py-1 shadow-md">
                                <form id="edit-{{ $rassegna->id }}" method="get" action="{{ route('admin.rassegne.edit', ['rassegne' => $rassegna->id]) }}">
                                    @csrf
                                    <button form="edit-{{ $rassegna->id }}" type="submit" class="w-full px-4 py-2 hover:bg-gray-300 block" role="menuitem">Modifica</button>
                                </form>
                                <form id="delete-{{ $rassegna->id }}" method="post" action="{{ route('admin.rassegne.destroy', ['rassegne' => $rassegna->id]) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" form="delete-{{ $rassegna->id }}" onclick="return confirm('Sei sicuro di volerlo eliminare?')" class="w-full px-4 py-2 text-red-500 hover:bg-gray-300 block" role="menuitem">Elimina</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <img src="{{ asset($rassegna->medium_cover) }}" alt="{{ $rassegna->name }}" class="w-full max-w-screen-sm">
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
