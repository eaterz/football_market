<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title">
                        </div>
                        <div>
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image">
                        </div>
                        <button type="submit">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
