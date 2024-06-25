<section>
<x-delete-form :route="'products.destroy'" 
:id="$product->product_id" 
:message="'¿Estas seguro/a de que quieres eliminar este producto?'">
</x-delete-form>
</section>