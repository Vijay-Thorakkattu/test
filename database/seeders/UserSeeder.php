<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $department1Id = DB::table('department')->insertGetId([
            'name' => 'Department 1',
            'created_at' => Carbon::now(),
        
        ]);

        $department2Id = DB::table('department')->insertGetId([
            'name' => 'Department 2',
            'created_at' => Carbon::now(),
        ]);

        $department3Id = DB::table('department')->insertGetId([
            'name' => 'Department 3',
            'created_at' => Carbon::now(),
        ]);

      
        $designation1Id = DB::table('designation')->insertGetId([
            'name' => 'Designation 1',
            'created_at' => Carbon::now(),
        ]);

        $designation2Id = DB::table('designation')->insertGetId([
            'name' => 'Designation 2',
            'created_at' => Carbon::now(),
        ]);

        $designation3Id = DB::table('designation')->insertGetId([
            'name' => 'Designation 3',
            'created_at' => Carbon::now(),
        ]);

  
        DB::table('user')->insert([
            'name' => Str::random(10),
            'fk_department' => $department1Id,
            'fk_designation' => $designation1Id,
            'phone_number' => '1234567890',
            'created_at' => Carbon::now(),
        ]);

        DB::table('user')->insert([
            'name' => Str::random(10),
            'fk_department' => $department2Id,
            'fk_designation' => $designation2Id,
            'phone_number' => '0987654321',
            'created_at' => Carbon::now(),
        ]);

        DB::table('user')->insert([
            'name' => Str::random(10),
            'fk_department' => $department3Id,
            'fk_designation' => $designation3Id,
            'phone_number' => '5555555555',
            'created_at' => Carbon::now(),
        ]);
        
    }
}
