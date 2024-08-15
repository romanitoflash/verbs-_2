<div>
    <h1>Gestionar Roles y Permisos</h1>

    <div>
        <input type="text" wire:model="roleName" placeholder="Nombre del rol">
        <div>
            <h4>Permisos:</h4>
            @foreach ($permissions as $permission)
                <label>
                    <input type="checkbox" wire:model="selectedPermissions" value="{{ $permission->name }}">
                    {{ $permission->name }}
                </label>
            @endforeach
        </div>
        <button wire:click="createRole">Crear Rol</button>
    </div>

    <ul>
        @foreach ($roles as $role)
            <li>{{ $role->name }}</li>
        @endforeach
    </ul>

    <div>
        <input type="text" wire:model="permissionName" placeholder="Nombre del permiso">
        <button wire:click="createPermission">Crear Permiso</button>
    </div>

    <ul>
        @foreach ($permissions as $permission)
            <li>{{ $permission->name }}</li>
        @endforeach
    </ul>
</div>
