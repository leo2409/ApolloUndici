<div class="max-w-screen-md mx-auto bg-3down border border-black rounded-3xl shadow-lg-center-black mt-4 text-center py-3">
    <h3 class="text-4xl text-a-blue text-shadow-sm-blue mb-2">Newsletter</h3>
    <p class="text-sm text-gray-400">Rimani aggiornato sulla nostra programmazione</p>
    <form action="{{ route('newsletter.subscribe') }}" method="GET" class="mt-5">
        <div class="mx-auto mb-4">
            <div class="flex flex-col sm:flex-row gap-x-3 gap-y-5 justify-center mx-2">
                <input required name="email" id="email" type="email" class="border border-gray-600 rounded-lg bg-up w-full px-4 py-2 placeholder-gray-400 text-white" placeholder="Inserisci la tua email">
                <input type="submit" class="py-2 px-3.5 sm:w-32 text-a-orange border-2 hover:text-shadow-sm-orange border-a-orange rounded-xl bg-down" placeholder="Iscriviti">
            </div>
            @error('email')
            <p class="mx-4 mt-2 text-left text-red-500 mt-1">
                {{ $message }}
            </p>
            @enderror
        </div>
    </form>
</div>
