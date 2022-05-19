<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Creating new post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2>Creating New Post</h2>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="/admin/posts/store">
                        @csrf
                        <div>
                            <label>Title:</label>
                            <input type="text" name="title" value="{{ old('title') }}">
                        </div>
                        <div>
                            <label>URL:</label>
                            <input type="text" name="url" value="{{ old('url') }}">
                        </div>
                        <div>
                            <label>Body:</label>
                            <textarea name="body" rows="10" cols="100">{{ old('body') }}</textarea>
                        </div>
                        <button type="submit">Save new post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
