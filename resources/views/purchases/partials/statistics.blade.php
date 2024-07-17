<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Estadísticas de Compras') }}
        </h2>
    </header>

    <div class="mt-6 space-y-6">
        <div>
            <x-input-label :value="__('Cantidad de carritos creados:')" />
            <p class="mt-1 text-lg text-gray-900">{{ $cartCount }}</p>
        </div>

        <div>
            <x-input-label :value="__('Cantidad de órdenes creadas:')" />
            <p class="mt-1 text-lg text-gray-900">{{ $orderCount }}</p>
        </div>

        <div>
            <x-input-label :value="__('Cantidad de órdenes en estado pendiente:')" />
            <p class="mt-1 text-lg text-gray-900">{{ $pendingOrderCount }}</p>
        </div>

        <div>
            <x-input-label :value="__('Cantidad de órdenes aprobadas (ventas):')" />
            <p class="mt-1 text-lg text-gray-900">{{ $approvedOrderCount }}</p>
        </div>

        <div>
            <x-input-label class="mt-5 text-lg" :value="__('Total recaudado:')" />
            <p class="mt-1 text-lg text-gray-900">${{ number_format($totalApprovedAmount, 0, ',', '.') }}</p>
        </div>
    </div>
</section>
