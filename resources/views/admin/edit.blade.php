<x-app-layout>
    <div class="py-12">


    <div class="main-container">
        <h1 class="special-h1 normal-h1"><span>Edit Product</span></h1>
        <form class="create-form" action="/admin/product" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="<?= $product->id ?>">
            @method('PATCH')
            <div class="form-field">
                <label for="name">Name</label>
                <textarea placeholder="Product name" name="name" id="name" required><?= old('name'),$product->name ?></textarea>
            </div>
            @error('name')
            <span class="text-red-500">{{ $message }}</span>
            @enderror

            <div class="form-field">
                <label for="image">Image link</label>
                <input type="url" name="image" id="image" required value="<?= old('image'),$product->image ?>">
            </div>
            @error('image')
            <span class="text-red-500">{{ $message }}</span>
            @enderror

            <div class="form-field">
                <label for="description">Description</label>
                <textarea placeholder="Product Description" name="description" id="description" required><?= old('description'), $product->description ?></textarea>
            </div>
            @error('description')
            <span class="text-red-500">{{ $message }}</span>
            @enderror

            <div class="form-field">
                <label for="SKU">SKU</label>
                <textarea placeholder="Product SKU" name="SKU" id="SKU" required><?= old('SKU'), $product->SKU ?></textarea>
            </div>
            @error('SKU')
            <span class="text-red-500">{{ $message }}</span>
            @enderror

            <div class="form-field">
                <label for="category">Category</label>
                <textarea placeholder="Product category" name="category" id="category" required><?= old('category'), $product->category ?></textarea>
            </div>
            @error('category')
            <span class="text-red-500">{{ $message }}</span>
            @enderror

            <div class="form-field">
                <label for="price">Price</label>
                <textarea placeholder="Product price" name="price" id="price" required><?= old('price'), $product->price ?></textarea>
            </div>
            @error('price')
            <span class="text-red-500">{{ $message }}</span>
            @enderror


            <div class="button-container">
                <button class="rounded-button">Edit</button>
            </div>
        </form>
    </div>
    </div>
</x-app-layout>
