    <?php

    use Illuminate\Database\Seeder;
    use App\Models\Order;

    class DatabaseSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            // Roep andere specifieke zaden aan
            $this->call(OrdersTableSeeder::class);
        }
    }
