<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
use App\models\User;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //Create roles:
        $employeeRole = Role::create(['name'=>'employee']);
        $companyRole  = Role::create(['name'=>'company']);
        $AdminRole = Role::create(['name'=>'admin']);
        
        
        //define permissions: (all permisssion in the app) 
        $permissions = [
            'register' , 'login' , 'logout' , 'createCv' , 'forget-password' ,  
        ];

        foreach($permissions as $permission){
            Permission::findOrCreate($permission , 'web');
        }

        //assign permisssions to roles 
        $employeeRole->givePermissionTo(['register' , 'login' , 'logout' , 'createCv']);
        $companyRole->givePermissionTo(['register' , 'login' , 'logout' , 'forget-password' ]);
        $AdminRole->givePermissionTo([ 'login' , 'logout']);
        

        //create admin account :
        $adminUser = User::create([
            'name'=>'admin',
            'email'=>'mhd654mhd653@gmail.com',
            'password'=>bcrypt('difficultpassword'),
        ]);

        //give admin rule
        $adminUser->assignRole($AdminRole);
        $permissions = $AdminRole->permissions()->pluck('name')->toArray();
        $adminUser ->givePermissionTo($permissions);

        
        
    }
}
