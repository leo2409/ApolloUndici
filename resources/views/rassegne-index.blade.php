<x-layouts.app :title="$title">
    <main class="mt-2 max-w-screen-md mx-auto rounded-4xl bg-3down text-center py-6 shadow-lg-center-black border border-black relative">
        <h1 class="text-3xl">Rassegne</h1>
        @if(isset($rassegne))
            <div class="mt-4 flex flex-col gap-4 justify-center items-start mx-auto">
                @foreach($rassegne as $rassegna)
                    <x-rassegna-card :rassegna="$rassegna" />
                @endforeach
            </div>
        @else
            <h2 class="text-4xl text-a-orange text-shadow-sm-orange">Non ci sono rassegne</h2>
        @endif

    </main>
    {{ $rassegne->links() }}
</x-layouts.app>
