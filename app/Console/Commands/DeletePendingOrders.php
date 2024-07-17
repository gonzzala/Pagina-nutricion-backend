<?php

namespace App\Console\Commands;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DeletePendingOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:pending-orders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command deletes all the orders with a pending status, helping to maintain a clean database.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $date = Carbon::now()->subDays(3);

        $deleted = Order::where('status', 'pending')
                    ->where('created_at', '<', $date)
                    ->delete();

        $this->info("Deleted $deleted pending orders created more than three days ago.");
        Log::info("Deleted $deleted pending orders created more than three days ago.");
    }
}
