@php
    $classes = "text-xs text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500";
@endphp

<div>
    <!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
    <a {{$attributes->merge(['class' => $classes])}}>
       {{$slot}}
    </a>
</div>