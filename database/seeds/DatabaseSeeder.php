<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(UserRoleActionSeeder::class);
        $this->call(RoleActionSeeder::class);
        $this->call(createUserRoleAction::class);
        $this->call(data_for_dtb_about::class);
        $this->call(insert_contact_data::class);
        $this->call(roleAction::class);
        $this->call(data_for_dtb_about::class);
        $this->call(insert_contact_data::class);
    }
}