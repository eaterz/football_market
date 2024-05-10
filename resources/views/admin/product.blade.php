<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>

        <div class="create-task">
            <a href="/admin/product/create" class="create-button">Create</a>
        </div>
    </x-slot>
    <?php if(!$products){$products = [];} ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    <h1 class="font-bold text-2xl">{{ __('List of football boots') }}</h1>
                </div>

                <div class="product-grid">

                    <?php foreach ($products as $product): ?>

                    <a href="/admin/product/edit/{{$product->id}}">
                        <div class="product">
                            <div class="image-container">
                                <img src="{{$product->image}}" alt="boots" class="image">
                            </div>
                            <div class="text-container">
                                <h3 class="name">Name: {{$product->name}}</h3>
                                <p class="price">Price: {{$product->price}}€</p>
                                <p class="category">Category: {{$product->category}}</p>
                                <form action="/admin/product/{{$product->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button">Delete</button>
                                </form>
                            </div>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

