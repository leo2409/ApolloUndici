<x-layouts.app :title="$title">
    <main class="rounded-4xl bg-3down pb-6 shadow-lg-center-black border border-black max-w-screen-md mx-auto mt-4">
        <div>
            <div class="my-2 flex flex-row justify-between mx-4 pt-1 items-center">
                <div class="flex flex-row gap-5 font-bold">
                    <p>{{ strtoupper($event->date_readable) }}</p>
                    <p>H {{ $event->time }}</p>
                </div>
                <div>
                    <a href="{{ $film->trailer }}" class="text-blue-400 px-1 font-bold">Trailer</a>
                </div>
            </div>
            <div class="relative">
                <img src="{{ asset($film->small_frame) }}" alt="frame di {{ $film->title }}" class="w-full">
                @if(isset($rassegna))
                    <a class="absolute bottom-6 right-0 bg-a-orange text-black px-3 py-1 text-md font-semibold" href="{{ route('rassegne.show', ['festival' => $rassegna->slug]) }}">
                        {{ strtoupper($rassegna->name) }}
                    </a>
                @endif
            </div>
            <div class="px-3 mt-4">
                <div class="pb-1">
                    <p class="font-semibold text-sm text-gray-300" >{{ $film->tag }}</p>
                    <h1 class="text-a-blue text-2xl">{{ strtoupper($film->title) }}</h1>
                    <p><span class="text-gray-400">di </span>{{ $film->director }}</p>
                </div>
                <div class="space-y-3 my-2">
                    @if(isset($event->info))
                        <hr>
                        <div>
                            @foreach($event->info ?? [] as $key => $value)
                                <div>
                                    <h6 class="text-gray-400 inline">{{ $key }}: </h6>
                                    <span class="text-a-orange">{{ $value }}</span>
                                </div>
                            @endforeach
                        </div>
                        <hr>
                    @endif
                    @if(isset($film->synopsis))
                        <div>
                            <p class="text-gray-400">{{ $film->synopsis }}</p>
                        </div>
                    @endif
                    <div class="space-y-1">
                        @foreach($film->info ?? [] as $key => $value)
                            <div>
                                <h6 class="text-gray-400 inline-block">{{ $key }}: </h6>
                                <p class="">{{ $value }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
        <div class="w-full mt-8 px-3">
            @if(sizeof($other_dates) == 0)
                <h2 class="text-center text-2xl text-a-blue text-shadow-sm-blue">Non più in programmazione</h2>
            @elseif(sizeof($other_dates) == 1 && sizeof($other_dates->first()) == 1)
                <h2 class="text-center text-2xl text-a-blue text-shadow-sm-blue">Disponibile solo in questa data</h2>
            @else
                <h2 class="text-center text-4xl text-a-blue text-shadow-sm-blue">Giorni e orari</h2>
                <table class="mt-4 text-left">
                    @foreach($other_dates as $date => $list)
                        <tr class="my-2">
                            <th class="pr-4">{{ $list[0]->date_readable }}</th>
                            @foreach($list as $e)
                                <td class="py-2">
                                    @if($event->description)
                                        <a href="{{ URL::route('film.info', ['film' => $film->slug, 'event' => $e->id]) }}" class="border border-a-yellow rounded-full px-1 py-1 w-14 text-a-yellow">
                                            {{ $e->time }}
                                        </a>
                                    @else
                                        <a href="{{ URL::route('film.info', ['film' => $film->slug, 'event' => $e->id]) }}" class="border border-gray-300 rounded-full px-1 py-1 w-14">
                                            {{ $e->time }}
                                        </a>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </main>
    <x-soci-card />
    <!-- <x-newsletter/> -->
</x-layouts.app>
