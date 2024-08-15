<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleManager extends Component
{
    public $roles;
    public $permissions;
    public $roleName;
    public $permissionName;
    public $selectedRole;
    public $selectedPermissions = [];

    public function mount()
    {
        $this->roles = Role::all();
        $this->permissions = Permission::all();
    }

    public function createRole()
    {
        $role = Role::create(['name' => $this->roleName]);
        $role->givePermissionTo($this->selectedPermissions);
        $this->roles = Role::all();
        $this->roleName = '';
        $this->selectedPermissions = [];
    }

    public function createPermission()
    {
        Permission::create(['name' => $this->permissionName]);
        $this->permissions = Permission::all();
        $this->permissionName = '';
    }

    public function render()
    {
        return view('livewire.admin.role-manager');
    }
}
