<?php

namespace App\Livewire\Permission;

use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $name, $group, $permissions = [];
    public $permissionId, $editPermission = false;
    public $perPage = 10, $search, $sortColumn = 'name', $sortDirection = 'asc';

    // Save or Update permission
    public function save()
    {
        $this->validate([
            'group' => 'required|string|max:255',
            'permissions.*' => 'required|string|max:255',
        ]);

        foreach ($this->permissions as $permission) {
            Permission::create([
                'name' => $permission,
                'group' => $this->group,
            ]);
        }

        $this->reset();
        $this->dispatch('show-toast', ['type' => 'success', 'message' => 'Permissions added successfully!']);
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'group' => 'required|string|max:255',
        ]);

        $permission = Permission::find($this->permissionId);
        $permission->update([
            'name' => $this->name,
            'group' => $this->group,
        ]);

        $this->reset();
        $this->dispatch('show-toast', ['type' => 'success', 'message' => 'Permission updated successfully!']);
    }

    public function edit($id)
    {
        $this->editPermission = true;
        $permission = Permission::find($id);
        $this->permissionId = $id;
        $this->name = $permission->name;
        $this->group = $permission->group;
    }

    // Method to cancel editing
    public function cancelEdit()
    {
        $this->reset();
    }

    public function confirmDelete($id)
    {
        $this->permissionId = $id;
        $this->dispatch('show-delete-modal');
    }


    public function deletePermission()
    {
        Permission::find($this->permissionId)->delete();
        $this->dispatch('show-toast', ['type' => 'success', 'message' => 'Permission deleted successfully!']);
    }

    public function addPermission()
    {
        $this->permissions[] = '';
    }

    public function removePermission($index)
    {
        unset($this->permissions[$index]);
        $this->permissions = array_values($this->permissions);  // reindex array
    }

    public function render()
    {
        $permissionsList = Permission::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortColumn, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.permission.index', compact('permissionsList'));
    }
}
