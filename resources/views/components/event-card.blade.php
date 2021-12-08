<div>
    <a href="/film/{{ $event->film->slug_title }}/{{ $event->id }}">
        <div class="relative">
            <img src="{{ asset($event->film->small_poster) }}" alt="locandina {{ $event->film->title }}" class="h-42 w-30 object-cover rounded-xl border border-white shadow-sm-center-white">
            <div class="border-t border-r border-white absolute top-0 right-0 bg-3down px-2 py-1 rounded-tr-xl rounded-bl-xl flex items-center justify-center">
                <p class="text-white text-">{{ $event->time }}</p>
            </div>
            @if(isset($event->description))
                <div class="border-b border-r border-white absolute bottom-0 right-0 bg-3down px-2 py-1 rounded-tl-xl rounded-br-xl flex items-center justify-center">
                    <img src="{{ asset('/images/yellow-star.png') }}" alt="" class="h-5">
                </div>
            @endif
        </div>
        <p class="w-30">{{ $event->film->title }}</p>
    </a>
</div>
