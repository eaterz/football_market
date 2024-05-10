<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>

    </x-slot>
    <?php if(!$products){$products = [];} ?>
    <?php if(!$carts){$carts = [];} ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    <h1 class="font-bold text-2xl">{{ __('Cart') }}</h1>
                </div>

                @foreach ($carts as $cart)
                @if(auth()->user()->id == $cart['user_id'])
                <div class="cart-container">
                    @foreach ($products as $product)
                    <div class="cart-product">
                        <img src="{{$product->image}}" alt="image" class="product-image">
                        <div class="product-details">
                            <h4 class="product-name">{{$product->name}}</h4>
                            <p class="product-price">{{$product->price}}</p>
                            <form action="/cart" method="POST">
                            <input type="number" value="{{$cart->quantity}}" class="quantity-input" data-price="{{$product->quantity}}">
                            <label class="quantity-label">Quantity</label>
                            </form>

                        </div>
                        @endforeach
                    </div>
                </div>
                     @endif
                @endforeach


            </div>
        </div>
    </div>
</x-app-layout>

