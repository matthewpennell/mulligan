<x-layout>

    <h1>matthewpennell.com</h1>

    @foreach ($posts as $post)
        <article class="h-entry">
            <h2 class="p-name"><a href="{{ url('/blog/' . $post->url) }}">{{ $post->title }}</a></h2>
            <div class="e-content">
                {!! $post->body_html !!}
            </div>
            <time class="dt-published" datetime="{{ $post->created_at }}">{{ date('l jS \of F Y g:ia', strtotime($post->created_at)) }}</time>
        </article>
    @endforeach

    @if ($pages > 1)
        <div style="margin: 1em 0;">
            Pages:
            @for ($i = 1; $i <= $pages; $i++)
                @if ($i > 1)
                    <a href="{{ url('/?page=' . $i) }}">{{ $i }}</a>
                @else
                    <a href="{{ url('/') }}">{{ $i }}</a>
                @endif
            @endfor
        </div>
    @endif

</x-layout>
