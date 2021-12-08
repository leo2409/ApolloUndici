<x-layouts.admin>
    <div class="pb-5 pt-2 mt-5 bg-admin-gray border-t border-b border-gray-300">
        <div class="max-w-screen-md mx-auto px-2">
            <div class="flex flex-row flex-nowrap justify-between items-center px-2 pb-4">
                <h1 class="text-center text-2xl">Evento {{ $film->title }}</h1>
                <form id="delete" action="/admin/film/{{ $film->id }}/events/{{ $event->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="flex flex-row flex-nowrap justify-center gap-1 items-center bg-red-500 rounded-full border border-gray-300 px-3 py-1.5">
                        <span class="text-white text-lg">Elimina</span>
                        <img src="{{ asset('cms/images/delete.png') }}" alt="delete icon" class="h-7">
                    </button>
                </form>
            </div>
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
                    <textarea name="description" id="description" rows="10" class="w-full border-gray-500 rounded-xl" placeholder="descrizione dell'evento...">{{ old('description') ?? $event->description }}</textarea>
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
                    <div id="info-container" class="w-full rounded-xl border border-gray-500 bg-white flex flex-col py-2 gap-2">
                        <div class="w-max mx-auto border border-gray-300 rounded-full px-2">
                            <button onclick="addInfo()" type="button" class="py-1 flex flex-row justify-center items-center gap-x-2" tabindex="0">
                                <span class="text-sm font-semibold">Aggiungi</span>
                                <img src="{{ asset('cms/images/plus.png') }}" alt="icon add" class="h-7">
                            </button>
                        </div>
                        @foreach(old('info') ?? $film->info ?? [] as $info)
                            <x-admin.component-info-form :info="$info" :i="$loop->index"/>
                        @endforeach
                        <template id="info-template">
                            <x-admin.component-info-form :i="0"/>
                        </template>
                    </div>
                    @error('info')
                    <p class="text-sm text-red-500 mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="flex flex-row-reverse mx-4">
                    <div class="bg-yellow-300 border border-gray-300 text-2xl rounded-full w-max mt-4">
                        <button type="submit" form="edit" class="px-9 py-2">Salva</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layouts.admin>
