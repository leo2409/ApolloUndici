<x-layouts.admin>
    <div class="pb-5 pt-2 mt-5 bg-admin-gray space-y-4 border-t border-b border-gray-300">
        <h1 class="text-center text-2xl">Programmazione per {{$film->title}}</h1>
        <div class="mx-3">
            <div class="w-full rounded-xl border border-gray-500 bg-white flex flex-col gap-2">
                <div class="bg-admin-gray border-b border-gray-300 py-2 rounded-t-xl">
                    <form id="form-event-add" action="/admin/film/{{ $film->id }}/events" method="post" class="flex flex-row flex-wrap justify-center items-end gap-2 px-2 mb-2">
                        @csrf
                        <div>
                            <label for="date" class="block mb-0.5">
                                Data
                            </label>
                            <input type="date" name="date" id="date" class="flex-1 rounded-lg w-max border-gray-300" required>
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
                            <input type="time" name="time" id="time" class="rounded-lg w-max border-gray-300" required>
                            @error('time')
                            <p class="text-sm text-red-500 mt-1">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="w-max border border-gray-300 bg-white rounded-full px-2">
                            <button form="form-event-add" type="submit" class="py-1 flex flex-row justify-center items-center gap-x-2">
                                <span class="text-sm font-semibold">Aggiungi</span>
                                <img src="{{ asset('cms/images/plus.png') }}" alt="icon add" class="h-7">
                            </button>
                        </div>
                    </form>
                </div>
                <div id="events-container" class="w-full flex flex-row flex-wrap justify-center items-center gap-1.5 pb-2">
                    @foreach($events as $event)
                        <div class="border rounded-lg border-gray-300">
                            <form id="form-event-edit" action="/admin/film/{{ $film->id }}/events/{{ $event->id }}/modifica" method="get">
                                <button type="submit" form="form-event-edit" onclick="event_modal_form()" class="block px-1 py-0.5 text-center">
                                    <span class="font-semibold block">{{ $event->carbon_date->translatedFormat('j M') }}</span>
                                    <span class="block">{{ $event->time }}</span>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="flex flex-row-reverse mt-4 mx-4">
            <div class="bg-yellow-300 border border-black text-2xl rounded-full w-max">
                <a href="/admin/film" class="px-9 py-2">Fine</a>
            </div>
        </div>
    </div>
</x-layouts.admin>
