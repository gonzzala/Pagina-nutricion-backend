<section>
<x-delete-form :route="'admins.destroy'" 
:id="$admin->id" 
:message="'¿Estás seguro de que quieres eliminar al administrador de nombre: ' . $admin->name . '?'">
</x-delete-form>
</section>