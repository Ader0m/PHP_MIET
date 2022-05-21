<?php

namespace App\Console\Commands;

use App\Models\Boyer;
use Illuminate\Console\Command;
use App\Models\Customer;


class CustomerAdresses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'customer:count-adress {customerId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Выводим количество адрессов покупателя';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $customerId = (int)$this->argument('customerId');

            $this->info('Count adresses = ' . Boyer::withCount('adresses')->findOrFail($customerId)->adresses_count);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            $this->error("Customer with id <$customerId> not exist");
        }
    }
}
