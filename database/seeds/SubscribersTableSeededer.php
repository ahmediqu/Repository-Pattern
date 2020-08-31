<?php

use Illuminate\Database\Seeder;
use App\Subscriber;
class SubscribersTableSeededer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 100;
        factory(Subscriber::class, $count)->create();
    }
}
