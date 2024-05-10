<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>


    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


                <div class="show-product">
                    <div class="show-product-image">
                        <img src="{{ $product->image }}" alt="Product Image">
                    </div>
                    <div class="show-product-info">
                        <h3 class="show-product-name">{{ $product->name }}</h3>
                        <p class="show-product-price">Price: {{ $product->price }}€</p>

                        <form class="form-size" action="/cart" method="POST">
                            @csrf
                            <div class="size">
                                <div class="row">
                                    <?php foreach ($sizes as $size): ?>
                                    <label for="{{$size->id}}" class="size-label">
                                        <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}" >
                                        <input type="hidden" name="product_price" id="product_price" value="{{ $product->price }}" >
                                        <input type="radio" name="size" id="{{$size->id}}" value="{{$size->id}}">
                                        <span class="size-number">{{$size->size}}</span>
                                    </label>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <button type="submit" class="show-product-button">Add to cart</button>
                        </form>
                        <p class="show-product-description">Description: {{ $product->description }}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
