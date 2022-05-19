<x-layout>

    <x-slot:title>
        {{ $post->title }}
    </x-slot>

    <a href="{{ url('/') }}">< Back to home</a>
    <article class="h-entry">
        <h1 class="p-name">{{ $post->title }}</h1>
        <div class="e-content">
            {!! $post->body_html !!}
        </div>
        <time class="dt-published" datetime="{{ $post->created_at }}">{{ date('l jS \of F Y g:ia', strtotime($post->created_at)) }}</time>
    </article>

</x-layout>
