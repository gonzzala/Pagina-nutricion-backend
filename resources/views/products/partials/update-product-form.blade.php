<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal-{{ $product->product_id }}"><i class="fas fa-pencil-alt"></i></button>

<div class="modal fade" id="editModal-{{ $product->product_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('products.update', $product->product_id) }}" method="POST" class="mt-6 space-y-6">
                    @csrf
                    @method('patch')
                    <div>
                        <x-input-label for="update_name" :value="__('Nombre del Producto')" />
                        <x-text-input id="update_name" name="update_name" type="text" class="mt-1 block w-full" :value="$product->name" required autofocus autocomplete="name" />
                    </div>
                    <div>
                        <x-input-label for="update_description" :value="__('Descripción')" />
                        <x-textarea id="update_description" name="update_description" rows="3" class="mt-1 block w-full" required>{{ $product->description }}</x-textarea>
                    </div>
                    <div>
                        <x-input-label for="update_preview" :value="__('Información para previsualización')" />
                        <x-textarea id="update_preview" name="update_preview" rows="3" class="mt-1 block w-full" required>{{ $product->preview }}</x-textarea>
                    </div>
                    <div>
                        <x-input-label for="update_price" :value="__('Precio')" />
                        <x-text-input id="update_price" name="update_price" type="number" step="1" class="mt-1 block w-full" :value="$product->price" required />
                    </div>
                    <div>
                        <x-input-label for="update_category_id" :value="__('Categoría')" />
                        <select id="update_category_id" name="update_category_id" class="mt-1 block w-full" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->category_id }}" {{ $category->category_id == $product->category_id ? 'selected' : '' }}>
                                    {{ $category->category }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <x-primary-button>{{ __('Actualizar producto') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
