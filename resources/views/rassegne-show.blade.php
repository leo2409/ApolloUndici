<x-layouts.app :title="$title">
    <main class="rounded-4xl bg-3down mt-4 pb-4 shadow-lg-center-black border border-black max-w-screen-md mx-auto">
        <div>
            <div class="mx-6 mb-2 mt-3 font-bold">
                <p>RASSEGNA</p>
            </div>
            <div>
                <img src="{{ asset($rassegna->medium_cover) }}" alt="copertina di {{ $rassegna->name }}" class="w-full">
            </div>
            <div class="px-3 mt-4">
                <div>
                    <h1 class="text-a-orange font-semibold text-2xl">{{ strtoupper($rassegna->name) }}</h1>
                </div>
                <div class="space-y-3 my-2">
                    {{ $rassegna->description }}
                </div>
            </div>
            <div class="px-3">
                <h2 class="text-center text-a-blue text-3xl">Prossimi Appuntamenti</h2>
                <div class="flex-row flex flex-nowrap items-start overflow-x-scroll gap-x-4 my-4 ml-2">
                    @foreach($events ?? [] as $event)
                        <div class="w-36">
                            <a href="/film/{{ $event->film->slug }}/{{ $event->id }}">
                                <div class="text-center mb-1 ">
                                    <p class="uppercase">{{ $event->carbon_date->translatedFormat('D j M') }}</p>
                                </div>
                                <div class="relative">
                                    <img src="{{ asset($event->film->small_poster) }}" alt="locandina {{ $event->film->title }}" class="h-52 object-cover rounded-xl border border-white shadow-sm-center-white">
                                    <div class="border-t border-r border-white absolute top-0 right-0 bg-3down px-2 py-1 rounded-tr-xl rounded-bl-xl flex items-center justify-center">
                                        <p class="text-white text-">{{ $event->time }}</p>
                                    </div>
                                </div>
                                <h2 class="w-36 text-center">{{ $event->film->title }}</h2>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
    <x-soci-card />
</x-layouts.app>
