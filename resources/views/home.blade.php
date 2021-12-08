<x-layouts.app :title="$title">
    <main class="mt-2 max-w-screen-md mx-auto rounded-4xl bg-3down text-center py-6 shadow-lg-center-black border border-black relative">

        <div class="space-y-6">
            @if (isset($days))
                @foreach ($days as $date => $day)
                    <section class="">
                        <h2 class="text-4xl text-a-yellow text-shadow-sm-yellow">{{ $day[0]->date_readable }}</h2>
                        <div class="flex flex-row flex-wrap justify-center items-start pt-5 pb-4 space-x-1.5 md:space-x-4 gap-y-2">
                            @foreach($day as $event)
                                <x-event-card :event="$event" />
                            @endforeach
                        </div>
                        @if (!$loop->last)
                            @if ($loop->even)
                                <div class=" h-0.5 w-6/12 bg-a-blue mx-auto rounded-full shadow-a-blue-light-sward"></div>
                            @else
                                <div class=" h-0.5 w-6/12 bg-a-red mx-auto rounded-full shadow-a-red-light-sward"></div>
                            @endif
                        @endif
                    </section>
                @endforeach
            @else
                <h2 class="text-4xl text-a-yellow text-shadow-sm-yellow">Non ci sono eventi in programma</h2>
            @endif
        </div>
        <div class="absolute w-full h-full bg-texture top-0 opacity-10 hidden"></div>
    </main>

    <div class="mt-4 max-w-screen-md mx-auto rounded-4xl bg-3down shadow-lg-center-black border border-black">

    </div>

    <x-newsletter />
</x-layouts.app>

