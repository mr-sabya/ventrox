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
         if (in_array($permissionId, $this->selectedPermissions)) {
             // Remove from selected if already in array
             $this->selectedPermissions = array_diff($this->selectedPermissions, [$permissionId]);
         } else {
             // Add to selected array
             $this->selectedPermissions[] = $permissionId;
         }
     }

     
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

    // Delete Multiple Permissions
    public function deleteSelected()
    {
        if (count($this->selectedPermissions) > 0) {
            Permission::whereIn('id', $this->selectedPermissions)->delete();
            $this->selectedPermissions = [];
            $this->dispatch('show-toast', ['type' => 'success', 'message' => 'Selected permissions deleted successfully!']);
        } else {
            $this->dispatch('show-toast', ['type' => 'error', 'message' => 'No permissions selected for deletion!']);
        }
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
        $permissionsList = Permission::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortColumn, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.permission.index', compact('permissionsList'));
    }
}
