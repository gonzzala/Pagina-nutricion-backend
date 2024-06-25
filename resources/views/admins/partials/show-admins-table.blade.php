<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Ver administradores') }}
        </h2>
    </header>
        
    <div class="mt-6 space-y-6">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($admins as $admin)
              <tr>
                <td>{{ $admin->id }}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td><div class="flex justify-center space-x-2"> @include('admins.partials.delete-admin-form')  @include('admins.partials.update-admin-form') 
                </div></td> 
              </tr>
              @endforeach
            </tbody>
          </table>
      </div>
    </div>
</section>