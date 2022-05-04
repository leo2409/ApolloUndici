<div>
    <a href="{{ route('film.info', ['film' => $event->film->slug, 'event' => $event->id]) }}">
        <div class="relative">
            <img src="{{ asset($event->film->small_poster) }}" alt="locandina {{ $event->film->title }}" class="h-48 sm:h-64  object-cover rounded-xl border border-white shadow-sm-center-white">
            @if(isset($event->festival))
                <div class="absolute w-full bottom-4 right-0 left-0 bg-a-orange text-black text-xs whitespace-nowrap overflow-hidden font-bold py-1 px-1">
                    <h3>{{ strtoupper($event->festival->name) }}</h3>
                </div>
            @endif
            <div class="border-t border-r border-white absolute top-0 right-0 bg-3down px-2 py-1 rounded-tr-xl rounded-bl-xl flex items-center justify-center">
                <p class="text-white text-">{{ $event->time }}</p>
            </div>
        </div>
        <h2 class="w-32 sm:w-44 mx-auto">{{ $event->film->title }}</h2>
    </a>
</div>
