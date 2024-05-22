<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Galerija') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                        <h1 class="text-3xl font-bold mb-4 ">{{__('Galerija')}}</h1>

                </div>
                        <div class="image_grid">
                            @foreach ($images as $image)

                                    <div class="container">
                                        <div class="overlay">
                                            <a href="/show/{{$image->id}}">
                                                <h3 class="text-lg font-bold">{{ $image->title }}</h3>
                                                <div class="image">
                                                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->title }}">
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                            @endforeach
                        </div>

            </div>
        </div>
    </div>


</x-app-layout>
