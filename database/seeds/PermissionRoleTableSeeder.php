<?php

use Illuminate\Database\Seeder;
use App\Src\Permission\Permission;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = App\Src\Role\Role::whereId(1)->with('perms')->first();
        $company = App\Src\Role\Role::whereId(2)->with('perms')->first();
        $assistant = App\Src\Role\Role::whereId(3)->with('perms')->first();

        $adminModules = Permission::where('module', '=', 1)->get();


        $companyModules = Permission::where('module', 1)->where('id', '>=', 4)->get();

        $assistantModules = Permission::where('module', 1)->where('id', '>=', 4)->get();

        $perms = Permission::where('module', '=', 0)->get();

        $admin->perms()->saveMany($adminModules);

        $company->perms()->saveMany($companyModules);

        $assistant->perms()->saveMany($assistantModules);

        $admin->perms()->saveMany($perms);

        $company->perms()->saveMany($perms);

        $assistant->perms()->attach($perms);
    }
}
