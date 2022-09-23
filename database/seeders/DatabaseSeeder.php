<?php

namespace Database\Seeders;

use App\Models\Backend\Role;
use App\Models\Frontend\Vendor;
use Illuminate\Database\Seeder;
use App\Models\Backend\Shipping;
use App\Models\Backend\Siteuser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Siteuser::create([
            'name'                  =>      'Biplob Hossen',
            'role_id'               =>      '1',
            'username'              =>      'super_admin',
            'phone'                 =>      '01727475354',
            'email'                 =>      'admin@gmail.com',
            'password'              =>      Hash::make('123456'),
            'gender'                =>      'Male',
            'photo'                 =>      '',
        ]);


        Role::create([
            'name'                  =>      'Super Admin',
            'slug'                  =>      'super-admin',
            'permission'            =>      json_encode(['Dashboard','User','Product','Post','Settings','Order']),
        ]);

        Vendor::create([
            'f_name'        => 'Biplob',
            'l_name'        => 'Hossen',
            'username'      => 'biplob_hossen',
            'phone'         => '01727475354',
            'email'         => 'admin@gmail.com',
            'store_name'    => 'Biplob Store',
            'store_url'     => '/agent/biplob_hossen',
            'country'       => 'Bangladesh',
            'region'        => 'Mymenshingh',
            'zilla'         => 'Mymenshingh',
            'thana'         => 'Valuka',
            'post'          => 'Zamirdia',
            'post_code'     => '5240',
            'shop_addr'     => 'Square masterbari bazar',
            'bank'          => '01727475354',
            'password'      => Hash::make(123456),
            'status'        => true,
        ]);
        Shipping::create([
            'title'              =>      'SA Paribahan',
            'duration'           =>      '3',
            'dha_price'          =>      50,
            'bari_price'         =>      60,
            'chit_price'         =>      70,
            'khul_price'         =>      80,
            'mym_price'          =>      90,
            'raj_price'          =>      100,
            'rang_price'         =>      110,
            'syl_price'          =>      120,
        ]);





    }
}
