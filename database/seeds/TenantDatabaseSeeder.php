<?php
use App\Plataforma;
use App\Permission;
use App\CartaoBanco;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class TenantDatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->addBanco();
        $this->addPlataforma();
        $this->addRolesAndPermissions();
        $permissions = Permission::defaultPermissions();
        foreach ($permissions as $perms)
    {
            Permission::firstOrCreate(['name' => $perms]);
    }

            $this->command->info('Default Permissions added.');

            // Confirm roles needed
            if ($this->command->confirm('Create Roles for user, default is admin and user? [y|N]', true)) {

            // Ask for roles from input
            $input_roles = $this->command->ask('Enter roles in comma separate format.', 'Admin,User');

            // Explode roles
            $roles_array = explode(',', $input_roles);

            // add roles
            foreach($roles_array as $role) {
                $role = Role::firstOrCreate(['name' => trim($role)]);

                if( $role->name == 'admin' ) {
                    // assign all permissions
                    $role->syncPermissions(Permission::all());
                    $this->command->info('Admin granted all the permissions');
                } else {
                    // for others by default only read access
                    $role->syncPermissions(Permission::where('name', 'LIKE', 'view_%')->get());
                }

                // create one user for each role
            }

            $this->command->info('Roles ' . $input_roles . ' added successfully');

        } else {
            Role::firstOrCreate(['name' => 'User']);
            $this->command->info('Added only default user role.');
        }

        // // now lets seed some posts for demo
        // factory(\App\Post::class, 30)->create();
        // $this->command->info('Some Posts data seeded.');
        // $this->command->warn('All done :)');
        DB::table('cartao_ciclo')->insert([
            ['ciclo' =>'7.00'],
            ['ciclo' =>'10.00'],
            ['ciclo' =>'15.00'],
            ['ciclo' =>'20.00'],
            ['ciclo' =>'30.00'],
            ['ciclo' =>'50.00'],
            ['ciclo' =>'75.00'],
            ['ciclo' =>'80.00'],
            ['ciclo' =>'100.00'],
            ['ciclo' =>'150.00'],
            ['ciclo' =>'160.00'],
            ['ciclo' =>'250.00'],
            ['ciclo' =>'400.00'],
            ['ciclo' =>'600.00'],
            ['ciclo' =>'800.00'],
            ['ciclo' =>'1250.00'],
            ['ciclo' =>'1600.00'],
            ['ciclo' =>'2000.00'],
            ['ciclo' =>'2400.00'],
            ['ciclo' =>'3000.00'],
        ]);
    }

    private function addRolesAndPermissions()
    {
        // create permissions for an admin
        $adminPermissions = collect(['create user', 'edit user', 'delete user'])->map(function ($name) {
            return Permission::create(['name' => $name]);
        });
        // add admin role
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo($adminPermissions);

        // add a default user role
        Role::create(['name' => 'user']);

        Role::create(['name' => 'suporte']);

        Role::create(['name'=> 'trafego']);
        Role::create(['name'=> 'Super Admin']);
    }

    private function addPlataforma()
    {
        Plataforma::create(['name' => 'Monetizze']);
        Plataforma::create(['name' => 'Perfect Pay']);
        Plataforma::create(['name' => 'Braip']);
    }

    private function addBanco()
    {
        CartaoBanco::create(['nome' => 'PagCorp']);
        CartaoBanco::create(['nome' => 'PayPal']);
        CartaoBanco::create(['nome' => 'NuBank']);
    }
}