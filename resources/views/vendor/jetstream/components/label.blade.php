@props(['value'])

<label {{ $attributes->merge(['class' => 'd-block text-start text-gray-700 pt-2']) }}>
    {{ $value ?? $slot }}
</label>
