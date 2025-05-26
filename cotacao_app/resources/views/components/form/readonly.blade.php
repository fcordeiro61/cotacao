@props(['label', 'name', 'value' => ''])

<div class="mb-4">
    <label for="{{ $name }}" class="block text-gray-700 text-sm font-bold mb-2">
        {{ $label }}
    </label>
    <input type="text" id="{{ $name }}" name="{{ $name }}" value="{{ $value }}"
           class="bg-gray-100 text-gray-700 border border-gray-300 rounded w-full py-2 px-3 cursor-not-allowed"
           readonly>
</div>
