<div>
    <a href="">
        <div class="relative">
            <img src="{{ $event->film->poster }}" alt="locandina {{ $event->film->title }}" class="h-42 w-30 object-cover rounded-3xl border-1 border-white shadow-sm-center-white">
            <div class=" absolute top-0 right-0 bg-3down  px-2 py-1 rounded-tr-3xl rounded-bl-3xl flex items-center justify-center">
                <p class="text-white text-">{{ $event->time }}</p>
            </div>
        </div>
        <p class="w-30">{{ $event->film->title }}</p>
    </a>
</div>
