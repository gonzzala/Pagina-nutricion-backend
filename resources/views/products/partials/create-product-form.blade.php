<section>

    <x-input-error class="mb-2" :messages="$errors->all()" />

    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Crear producto') }} 
        </h2>
    </header>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf

    <div>
        <x-input-label for="name" :value="__('Nombre del Producto')" />
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" />
    </div>

    <div>
        <x-input-label for="description" :value="__('Descripción')" />
        <x-textarea id="description" name="description" rows="3" class="mt-1 block w-full" required>{{ old('description') }}</x-textarea>
    </div>

    <div>
        <x-input-label for="preview" :value="__('Información para previsualización')" />
        <x-textarea id="preview" name="preview" rows="3" class="mt-1 block w-full" required>{{ old('preview') }}</x-textarea>
    </div>

    <div>
        <x-input-label for="price" :value="__('Precio')" />
        <x-text-input id="price" name="price" type="number" step="1" class="mt-1 block w-full" :value="old('price')" required />
    </div>

    <div>
        <x-input-label for="category_id" :value="__('Categoría')" />
        <select id="category_id" name="category_id" class="mt-1 block w-full" required>
            @foreach($categories as $category)
                <option value="{{ $category->category_id }}">{{ $category->category }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <x-input-label for="images" :value="__('Imágenes del Producto')" />
        <input type="file" id="images" name="images[]" class="mt-1 block w-full" multiple>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Crear producto') }}</x-primary-button>
    </div>

    </form>

</section>