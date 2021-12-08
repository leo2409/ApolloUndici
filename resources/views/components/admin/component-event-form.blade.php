<div class="event-container relative border rounded-lg border-gray-300 box-content">
    <input type="hidden" name="{{ "events[{$i}][date]" }}" value="{{ $event['date'] ?? ''}}">
    <input type="hidden" name="{{ "events[{$i}][time]" }}" value="{{ $event['time'] ?? ''}}">
    <button id="delete-event-form" type="button" onclick="this.parentNode.remove();" class="delete-button hidden rounded-lg absolute bg-red-500 border border-black top-0 bottom-0 w-full" tabindex="-1">
        <img src="{{ asset('cms/images/cancel.png') }}" alt="close icon" class="h-8 mx-auto">
    </button>
    <button id="event-button" type="button" onclick="viewDeleteButton(this.parentNode);" class="event-button rounded-lg block px-1 py-0.5 text-center">
        <span class="font-semibold block">{{ $event['date'] ?? ''}}</span>
        <span class="block">{{ $event['time'] ?? ''}}</span>
    </button>
</div>
