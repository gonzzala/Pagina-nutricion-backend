<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal-{{ $admin->id }}"><i class="fas fa-pencil-alt"></i></button>

<div class="modal fade" id="editModal-{{ $admin->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar administrador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admins.update', $admin->id) }}" method="POST" class="mt-6 space-y-6">
                    @csrf
                    @method('patch')

                    <div>
                        <x-input-label for="update_name" :value="__('Nombre')" />
                        <x-text-input id="update_name" name="update_name" type="text" class="mt-1 block w-full" :value="$admin->name" required autofocus autocomplete="name" />
                    </div>

                    <div>
                        <x-input-label for="update_email" :value="__('Email')" />
                        <x-text-input id="update_email" name="update_email" type="email" class="mt-1 block w-full" :value="$admin->email" required autofocus autocomplete="email" />
                    </div>

                    <div>
                        <x-input-label for="update_password" :value="__('Contraseña')" />
                        <x-text-input id="update_password" name="update_password" type="password" class="mt-1 block w-full" autofocus autocomplete="password" />
                    </div>
                    
                    <div>
                        <x-primary-button>{{ __('Actualizar administrador') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>