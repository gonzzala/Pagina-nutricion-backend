<?php

namespace App\Providers;

use App\Events\CreateCartEvent;
use App\Events\CreateOrderEvent;
use App\Events\OrderApprovedEvent;
use App\Listeners\GenerateCartItemsListener;
use App\Listeners\GenerateOrderItemsListener;
use App\Listeners\SendNutritionalPlanFormListener;
use App\Models\Cart;
use App\Models\Product;
use App\Observers\ProductObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        CreateCartEvent::class => [
            GenerateCartItemsListener::class
        ],
        CreateOrderEvent::class => [
            GenerateOrderItemsListener::class
        ],
        OrderApprovedEvent::class =>[
            SendNutritionalPlanFormListener::class
        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        Product::observe(ProductObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
