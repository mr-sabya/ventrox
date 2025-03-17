<?php

namespace App\Livewire\Role;

use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $name, $roleId, $permissionlists = [];
    public $editRole = false;
    public $selectedPermissions = [], $selectAll = false;
    public $perPage = 10, $search, $sortColumn = 'name', $sortDirection = 'asc';



    // Select All Functionality
    public function toggleSelectAll()
    {
        if (count($this->selectedPermissions) === Permission::count()) {
            $this->selectedPermissions = [];
        } else {
            $this->selectedPermissions = Permission::pluck('id')->toArray();
        }
    }

    // Manually toggle individual permission selection
    public function togglePermission($permissionId)
    {
        
        if (in_array($permissionId, $this->permissionlists)) {
            // Remove the permission if it's already in the array
            $this->permissionlists = array_values(array_diff($this->permissionlists, [$permissionId]));
        } else {
            // Add the permission to the array
            $this->permissionlists[] = $permissionId;
        }
    }

    public function permissionSelectByGroup($name)
    {
        // Get the IDs of permissions that belong to the selected group
        $permissions = Permission::where('group', $name)->pluck('id')->toArray();

        // Check if all permissions in the group are already selected
        if (count(array_intersect($this->permissionlists, $permissions)) === count($permissions)) {
            // If all permissions in the group are selected, unselect them
            $this->permissionlists = array_values(array_diff($this->permissionlists, $permissions));
            // dd($this->permissionlists);
        } else {
            // Otherwise, add the permissions to the list
            $this->permissionlists = array_merge($this->permissionlists, $permissions);
            $this->permissionlists = array_unique($this->permissionlists);
        }

    }

    // Save or Update Role
    public function save()
    {
        dd($this->permissionlists);
        $this->validate([
            'name' => 'required|string|max:255',
            'permissions' => 'required|array',
        ]);

        $role = Role::create(['name' => $this->name]);
        $role->syncPermissions($this->permissions);

        $this->reset();
        $this->dispatch('show-toast', ['type' => 'success', 'message' => 'Role added successfully!']);
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'permissions' => 'required|array',
        ]);

        $role = Role::find($this->roleId);
        $role->update(['name' => $this->name]);
        $role->syncPermissions($this->permissions);

        $this->reset();
        $this->dispatch('show-toast', ['type' => 'success', 'message' => 'Role updated successfully!']);
    }

    public function edit($id)
    {
        $this->editRole = true;
        $role = Role::find($id);
        $this->roleId = $id;
        $this->name = $role->name;
        $this->permissionlists = $role->permissions->pluck('id')->toArray();
    }

    // Cancel editing
    public function cancelEdit()
    {
        $this->reset();
    }

    public function confirmDelete($id)
    {
        $this->roleId = $id;
        $this->dispatch('show-delete-modal');
    }

    public function deleteRole()
    {
        Role::find($this->roleId)->delete();
        $this->dispatch('show-toast', ['type' => 'success', 'message' => 'Role deleted successfully!']);
    }

    // Delete Multiple Roles
    public function deleteSelected()
    {
        if (count($this->selectedPermissions) > 0) {
            Role::whereIn('id', $this->selectedPermissions)->delete();
            $this->selectedPermissions = [];
            $this->dispatch('show-toast', ['type' => 'success', 'message' => 'Selected roles deleted successfully!']);
        } else {
            $this->dispatch('show-toast', ['type' => 'error', 'message' => 'No roles selected for deletion!']);
        }
    }

    public function sortBy($column)
    {
        if ($this->sortColumn === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortColumn = $column;
            $this->sortDirection = 'asc';
        }
    }

    public function render()
    {
        $rolesList = Role::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortColumn, $this->sortDirection)
            ->paginate($this->perPage);

        // Get permissions and group them by the 'group' field
        $permissionsGroupedByGroup = Permission::all()->groupBy('group');

        return view('livewire.role.index', compact('rolesList', 'permissionsGroupedByGroup'));
    }
}
