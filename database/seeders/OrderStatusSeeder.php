<?php

namespace Database\Seeders;

use App\Helpers\Enums\OrderStatusesEnum;
use App\Models\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // RolesEnum::cases() === array
        $status= collect(OrderStatusesEnum::cases()); // Collection obj
        $status->each(fn($status) => OrderStatus::firstOrCreate(['name' => $status->value]));

    }
}
