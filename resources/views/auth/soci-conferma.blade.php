<x-layouts.app :title="$title">
    <div class="max-w-screen-sm mx-auto rounded-4xl bg-3down py-6 shadow-lg-center-black border border-black">
        <h1 class="text-center text-3xl text-a-yellow text-shadow-sm-yellow">Domanda inviata correttamente</h1>
        <div class="mt-4 px-6">
            <p>Ti abbiamo inviato una mail all'indirizzo <b class="text-a-blue">{{ $mail }}</b> controlla che sia arrivata correttamente. Entro le prossime 24 ore ti invieremo
                la risposta.</p>
        </div>
    </div>
</x-layouts.app>
