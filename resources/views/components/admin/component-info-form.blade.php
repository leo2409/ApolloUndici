<div id="info-div" class="w-full px-2 bg-admin-gray border-t border-b border-gray-300 pt-1 pb-2">
    <button type="button" onclick="this.parentNode.remove();" class="float-right" tabindex="-1">
        <img src="{{ asset('cms/images/cancel.png') }}" alt="close icon" class="h-5">
    </button>
    <div>
        <label for="{{ "info[{$i}][tag]" }}" class="block mb-0.5">
            Etichetta
        </label>
        <input type="text" name="{{ "info[{$i}][tag]" }}" id="{{ "info[{$i}][tag]" }}" value="{{ $info['tag'] ?? ''}}" class="rounded-lg w-full border-gray-300" required>
    </div>
    <div>
        <label for="body" class="block mb-0.5">
            Body
        </label>
        <input type="text" name="{{ "info[{$i}][body]" }}" id="{{ "info[{$i}][body]" }}" value="{{ $info['body'] ?? ''}}" class="rounded-lg w-full border-gray-300" required>
    </div>
</div>
