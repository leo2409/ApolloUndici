<div class="mx-auto">
    <a href="/rassegna/{{ $rassegna->slug }}">
        <img src="{{ asset($rassegna->medium_cover) }}" alt="copertina {{ $rassegna->name }}">
    </a>
    <h3 class="text-xl text-a-orange">{{ $rassegna->name }}</h3>
    <p>{{ $rassegna->description }}</p>
    <a href="/rassegna/{{ $rassegna->slug }}">scopri di più</a>
</div>
