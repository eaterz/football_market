<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('image') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center items-center h-full p-6 flex-row">
                    <div>
                        <h1 class="text-center text-3xl">{{ $image->title }}</h1>
                        <div class="show-product-image mb-4">
                            <img id="image" src="{{ asset('storage/' . $image->image_path) }}" alt="" class="object-cover w-full h-full">
                        </div>
                    </div>
                    <div>
                        <div class="mb-4">
                            <label for="roi-size">Mazākais ROI izmērs:</label>
                            <input id="roi-size" type="range" min="1" max="100" value="10">
                        </div>

                        <div class="mb-4">
                            <label for="roi-threshold">ROI spilgtuma slieksnis:</label>
                            <input id="roi-threshold" type="range" min="0" max="255" value="128">
                        </div>

                        <button id="analyze-button" class="mb-4 bg-blue-500 text-white px-4 py-2 rounded">Analizēt</button>

                        <div id="summary" class="mb-4">
                            <p>Atrasto zvaigžņu skaits: <span id="stars-found">0</span></p>
                            <p>Vidējais zvaigznes izmērs pikseļos: <span id="average-size">0</span></p>
                            <p>Lielākā zvaigzne: <span id="largest-star">0</span></p>
                            <p>Mazākā zvaigzne: <span id="smallest-star">0</span></p>
                        </div>

                        <form action="/show/{{$image->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('analyze-button').addEventListener('click', function () {
            const roiSize = document.getElementById('roi-size').value;
            const roiThreshold = document.getElementById('roi-threshold').value;

            fetch(`/show/{{$image->id}}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ roi_size: roiSize, roi_threshold: roiThreshold })
            })
                .then(response => response.json())
                .then(data => {
                    if(data.status === 'success') {
                        document.getElementById('stars-found').innerText = data.data.stars_found;
                        document.getElementById('average-size').innerText = data.data.average_size;
                        document.getElementById('largest-star').innerText = data.data.largest_star;
                        document.getElementById('smallest-star').innerText = data.data.smallest_star;
                    }
                });
        });
    </script>
</x-app-layout>
