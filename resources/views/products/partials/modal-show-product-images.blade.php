<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-{{ $product->product_id }}"><i class="fas fa-images"></i></button>

<div class="modal fade" id="modal-{{ $product->product_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Imágenes de {{ $product->name }}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              @forelse ($product->images as $image)
                  <div class="mb-4">
                      <img src="{{ asset('storage/' . $image->image_path) }}" alt="Imagen" class="img-fluid mb-2">
                      <form action="{{ route('product-images.destroy', $image->productimage_id) }}" method="POST">
                          @method('DELETE')
                          @csrf
                          <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estas seguro/a de que quieres eliminar esta imagen?')">
                              <i class="fas fa-trash" aria-hidden="true"></i> Borrar imagen
                          </button>
                      </form>
                  </div>
              @empty
                  <p>Producto sin imágenes</p>
              @endforelse
          </div>
          <div class="modal-footer">
              <form action="{{ route('product-images.store', $product->product_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" id="images" name="images[]" class="btn btn-secondary" multiple>
                <button type="submit" class="btn btn-primary">Agregar imágen</button>
              </form>
          </div>
      </div>
  </div>
</div>
