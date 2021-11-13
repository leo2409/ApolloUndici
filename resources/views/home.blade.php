<x-layout>
    <main class="rounded-4xl bg-3down text-center py-6 shadow-lg-center-black border-1 border-black text-white space-y-6">

        @if (isset($days))
            @foreach ($days as $date => $day)
            <section class="">
                <h2 class="text-4xl text-a-yellow text-shadow-sm-yellow">{{ $day[0]->home }}</h2>
                <div class="flex flex-row flex-wrap justify-center items-start pt-5 pb-4 space-x-1 gap-y-2">
                    @foreach($day as $event)
                        <x-event-card :event="$event" />
                    @endforeach
                </div>
                @if (!$loop->last)
                    @if ($loop->even)
                        <div class="h-0.5 w-9/12 bg-a-blue mx-auto rounded-full shadow-a-blue-light-sward"></div>
                    @else
                        <div class="h-0.5 w-9/12 bg-a-red mx-auto rounded-full shadow-a-red-light-sward"></div>
                    @endif
                @endif
            </section>
            @endforeach
        @else
            <h2 class="text-4xl text-a-yellow text-shadow-sm-yellow">Non ci sono eventi in programma</h2>
        @endif
    </main>
    <x-newsletter />
</x-layout>

