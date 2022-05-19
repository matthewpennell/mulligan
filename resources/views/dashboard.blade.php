<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2>Posts</h2>
                    <p>
                        <a href="{{ url('/admin/posts/create') }}">Create new post</a>
                    </p>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Created</th>
                                <th>Edited</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ date('g:ia, l jS F Y', strtotime($post->created_at)) }}</td>
                                    <td>{{ date('g:ia, l jS F Y', strtotime($post->updated_at)) }}</td>
                                    <td><a href="{{ url('/admin/posts/' . $post->id . '/edit') }}">Edit</a> | <a href="{{ url('/admin/posts/' . $post->id . '/delete') }}">Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
