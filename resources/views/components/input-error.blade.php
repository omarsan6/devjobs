@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'border-red-500 bg-red-200 font-bold uppercase p-2 mt-2 text-xs text-sm text-red-600 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
