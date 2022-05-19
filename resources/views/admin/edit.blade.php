<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editing post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2>Editing Post #{{ $post->id }}</h2>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="/admin/posts/{{ $post->id }}/edit">
                        @csrf
                        <div>
                            <label>Title:</label>
                            <input type="text" name="title" value="{{ $post->title }}">
                        </div>
                        <div>
                            <label>URL:</label>
                            <input type="text" name="url" value="{{ $post->url }}">
                        </div>
                        <div>
                            <label>Body:</label>
                            <textarea name="body" rows="10" cols="100">{{ $post->body }}</textarea>
                        </div>
                        <button type="submit">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
