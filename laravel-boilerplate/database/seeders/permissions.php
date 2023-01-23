<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class permissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ["name"=>"Role View","key"=>"role_view"],["name"=>"Role Create","key"=>"role_create"],
            ["name"=>"Role Update","key"=>"role_update"],["name"=>"Role Delete","key"=>"role_delete"],
            ["name"=>"User View","key"=>"user_view"],["name"=>"User Create","key"=>"user_create"],
            ["name"=>"User Update","key"=>"user_update"],["name"=>"User Delete","key"=>"user_delete"],
            ["name"=>"Product View","key"=>"product_view"],["name"=>"Product Create","key"=>"product_create"],
            ["name"=>"Product Update","key"=>"product_update"],["name"=>"Product Delete","key"=>"product_delete"],
            ["name"=>"Customer View","key"=>"customer_view"],["name"=>"Customer Create","key"=>"customer_create"],
            ["name"=>"Customer Update","key"=>"customer_update"],["name"=>"Customer Delete","key"=>"customer_delete"]
        ];

        foreach ($permissions as $itemes) {
            $name = $itemes['name'];
            $key_name = $itemes['key'];
            Permission::create([
                'name' => $name,
                'key' => $key_name
            ]);
        }
    }
}
