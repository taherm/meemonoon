<?php

use App\Src\Permission\Permission;
use App\Src\Role\Role;
use App\Src\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntrustTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('role_user')->truncate();
//        DB::table('permission_role')->truncate();
//        DB::table('roles')->truncate();
//        DB::table('permissions')->truncate();

        $admin = new Role(); // 1
        $admin->name = 'admin';
        $admin->display_name = "administrator";
        $admin->save();

        $company = new Role(); // 2
        $company->name = 'owner';
        $company->display_name = "owner";
        $company->save();

        $branch = new Role(); // 3
        $branch->name = 'assistant';
        $branch->display_name = "assistant";
        $branch->save();

        $customer = new Role(); // 4
        $customer->name = 'customer';
        $customer->display_name = "customer";
        $customer->save();

        $userAdmin = User::whereId(1)->first();

        $userAdmin->roles()->attach($admin->id);

        $userCompany = User::whereId(2)->first();

        $userCompany->attachRole($company);

        $userBranch = User::whereId(3)->first();

        $userBranch->attachRole($branch);


        $userCustomer = User::whereId(4)->first();

        $userCustomer->attachRole($customer);


        $permissions = [
            // Modules
            'users', 'roles', 'permissions', 'companies', 'branches','products', 'currencies', 'contactus',
            'categories', 'galleries', 'slider_ads', 'side_ads', 'siders', 'conditions', 'newsletter',
            'coupons', 'faqs', 'aboutus',
            // Permissions
            'user-store', 'user-update','user-delete',
            'role-store', 'role-update', 'role-delete',
            'permission-store', 'permission-update', 'permission-delete',
            'company-store', 'company-update', 'company-delete',
            'product-store', 'product-update', 'product-delete',
            'branch-store', 'branch-update', 'branch-delete',
            'category-create', 'category-update', 'category-delete',
            'gallery-create', 'gallery-update', 'gallery-delete',
            'ad-store', 'ad-delete', 'ad-update',
            'slider-store','slider-update', 'slider-delete','sideslider-store', 'sideslider-update',
            'sideslider-delete','sidead-store','sidead-update','sidead-delete',
            'condition-update',
            'newsletter-create', 'newsletter-delete'

        ];


        foreach ($permissions as $permission) {
            $newPermission = new Permission();
            $newPermission->name = $permission;
            $newPermission->module = strpos($permission, '-') ? 0 : 1;
            $newPermission->type = strpos($permission, '-') ? 'low' : 'highest';
            $newPermission->display_name = $permission;
            $newPermission->save();
        }

    }
}
