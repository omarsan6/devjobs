@props(['value'])

<label {{ $attributes->merge(['class' => 'uppercase block font-medium text-sm text-gray-500']) }}>
    {{ $value ?? $slot }}
</label>
