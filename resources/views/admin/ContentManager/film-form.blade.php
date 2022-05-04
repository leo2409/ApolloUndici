<x-layouts.admin>
    <form action="/admin/film{{ isset($film->id) ? "/{$film->id}" : "" }}" method="post" enctype="multipart/form-data" class="pb-5 mt-3 bg-admin-gray space-y-4 border-t border-b border-gray-300">
        @csrf
        @if(isset($film))
            @method('PUT')
        @endif
        <div class="max-w-screen-md mx-auto sm:space-y-4 font-semibold">
            <h1 class="text-center text-2xl">Dati film</h1>
            <div class="mx-3 space-y-3 flex flex-col-reverse sm:flex-row justify-center items-center space-x-3">
                <div class="flex-1">
                    <div>
                        <label for="title" class="ml-3 block mb-0.5 font-semibold">
                            Titolo
                        </label>
                        <input type="text" name="title" id="title" placeholder="titolo" value="{{ $film->title ?? old('title') }}" class="rounded-lg w-full border-gray-500" required>
                        @error('title')
                        <p class="text-sm text-red-500 mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div>
                        <label for="tag" class="ml-3 block mb-0.5 font-semibold">
                            Etichetta
                        </label>
                        <input type="text" name="tag" id="tag" placeholder="film | proiezione | musica | letteratura" value="{{ $film->tag ?? old('tag') }}" class="rounded-lg w-full border-gray-500">
                        @error('tag')
                        <p class="text-sm text-red-500 mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="poster" class="ml-3 mb-0 5 font-semibold">Locandina</label>
                        <input type="file" onchange="imagePreview(this, 'poster_preview')" name="poster" id="poster" accept="image/jpeg,image/png,image/webp" tabindex="0"/>
                        <p class="text-sm text-gray-700">File png o jpeg in proporzioni 7:10 dimensioni file < 8MB</p>
                        @error('poster')
                        <p class="text-sm text-red-500 mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>
                <div class="h-44 w-32">
                    <img id="poster_preview" src="{{ isset($film) ? asset($film->small_poster) : '' }}" alt="locandina film" class="cover h-44 w-32 border border-gray-500">
                </div>
            </div>
            <div class="w-96 h-56 mx-auto mt-6">
                <img id="frame_preview" src="{{ isset($film) ? asset($film->small_frame) : '' }}" alt="frame film" class="cover w-96 h-56 border border-gray-500">
            </div>
            <div class="mx-3">
                <label for="frame" class="ml-3 block mb-0.5 font-semibold">
                    Frame
                </label>
                <input type="file" onchange="imagePreview(this, 'frame_preview')" name="frame" id="frame" accept="image/jpeg,image/png,image/webp" tabindex="0"/>
                <p class="text-sm text-gray-700">File png o jpeg in proporzioni 16:9, min 1000px width e dimensioni file < 8MB</p>
                @error('frame')
                <p class="text-sm text-red-500 mt-1">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="mx-3">
                <label for="director" class="ml-3 block mb-0.5 font-semibold">
                    Regia
                </label>
                <input type="text" name="director" id="director" placeholder="regia" value="{{ $film->director ?? old('director') }}" class="rounded-lg w-full border-gray-500" required>
                @error('director')
                <p class="text-sm text-red-500 mt-1">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="mx-3">
                <label for="synopsis" class="ml-3 block mb-0.5 font-semibold">
                    Sinossi
                </label>
                <textarea name="synopsis" id="synopsis" rows="10" class="w-full border-gray-500 rounded-xl" placeholder="sinossi..." required>{{ $film->synopsis ?? old('synopsis') }}</textarea>
                @error('synopsis')
                <p class="text-sm text-red-500 mt-1">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="mx-3">
                <label for="trailer" class="ml-3 block mb-0.5 font-semibold">
                    Trailer
                </label>
                <input type="text" name="trailer" id="trailer" placeholder="trailer" value="{{ $film->trailer ?? old('trailer') }}" class="rounded-lg w-full border-gray-500" required>
                @error('trailer')
                <p class="text-sm text-red-500 mt-1">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="mx-3">
                <p class="ml-3 font-semibold">
                    Scheda tecnica
                </p>
                <div id="info-container" class="w-full rounded-xl border border-gray-500 bg-white flex flex-col pb-2 gap-2">
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
                    @foreach($film->info ?? old('info') ?? [] as $key => $value)
                        <x-admin.component-info-form :key="$key" :value="$value"/>
                    @endforeach
                    <template id="info-template">
                        <x-admin.component-info-form :key="0" :value="0"/>
                    </template>
                </div>
                @foreach($errors->get('info') as $error)
                    <p class="text-sm text-red-500 mt-1">
                        {{ $error }}
                    </p>
                @endforeach
            </div>
            @if(!isset($film))
                <div class="mx-3">
                    <p class="ml-3 font-semibold">
                        Programmazione
                    </p>
                    <div class="w-full rounded-xl border border-gray-500 bg-white flex flex-col gap-2">
                        <div class="bg-admin-gray border-b border-gray-300 py-2 rounded-t-xl">
                            <div class="flex flex-row flex-wrap justify-center items-end gap-2 px-2 mb-2">
                                <div>
                                    <label for="date" class="block mb-0.5">
                                        Data
                                    </label>
                                    <input type="date" name="" id="date" class="rounded-lg w-full border-gray-300">
                                </div>
                                <div>
                                    <label for="time" class="block mb-0.5">
                                        Orario
                                    </label>
                                    <input type="time" name="" id="time" class="rounded-lg w-full border-gray-300">
                                </div>
                                <div class="w-max border border-gray-300 bg-white rounded-full px-2">
                                    <button onclick="addEvent(this.parentNode.parentNode)" type="button" class="py-1 flex flex-row justify-center items-center gap-x-2">
                                        <span class="text-sm font-semibold">Aggiungi</span>
                                        <img src="{{ asset('cms/images/plus.png') }}" alt="icon add" class="h-7">
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="events-container" class="w-full flex flex-row flex-wrap justify-center items-center gap-1.5 pb-2">
                            @foreach(old('events') ?? [] as $event)
                                <x-admin.component-event-form :event="$event" :i="$loop->index" />
                            @endforeach
                            <template id="date-time-template">
                                <x-admin.component-event-form :i="0" />
                            </template>
                        </div>
                    </div>
                    @foreach($errors->get('events') as $error)
                        <p class="text-sm text-red-500 mt-1">
                            {{ $error }}
                        </p>
                    @endforeach
                </div>
            @endif
            <div class="flex flex-row-reverse mt-4 mx-4">
                <div class="bg-yellow-300 border border-black text-2xl rounded-full w-max hover:shadow-md">
                    <button type="submit" class="px-9 py-2">{{ isset($film) ? 'Fine' : 'Avanti' }}</button>
                </div>
            </div>
        </div>
    </form>
</x-layouts.admin>
