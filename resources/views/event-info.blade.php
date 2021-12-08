<x-layouts.app :title="$title">
    <main class="rounded-4xl bg-3down py-6 px-3 shadow-lg-center-black border border-black">
        <div class="flex flex-row gap-x-3">
            <div class="w-30">
                <img src="{{ asset($film->small_poster) }}" alt="locandina {{ $film->title }}" class="h-42 w-30 object-cover rounded-xl border border-white shadow-sm-center-white">
                <div class="text-right mt-2 space-y-2">
                    @foreach($film->info ?? [] as $info)
                        <div class="text-right">
                            <p>{{ $info['tag'] }}</p>
                            <p class="text-gray-400 text-sm">{{ $info['body'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="flex-1">
                <h1 class="text-2xl text-a-yellow text-shadow-sm-yellow">{{ $film->title }}</h1>
                <p class="text-gray-400"><span class="text-a-yellow-900">{{ $event->tag ?? '' }}</span>{{ $film->tag }}</p>
                @if($event->description)
                    <h5 class="mt-2 text-lg text-a-yellow-100">{{ $event->date_readable }}:</h5>
                    <p class="text-a-yellow-50">{{ $event->description }}</p>
                @endif
                <p class="mt-2">{{ $film->synopsis }}</p>
            </div>
        </div>
        <div class="w-full mt-8">
            <h2 class="text-center text-4xl text-a-blue text-shadow-sm-blue">Giorni e orari</h2>
            <table class="mt-4 text-left">
                @foreach($other_dates as $date => $list)
                <tr class="my-2">
                    <th class="pr-4">{{ $list[0]->date_readable }}</th>
                    @foreach($list as $e)
                        <td>
                            @if($event->description)
                                <a href="{{ URL::route('film.info', ['title' => $film->slug_title, 'event' => $e->id]) }}" class="border border-a-yellow rounded-full px-1 py-1 w-14 text-a-yellow">
                                    {{ $e->time }}
                                </a>
                            @else
                                <a href="{{ URL::route('film.info', ['title' => $film->slug_title, 'event' => $e->id]) }}" class="border border-gray-300 rounded-full px-1 py-1 w-14">
                                    {{ $e->time }}
                                </a>
                            @endif
                        </td>
                    @endforeach
                </tr>
                @endforeach
            </table>
        </div>
    </main>
    <x-newsletter/>
</x-layouts.app>
