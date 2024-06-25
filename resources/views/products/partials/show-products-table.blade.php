<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Ver productos') }}
        </h2>
    </header>
        
    <div class="mt-6 space-y-6">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Preview</th>
                <th scope="col">Precio</th>
                <th scope="col">Categoria</th>
                <th scope="col">Imagenes</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
              <tr>
                <td>{{ $product->product_id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->preview }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->category->category }}</td>
                <td class="text-center">@include('products.partials.modal-show-product-images')</td>
                <td><div class="flex justify-center space-x-2"> @include('products.partials.delete-product-form') @include('products.partials.update-product-form')
                </div></td>
              </tr>
              @endforeach
            </tbody>
          </table>
      </div>
    </div>
</section>