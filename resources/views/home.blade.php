<x-layouts.app :title="$title">
    <main class="mt-4 max-w-screen-md mx-auto rounded-4xl bg-3down text-center py-6 shadow-lg-center-black border border-black relative">
        <div class="space-y-6">
            @if (sizeof($days) > 0)
                @foreach ($days as $date => $day)
                    <section>
                        @if(sizeof($day) == 1)
                            <x-event-card-lg :event="$day[0]" :i="$loop->index"/>
                        @else
                            @if($loop->index != 0)
                                <div class=" h-0.5 w-6/12 bg-white mx-auto rounded-full shadow-a-white-lightsaber my-4"></div>
                            @endif
                            <h2 class="text-4xl text-a-blue text-shadow-sm-blue">{{ $day[0]->date_readable }}</h2>
                            <div class="flex flex-row flex-wrap justify-center items-start pt-5 pb-4 space-x-1.5 md:space-x-4 gap-y-4 ">
                                @foreach($day as $event)
                                    <x-event-card-sm :event="$event" />
                                @endforeach
                            </div>
                        @endif
                    </section>
                @endforeach
            @else
                <h2 class="text-2xl text-a-orange text-shadow-sm-orange">Non ci sono eventi in programma</h2>
            @endif
        </div>
        <div class="absolute w-full h-full bg-texture top-0 opacity-10 hidden"></div>
    </main>

    <x-soci-card />

    <!-- <x-newsletter /> -->
</x-layouts.app>

