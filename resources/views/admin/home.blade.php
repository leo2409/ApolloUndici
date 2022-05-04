<x-layouts.admin>
    <div class="space-y-4 md:mt-3">
        <h1 class="text-2xl text-center bg-a-blue md:rounded-full px-8 py-0.5 max-w-screen-sm mx-auto font-semibold">FILM</h1>
        <a href="{{ route('admin.film.create') }}" class="w-max py-1 px-2 mx-auto border border-gray-300 rounded-full flex flex-row justify-center items-center gap-x-2 hover:bg-admin-gray">
            <span class="text-sm font-semibold">Aggiungi</span>
            <img src="{{ asset('cms/images/plus.png') }}" alt="icon add" class="h-7">
        </a>
        <div class="flex flex-row justify-center flex-wrap items-start gap-4 max-w-screen-2xl mx-auto pb-10">
            @foreach($films as $film)
                <div class="w-screen max-w-screen-sm">
                    <div class="sm:border-l sm:border-r sm:rounded-xl">
                        <div class="flex flex-row justify-between items-center border-t sm:rounded-t-xl border-gray-300 pl-3 pr-1">
                            <p class="text-gray-500 text-sm">Ultima modifica {{ $film->updated_at->diffForHumans() }}</p>
                            <div class="relative">
                                <button role="button" onclick="toggleDropDown(this.nextElementSibling)" class="px-1 h-full">
                                    <img src="{{ asset('cms/images/option.png') }}" alt="option icon" class="edit-icon h-7 no-double-tap-zoom">
                                </button>
                                <div class="dropdown-content hidden origin-top-right absolute right-0 bg-white border border-gray-300 rounded-md py-1 shadow-md">
                                    <form id="edit-{{ $film->id }}" method="get" action="/admin/film/{{ $film->id }}/modifica">
                                        @csrf
                                        <button form="edit-{{ $film->id }}" type="submit" class="w-full px-4 py-2 hover:bg-gray-300 block" role="menuitem">Modifica</button>
                                    </form>
                                    <form id="events-edit-{{ $film->id }}" method="get" action="/admin/film/{{ $film->id }}/events/crea">
                                        <button form="events-edit-{{ $film->id }}" type="submit" class="w-full px-4 py-2 hover:bg-gray-300 block" role="menuitem">Programmazione</button>
                                    </form>
                                    <form id="delete-{{ $film->id }}" method="post" action="/admin/film/{{ $film->id }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" form="delete-{{ $film->id }}" onclick="return confirm('Sei sicuro di volerlo eliminare?\nVerranno eliminati acnhe tutti gli eventi associati a questo film!')" class="w-full px-4 py-2 text-red-500 hover:bg-gray-300 block" role="menuitem">Elimina</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="box-content w-full bg-admin-gray flex flex-row items-start border-b border-t border-gray-300 sm:rounded-b-xl max-h-44">
                            <img src="{{ asset($film->small_poster) }}" alt="locandina {{ $film->title }}" class="h-44 w-32 sm:rounded-bl-xl">
                            <div class="flex-1 items-stretch h-44 overflow-auto px-2">
                                <h2 class="text-left text-xl">{{ $film->title }}</h2>
                                <p class="" >di {{ $film->director }}</p>
                                <p class="text-gray-500 text-sm max-w-full">{{ $film->tag }}</p>
                                <p class="text-sm font-normal">{{ $film->synopsis }}</p>
                                <hr>
                                <a href="{{ $film->trailer }}" class="text-blue-600">Trailer</a>
                                <hr>
                                @if($film->info)
                                    @foreach($film->info as $key => $value)
                                        <x-film-info :key="$key" :value="$value"/>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div x-data="{ open: false }" >
                        <div x-show="open" x-transition class="w-full flex flex-row flex-wrap justify-center items-center gap-1.5 py-2 border border-t-0 rounded-br-xl rounded-bl-xl">
                            @if( isset($film->events[0]) )
                                @foreach($film->events as $event)
                                    <div @class(['border', 'rounded-lg', 'border-gray-300', 'bg-a-yellow' => ((bool) $event->description || (bool) $event->festival_id)])>
                                        <a href="{{ URL::route('admin.film.events.edit',['film' => $film->id, 'event' => $event->id]) }}" class="block px-1 py-0.5 text-center">
                                            <span class="font-semibold block">{{ $event->carbon_date->translatedFormat('j D') }}</span>
                                            <span class="block">{{ $event->time }}</span>
                                        </a>
                                    </div>
                                @endforeach
                            @else
                                <p>Non ci sono eventi per questo film</p>
                            @endif
                        </div>
                        <div class="w-max mx-auto border border-t-0 border-gray-300 rounded-br-xl rounded-bl-xl">
                            <button @click="open = ! open" onclick="this.querySelector('img').classList.toggle('rotate-180');" class="flex flex-row justify-center items-center gap-x-3 px-2 rounded-bl-xl rounded-br-xl hover:bg-admin-gray">
                                <span class="text-sm font-semibold">Orari</span>
                                <img src="{{ asset('cms/images/down-arrow.png') }}" alt="freccia icon" class="h-7 transform">
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{ $films->links() }}
</x-layouts.admin>
