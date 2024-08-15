<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear permisos
        $permissions = [
            'create articles',
            'edit articles',
            'delete articles'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Crear roles y asignar permisos
        $adminRole = Role::create(['name' => 'admin']);
        $editorRole = Role::create(['name' => 'editor']);
        $collaboratorRole = Role::create(['name' => 'collaborator']);

        // Asignar todos los permisos al rol de administrador
        $adminRole->givePermissionTo(Permission::all());

        // Asignar permisos específicos al rol de editor
        $editorRole->givePermissionTo(['create articles', 'edit articles']);

        // Asignar permisos específicos al rol de colaborador
        $collaboratorRole->givePermissionTo(['edit articles']);

        // Asignar roles a usuarios específicos (opcional)
        $adminUser = \App\Models\User::find(2); // Cambia el ID según sea necesario
        if ($adminUser) {
            $adminUser->assignRole('admin');
        }

    }
}
