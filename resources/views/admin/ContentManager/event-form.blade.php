<x-layouts.admin>
    <div class="pb-5 pt-2 mt-5 bg-admin-gray border-t border-b border-gray-300">
        <div class="max-w-screen-md mx-auto px-2">
            <div class="flex flex-row flex-nowrap justify-end gap-x-6 items-center px-2 pb-4">
                <a href="/film/{{ $film->slug }}/{{ $film->events[0]->id }}" class="text-center text-white border border-gray-300 rounded-full bg-blue-600 px-4 py-2 hover:bg-gray-300 block" role="menuitem">Visualizza</a>
                <form id="delete" action="/admin/film/{{ $film->id }}/events/{{ $event->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button form="delete" type="submit" onclick="return confirm('Sei sicuro di volerlo eliminare?')" class="flex flex-row flex-nowrap justify-center gap-1 items-center bg-red-500 rounded-full border border-gray-300 px-3 py-1.5 hover:shadow-md">
                        <span class="text-white text-lg">Elimina</span>
                        <img src="{{ asset('cms/images/delete.png') }}" alt="delete icon" class="h-7">
                    </button>
                </form>
            </div>
            <h1 class="text-center text-2xl">Evento {{ $film->title }}</h1>
            <form id="edit" action="/admin/film/{{ $film->id }}/events/{{ $event->id }}" method="post" class="space-y-4">
                @csrf
                @method('PUT')
                <div class="flex flex-row flex-nowrap justify-between gap-2">
                    <div>
                        <label for="date" class="block mb-0.5">
                            Data
                        </label>
                        <input type="date" name="date" id="date" class="rounded-lg w-full border-gray-300" value="{{ old('date') ?? $event->date }}" required>
                        @error('date')
                        <p class="text-sm text-red-500 mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div>
                        <label for="time" class="block mb-0.5">
                            Orario
                        </label>
                        <input type="time" name="time" id="time" class="rounded-lg w-full border-gray-300" value="{{ old('time') ?? $event->time }}" required>
                        @error('time')
                        <p class="text-sm text-red-500 mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="seats" class="block mb-0.5">
                        Posti
                    </label>
                    <input type="number" name="seats" id="seats" class="rounded-lg w-full border-gray-300" value="{{ old('seats') ?? $event->seats }}">
                    @error('seats')
                    <p class="text-sm text-red-500 mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div>
                    <label for="festival_id" class="ml-3 block mb-0.5 font-semibold">
                        Rassegna
                    </label>
                    <select id="festival_id" name="festival_id" class="rounded-lg border-gray-300">
                        <option value="" {{ $event->festival_id === null ? 'selected' : '' }}>nessuna</option>
                        @foreach($rassegne as $rassegna)
                            <option value="{{ $rassegna->id }}" {{ $event->festival_id === $rassegna->id ? 'selected' : '' }} >{{ $rassegna->name }}</option>
                        @endforeach
                    </select>
                    @error('festival')
                    <p class="text-sm text-red-500 mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div>
                    <label for="tag" class="block mb-0.5">
                        Etichetta Aggiuntiva
                    </label>
                    <input type="text" name="tag" id="tag" class="rounded-lg w-full border-gray-300"  value="{{ old('tag') ?? $event->tag }}">
                    @error('tag')
                    <p class="text-sm text-red-500 mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div>
                    <label for="description" class="block mb-0.5">
                        Descrizione
                    </label>
                    <textarea name="description" id="description" rows="10" class="w-full border-gray-300 rounded-xl" placeholder="descrizione dell'evento...">{{ old('description') ?? $event->description }}</textarea>
                    @error('description')
                    <p class="text-sm text-red-500 mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div>
                    <p class="ml-3 font-semibold">
                        Informazioni Evento
                    </p>
                    <div id="info-container" class="w-full rounded-xl border border-gray-300 bg-white flex flex-col pb-2 gap-2">
                        <div class="bg-admin-gray border-b border-gray-300 py-2 rounded-t-xl gap-2 flex flex-row items-end px-2 mb-2 justify-center">
                            <div>
                                <label class="block mb-0.5">
                                    Etichetta
                                </label>
                                <input type="text" name="" id="tag" class="rounded-lg w-full border-gray-300">
                            </div>
                            <div class="border border-gray-300 rounded-full bg-white px-2">
                                <button onclick="addInfo(this.parentNode.parentNode)" type="button" class="py-1 flex flex-row justify-center items-center gap-x-2" tabindex="0">
                                    <span class="text-sm font-semibold">Aggiungi</span>
                                    <img src="{{ asset('cms/images/plus.png') }}" alt="icon add" class="h-7">
                                </button>
                            </div>
                        </div>
                        @if((!isset($event) || empty($event['info'])) && old('title') === null)
                            <x-admin.component-info-form :key="'incontro con'" :value="''"/>
                        @endif
                        @if((!isset($event) || empty($event['info'])) && old('title') === null)
                            <x-admin.component-info-form :key="'a cura di'" :value="''"/>
                        @endif
                        @foreach(old('info') ?? $event->info ?? [] as $key => $value)
                            <x-admin.component-info-form :key="$key" :value="$value"/>
                        @endforeach
                        <template id="info-template">
                            <x-admin.component-info-form :key="0" :value="0"/>
                        </template>
                    </div>
                    @error('info')
                    <p class="text-sm text-red-500 mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="flex flex-row-reverse mx-4">
                    <div class="bg-yellow-300 border border-gray-300 text-2xl rounded-full w-max mt-4 hover:shadow-md">
                        <button type="submit" form="edit" class="px-9 py-2">Salva</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layouts.admin>
