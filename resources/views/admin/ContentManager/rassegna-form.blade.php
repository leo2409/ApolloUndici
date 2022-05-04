<x-layouts.admin>
    <form action="/admin/rassegne{{ isset($rassegna->id) ? "/{$rassegna->id}" : "" }}" method="post" enctype="multipart/form-data" class="pb-5 pt-2 mt-5 bg-admin-gray space-y-4 border-t border-b border-gray-300">
        @csrf
        @if(isset($rassegna))
            @method('PUT')
        @endif
        <div class="max-w-screen-md mx-auto sm:space-y-4">
            <h1 class="text-center text-2xl">Dati Rassegna</h1>
            <div class="w-96 h-56 mx-auto mt-6">
                <img id="cover_preview" src="{{ isset($rassegna) ? asset($rassegna->medium_cover) : '' }}" alt="copertina rassegna" class="cover w-96 h-56 border border-gray-500">
            </div>
            <div class="mt-2 mx-3">
                <label for="cover" class="mb-0 5 font-semibold">Copertina</label>
                <input type="file" onchange="imagePreview(this, 'cover_preview')" name="cover" id="cover" accept="image/jpeg,image/png" tabindex="0" autofocus/>
                <p class="text-sm text-gray-700 ml-3">File png o jpeg proporzioni 16:9 dimensioni file < 8MB</p>
                @error('cover')
                <p class="text-sm text-red-500 mt-1">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="mx-3">
                <label for="name" class="ml-3 block mb-0.5 font-semibold">
                    Nome
                </label>
                <input type="text" name="name" id="name" placeholder="nome" value="{{ $rassegna->name ?? old('name') }}" class="rounded-lg w-full border-gray-500" required>
                @error('name')
                <p class="text-sm text-red-500 mt-1">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="mx-3">
                <label for="description" class="ml-3 block mb-0.5 font-semibold">
                    Descrizione
                </label>
                <textarea name="description" id="description" rows="10" class="w-full border-gray-500 rounded-xl" placeholder="descrizione..." required>{{ $rassegna->description ?? old('description') }}</textarea>
                @error('description')
                <p class="text-sm text-red-500 mt-1">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="flex flex-row-reverse mt-4 mx-4">
                <div class="bg-yellow-300 border border-black text-2xl rounded-full w-max hover:shadow-md">
                    <button type="submit" class="px-9 py-2">{{ isset($rassegna) ? 'Fine' : 'Avanti' }}</button>
                </div>
            </div>
        </div>
    </form>
</x-layouts.admin>
