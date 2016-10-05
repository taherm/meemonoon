<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public $tables = [
        'users',
        'currencies',
        'countries',
        'products',
        'product_metas',
        'categories',
        'category_product',
        'galleries',
        'images',
        'areas',
        'orders',
        'order_metas',
        'coupons',
        'product_attributes',
        'slider_ads',
        'side_ads',
        'ratings',
        'sliders',
        'aboutus',
        'conditions',
        'contactus',
        'faqs',
        'colors',
        'sizes'
    ];
    public $tablesTesting = [
        'users', 'permissions',
        'roles', 'role_user',
        'permission_role', 'currencies',
        'countries', 'colors',
        'sizes', 'aboutus',
        'contactus'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('APP_ENV') === 'local') {

            Model::unguard();

            $this->command->info('Local Env');

            $this->emptyTables($this->tables);

            $this->call(CountriesSeeder::class);
            $this->call(CurrenciesTableSeeder::class);
            $this->call(AreasTableSeeder::class);
            $this->call(ColorsTableSeeder::class);
            $this->call(SizesTableSeeder::class);


            $this->command->info('Seeded the areas + currencies! + countries');

            $this->call(UsersTableSeeder::class);
            $this->command->info('Seeded the users!');

            $this->call(RatingsTableSeeder::class);
            $this->command->info('companies seeded');

            $this->call(CategoriesTableSeeder::class);
            $this->command->info('Seeded the productCategories!');

            $this->call(ProductsTableSeeder::class);
            $this->command->info('Seeded the products!');

            $this->call(ProductMetasTableSeeder::class);
            $this->command->info('Seeded the productMetas!');

            $this->call(ProductAttributesTableSeeder::class);
            $this->command->info('Seeded the productattributes!');

            $this->call(OrdersTableSeeder::class);
            $this->command->info('Seeded the orders!');

            $this->call(OrderMetasTableSeeder::class);
            $this->command->info('Seeded the orderMetas!');

            $this->call(SliderAdsTableSeeder::class);
            $this->command->info('Seeded the slider ads!');

            $this->call(SideAdsTableSeeder::class);
            $this->command->info('Seeded the side ads!');

            $this->call(GalleriesTableSeeder::class);
            $this->command->info('Seeded the side ads!');

            $this->call(SlidersTableSeeder::class);
            $this->command->info('Seeded the siders!');


            $this->call(ContactusTableSeeder::class);
            $this->command->info('Seeded the side contactus!');

            $this->call(AboutusTableSeeder::class);
            $this->command->info('Seeded the side aboutus!');

            $this->call(ConditionsTableSeeder::class);
            $this->command->info('Seeded the side conditions!');

            $this->call(FaqsTableSeeder::class);
            $this->command->info('Seeded the side faqs!');

            $this->call(CouponsTableSeeder::class);
            $this->command->info('coupons table seeded');

            $this->call(CategoryProductTableSeeder::class);
            $this->command->info('Seeded the side categoryProduct!');

            $this->call(TagsTableSeeder::class);
            $this->command->info('Seeded the side tags!');

            Model::reguard();


        }
//        if (env('APP_ENV') === 'local') {
//
//            Model::unguard();
//
//            $this->command->info('Local Env');
//
//            $this->emptyTables($this->tablesTesting);
//
//            $this->call(CountriesSeeder::class);
//            $this->call(CurrenciesTableSeeder::class);
//            $this->call(AreasTableSeeder::class);
//
//            $this->command->info('Seeded the areas + currencies! + countries');
//
//
//            $this->call(UsersTableSeeder::class);
//            $this->command->info('Seeded the users!');
//
//            $this->call(EntrustTableSeeder::class);
//            $this->command->info('Seeded the entrust!');
//
//            $this->call(PermissionRoleTableSeeder::class);
//            $this->command->info('Seeded the permission_role!');
//
//
//            Model::reguard();
//
//        }


    }

    public function emptyTables($tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach ($tables as $table) {

            DB::table($table)->truncate();

        }

    }
}
