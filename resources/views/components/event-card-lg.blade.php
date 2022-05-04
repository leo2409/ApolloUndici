<div>
    @if($i != 0)
        <div class="mt-5 h-0.5 w-10/12 bg-white mx-auto rounded-full shadow-a-white-lightsaber mb-3"></div>
    @endif
    <div class="flex flex-row justify-center gap-x-2 text-2xl">
        <h1>{{ $event->date_readable }}</h1>
        <h1>H {{ $event->time }}</h1>
    </div>
    <div>
        <h1 class="text-2xl text-a-blue uppercase text-center px-3 mt-2 font-semibold">{{ $event->film->title }}</h1>
        <p class="text-lg"><span class="text-gray-400">di </span>{{ $event->film->director }}</p>
    </div>
    <div class="grid grid-cols-2 grid-rows-5 gap-x-4 mt-2 mx-2">
        <div class="relative justify-self-center row-start-1 row-span-5">
            <a href="{{ route('film.info', ['film' => $event->film->slug, 'event' => $event->id]) }}">
                <img src="{{ asset($event->film->small_poster) }}" alt="locandina {{ $event->film->title }}" class="max-w-64 object-cover rounded-xl border border-white shadow-sm-center-white">
            </a>
            @if(isset($event->festival))
                <div class="absolute w-full bottom-7 bg-a-orange text-black py-1 px-1">
                    <h3 class="text-xs whitespace-nowrap overflow-hidden font-bold">{{ strtoupper($event->festival->name) }}</h3>
                </div>
            @endif
        </div>
        <div class="text-left row-start-1 row-span-4 overflow-y-hidden overflow-ellipsis max-h-52">
            @if(isset($event->film->tag))
                <p>{{ $event->film->tag }}</p>
            @endif
            <div class="mt-2">
                @foreach($event->info ?? [] as $key => $value)
                    <p class="text-gray-400">{{ $key }}</p>
                    <p class="text-a-orange">{{ $value }}</p>
                @endforeach
            </div>
        </div>
        <div class="mt-4 w-full">
            <a href="{{ route('film.info', ['film' => $event->film->slug, 'event' => $event->id]) }}" class="border-2 border-blue-400 text-md rounded-xl text-blue-400 py-2 px-4 font-bold sm:text-lg">Scopri di più</a>
        </div>
    </div>
</div>
