<div id="info-div" class="w-full px-2 bg-admin-gray border-t border-b border-gray-300 pt-1 pb-2">
    <button type="button" onclick="removeInfo(this.parentNode)" class="float-right" tabindex="-1">
        <img src="{{ asset('cms/images/cancel.png') }}" alt="close icon" class="h-5">
    </button>
    <div>
        <label for="{{ "info[{$key}]" }}" class="block mb-0.5 text-lg">
            {{ $key }}
        </label>
        <input type="text" name="{{ "info[{$key}]" }}" id="{{ "info[{$key}]" }}" value="{{ $value ?? ''}}" class="rounded-lg w-full border-gray-300" required>
    </div>
</div>
