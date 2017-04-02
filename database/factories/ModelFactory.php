<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use App\Src\Product\Color;
use App\Src\Product\Size;
use Conner\Tagging\Model\Tag;
use Illuminate\Support\Facades\DB;
use App\Src\User\User;
use App\Src\Order\Order;
use App\Src\Country\Country;
use App\Src\Category\Category;
use App\Src\Product\Product;
use App\Src\Gallery\Gallery;


$factory->define('App\Src\User\User', function (Faker\Generator $faker) {
    return [
        'username' => $faker->name,
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'email' => $faker->freeEmail,
        'address' => $faker->address,
        'address2' => $faker->address,
        'apartment' => $faker->randomDigit,
        'floor' => $faker->randomDigit,
        'building' => $faker->randomDigit,
        'street' => $faker->randomDigit,
        'block' => $faker->randomDigit,
        'area' => $faker->word,
        'city' => $faker->city,
        'zip' => $faker->postcode,
        'mobile' => $faker->phoneNumber,
        'phone' => $faker->phoneNumber,
        'password' => bcrypt('password'),
        'country_id' => Country::has('currency')->get()->random()->id,
        'active' => 1,
        'avatar' => $faker->imageUrl(100, 100),
        'remember_token' => str_random(10),
        'api_token' => str_random(50),
    ];
});

$factory->define('App\Src\Country\Area', function (Faker\Generator $faker) {
    return [
        'country_id' => Country::has('currency')->get()->random()->id,
        'name_ar' => $faker->city,
        'name_en' => $faker->city
    ];
});

$factory->define('App\Src\Country\Country', function (Faker\Generator $faker) {
    $country = $faker->country;
    return [
        'name_ar' => $country,
        'name_en' => $country
    ];
});

$factory->define('App\Src\Currency\Currency', function (Faker\Generator $faker) {
    return [
        'title' => $faker->currencyCode,
        'title_en' => $faker->currencyCode,
        'title_ar' => $faker->currencyCode,
        'name_ar' => $faker->currencyCode,
        'name_en' => $faker->currencyCode,
        'country_id' => Country::all()->random()->id
    ];
});

//$factory->define('RoleUserTableSeeder', function (Faker\Generator $faker) {
//
//    for ($i = 1; $i <= 50; $i++) {
//
//        DB::table('role_user')->insert([
//            'user_id' => $i, 'role_id' => $faker->numberBetween(1, 3)
//        ]);
//    }
//
//});

//$factory->define('App\Src\Company\Company', function (Faker\Generator $faker) {
//    return [
//        // is the owner
//        'user_id' => User::all()->random()->id,
//        'active' => 1
//    ];
//});
//
//$factory->define('App\Src\Company\CompanyMeta', function (Faker\Generator $faker) {
//    return [
//        'company_id' => $faker->numberBetween(1, 30),
//        'country_id' => Currency::all()->random()->country_id,
//        'area_id' => function (array $branchMeta) {
//            return factory(Area::class, 1)->create(['country_id' => $branchMeta['country_id']])->id;
//        },
//        'accept_payment' => $faker->numberBetween(0, 1),
//        'name_ar' => $faker->paragraph(1),
//        'name_en' => $faker->paragraph(1),
//        'description_en' => $faker->paragraph(1),
//        'description_ar' => $faker->paragraph(1),
//        'address_en' => $faker->address,
//        'address_ar' => $faker->address,
//        'notes_en' => $faker->paragraph(1),
//        'notes_ar' => $faker->paragraph(1),
//        'avatar' => $faker->imageUrl('100', '100'),
//        'mobile' => $faker->phoneNumber,
//        'phone_one' => $faker->phoneNumber,
//        'phone_two' => $faker->phoneNumber,
//        'fax' => $faker->phoneNumber,
//        'post_code' => $faker->postcode,
//        'image' => $faker->imageUrl('300', '450'),
//        'lat' => $faker->latitude,
//        'lng' => $faker->longitude
//    ];
//});

//$factory->define('App\Src\Branch\Branch', function (Faker\Generator $faker) {
//    return [
//        'company_id' => 1,
//        // is the assistant of the owner
//        'user_id' => User::all()->random()->id,
//        'active' => 1,
//    ];
//});
//
//$factory->define('App\Src\Branch\BranchMeta', function (Faker\Generator $faker) {
//    return [
//        'branch_id' => 1,
//        'country_id' => Country::all()->random()->id,
//        'area_id' => function (array $branchMeta) {
//            return factory(Area::class, 1)->create(['country_id' => $branchMeta['country_id']])->id;
//        },
//        'name_ar' => $faker->name,
//        'name_en' => $faker->name,
//        'description_en' => $faker->paragraph(1),
//        'description_ar' => $faker->paragraph(1),
//        'address_ar' => $faker->address,
//        'address_en' => $faker->address,
//        'notes_ar' => $faker->sentence(1),
//        'notes_en' => $faker->sentence(1),
//        'avatar' => $faker->imageUrl('100', '100'),
//        'mobile' => $faker->phoneNumber,
//        'phone_one' => $faker->phoneNumber,
//        'phone_two' => $faker->phoneNumber,
//        'fax' => $faker->phoneNumber,
//        'post_code' => $faker->postcode,
//        'image' => $faker->imageUrl('300', '450'),
//        'lat' => $faker->latitude,
//        'lng' => $faker->longitude,
//        'whrs_start' => $faker->time('H:i:s'),
//        'whrs_end' => $faker->time('H:i:s')
//    ];
//});

$factory->define('App\Src\Product\Product', function (Faker\Generator $faker) {

    return [
        'sku' => $faker->shuffleString('SERFDfsdTRETWNVNCVXCVlfjdlsjeowripi2349028340knmzxcsdSEKJLJ'),
        'active' => 1,
        'name_ar' => $faker->name,
        'name_en' => $faker->name,
        'created_at' => $faker->dateTimeThisYear
    ];

});

$factory->define('App\Src\Product\ProductMeta', function (Faker\Generator $faker) {
    return [
        'product_id' => Product::withoutGlobalScopes()->whereDoesntHave('product_meta')->pluck('id')->shuffle()->first(),
        'home_delivery_availability' => $faker->randomElement([0, 1]),
        'shipment_availability' => $faker->randomElement([0, 1]),
        'on_sale' => $faker->randomElement([0, 1]),
        'on_sale_on_homepage' => $faker->randomElement([0, 1]),
        'on_homepage' => $faker->randomElement([0, 1]),
        'type' => $faker->randomElement(['product']),
        'weight' => $faker->randomFloat(0.1, 2),
        'price' => $faker->randomFloat(3, 10, 200),
        'sale_price' => $faker->randomFloat(3, 10, 200),
        'description_en' => $faker->paragraph(1),
        'description_ar' => $faker->paragraph(1),
        'notes_ar' => $faker->sentence(1),
        'notes_en' => $faker->sentence(1),
        'start_sale' => $faker->dateTimeThisYear,
        'end_sale' => $faker->dateTimeThisYear,
        'image' => $faker->imageUrl('250', '300'),
        'size_chart_image' => $faker->imageUrl('250', '300')
    ];

});


$factory->define(Color::class, function (Faker\Generator $faker) {
    return [
        'name_en' => $faker->unique()->randomElement(['red', 'white', 'orange', 'green', 'none']),
        'name_ar' => function ($array) {
            return $array['name_en'];
        },
        'code' => $faker->hexColor
    ];
});

$factory->define(Size::class, function (Faker\Generator $faker) {
    return [
        'name_en' => $faker->unique()->randomElement(['small', 'x-small', 'xx-small', 'large', 'x-large', 'xx-large', 'xxx-large', 'medium', 'none']),
        'name_ar' => function ($array) {
            return $array['name_en'];
        }
    ];
});

$factory->define('App\Src\Product\ProductAttribute', function (Faker\Generator $faker) {
    return [
        'product_id' => Product::withoutGlobalScopes()->has('product_meta')->whereDoesntHave('product_attributes')->pluck('id')->unique()->shuffle()->first(),
        'size_id' => Size::all()->random()->id,
        'color_id' => Color::all()->random()->id,
        'qty' => $faker->numberBetween(1, 50),
        'notes_ar' => $faker->paragraph(1),
        'notes_en' => $faker->paragraph(1),
    ];

});


$factory->define('App\Src\Category\Category', function (Faker\Generator $faker) {

    return [
        'name_ar' => $faker->name,
        'name_en' => $faker->name,
        'description_en' => $faker->paragraph(1),
        'description_ar' => $faker->paragraph(1),
        'image' => $faker->imageUrl('200', '200'),
        'limited' => $faker->numberBetween(0, 1),
        'parent_id' => Category::where('parent_id', 0)->pluck('id')->shuffle()->first(),
    ];
});


$factory->define('App\Src\Order\Order', function (Faker\Generator $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'status' => $faker->randomElement(['pending', 'failed', 'success', 'completed']),
        'coupon_id' => $faker->shuffleString('23kjkjerwe'),
        'country_id' => Country::has('currency')->get()->random()->id,
        'coupon_value' => $faker->randomFloat(2, 1, 10),
        'amount' => $faker->numberBetween(100, 500),
        'shipping_cost' => $faker->numberBetween(2, 15),
        'sale_amount' => $faker->numberBetween(100, 500),
        'net_amount' => $faker->numberBetween(100, 500),
        'payment_method' => $faker->randomElement(['cash', 'my_fatoorah']),
        'address' => $faker->address,
        'address' => $faker->email,
        'created_at' => $faker->dateTimeThisYear
    ];
});

$factory->define('App\Src\Order\OrderMeta', function (Faker\Generator $faker) {
    //dd(Order::doesntHave('order_metas')->pluck('id')->shuffle()->first());
    return [
        'order_id' => Order::whereDoesntHave('order_metas')->pluck('id')->shuffle()->first(),
        // product_id of an order
        'product_id' => Product::withoutGlobalScopes()->get()->random()->id,
        'quantity' => $faker->numberBetween(1, 10),
        'product_type' => 'product',
        'product_attribute_id' => $faker->numberBetween(1, 100),
        'price' => $faker->numberBetween(40, 80),
        'sale_price' => $faker->numberBetween(40, 80)
    ];

});


$factory->define('App\Src\Ad\Ad', function (Faker\Generator $faker) {

    return [

        'image_path' => $faker->imageUrl(400, 100),
        'url' => $faker->url,
        'caption_en' => $faker->paragraph(),
        'caption_ar' => $faker->paragraph(),
        'order' => $faker->numberBetween(1, 5),
    ];

});

$factory->define('App\Src\Gallery\Gallery', function (Faker\Generator $faker) {
    return [
        'galleryable_id' => Product::withoutGlobalScopes()->whereDoesntHave('gallery')->pluck('id')->unique()->shuffle()->first(),
        'galleryable_type' => $faker->randomElement(['App\Src\Product\Product']),
        'description_ar' => $faker->paragraph(2),
        'description_en' => $faker->paragraph(2),
    ];
});

$factory->define('App\Src\Gallery\Image', function (Faker\Generator $faker) {
    return [
        'gallery_id' => Gallery::all()->random()->id,
        'thumb_url' => $faker->imageUrl(200, 100),
        'medium_url' => $faker->imageUrl(400, 250),
        'large_url' => $faker->imageUrl(800, 600),
        'caption_en' => $faker->paragraph(),
        'caption_ar' => $faker->paragraph(),
    ];

});

$factory->define('App\Src\Rating\Rating', function (Faker\Generator $faker) {

    return [
        'value' => $faker->numberBetween(1, 5),
        'ratingable_id' => $faker->numberBetween(1, 20),
        'ratingable_type' => $faker->randomElement(['App\Src\Product\Product', 'App\Src\Company\Company', 'App\Src\Branch\Branch']),
    ];

});


$factory->define('CategoryProductTableSeeder', function (Faker\Generator $faker) {

    for ($i = 0; $i <= 50; $i++) {
        // parent category
        DB::table('category_product')->insert([
            'category_id' => Category::where('parent_id', '=', 0)->get()->random()->id,
            'product_id' => Product::withoutGlobalScopes()->doesntHave('parent')->first()->id,
        ]);
    }
    // sub category
    for ($i = 0; $i <= 50; $i++) {
        DB::table('category_product')->insert([
            'category_id' => Category::where('parent_id', '!=', 0)->get()->random()->id,
            'product_id' => Product::withoutGlobalScopes()->has('parent')->get()->random()->id
        ]);
    }
    dd('Done ...');
    return [];
});

$factory->define('App\Src\Slider\Slider', function (Faker\Generator $faker) {
    return [
        'image_path' => $faker->imageUrl('550', '800'),
        'url' => $faker->url,
        'caption_en' => $faker->paragraph(1),
        'caption_ar' => $faker->paragraph(1),
        'active' => $faker->randomElement([0, 1]),
        'order' => $faker->randomElement(range(1, 10)),
    ];

});


$factory->define('App\Src\User\Contactus', function (Faker\Generator $faker) {
    return [
        'company_ar' => $faker->company,
        'company_en' => $faker->company,
        'address_ar' => $faker->address,
        'address_en' => $faker->address,
        'mobile' => $faker->phoneNumber,
        'phone' => $faker->phoneNumber,
        'country_ar' => $faker->word,
        'country_en' => $faker->word,
        'zipcode' => $faker->postcode,
        'email' => $faker->companyEmail,
        'youtube' => $faker->url,
        'instagram' => $faker->word,
        'twitter' => $faker->word,
    ];

});

$factory->define('App\Src\User\Condition', function (Faker\Generator $faker) {
    return [
        'title_ar' => $faker->sentence(1),
        'title_en' => $faker->sentence(1),
        'body_en' => $faker->paragraph(5),
        'body_ar' => $faker->paragraph(5),
    ];

});

$factory->define('App\Src\User\Aboutus', function (Faker\Generator $faker) {
    return [
        'title_ar' => $faker->sentence(1),
        'title_en' => $faker->sentence(1),
        'body_en' => $faker->paragraph(5),
        'body_ar' => $faker->paragraph(5),
    ];
});

$factory->define('App\Src\User\Faq', function (Faker\Generator $faker) {
    return [
        'title_ar' => $faker->sentence(1),
        'title_en' => $faker->sentence(1),
        'body_en' => $faker->paragraph(5),
        'body_ar' => $faker->paragraph(5),
    ];
});


$factory->define(Tag::class, function (Faker\Generator $faker) {

    DB::table('tagging_tags')->insert([
        'slug' => $faker->word,
        'name' => $faker->word
    ]);


    DB::table('tagging_tagged')->insert([
        'taggable_id' => Product::withoutGlobalScopes()->doesntHave('tagged')->pluck('id')->shuffle()->first(),
        'taggable_type' => 'App\Src\Product\Product',
        'tag_name' => Tag::all()->random()->name,
        'tag_slug' => Tag::all()->random()->name
    ]);

    return [
        'slug' => $faker->word,
        'name' => $faker->name
    ];
});


$factory->define('App\Src\Coupon\Coupon', function (Faker\Generator $faker) {
    return [
        'value' => $faker->randomFloat(2, 1, 10),
        'customer_id' => User::all()->pluck('id')->shuffle()->first(),
        'active' => $faker->boolean(),
        'is_percentage' => $faker->boolean(),
        'consumed' => $faker->randomElement([0, 1]),
        'code' => $faker->numerify('meem#####&#######noon'),
        'minimum_charge' => $faker->numberBetween(20, 300),
        'due_date' => $faker->dateTimeThisYear
    ];
});

$factory->define('App\Src\Newsletter\Newsletter', function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
    ];
});
//$factory->define('BranchProductTableSeeder', function (Faker\Generator $faker) {
//    for ($i = 1; $i <= 100; $i++) {
//        //$productId = Product::withoutGlobalScopes()->where('company_id', '=', Branch::where('id', '=', $i)->first()->company_id)->first()->id;
//        DB::table('branch_product')->insert([
//            'branch_id' => 1,
//            'product_id' => $i,
//        ]);
//    }
//    return [];
//});
