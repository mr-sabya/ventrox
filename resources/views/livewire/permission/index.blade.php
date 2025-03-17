<div class="">
    <h3 class="mb-3">
        @if($editPermission)
        Edit Permission
        @else
        Permissions Management
        @endif
    </h3>

    <div class="row">
        <!-- Form Column -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    @if($editPermission)
                    Edit Permission
                    @else
                    Add Permission
                    @endif
                </div>
                <div class="card-body">
                    @if($editPermission)
                    <!-- Form for Editing Permission -->
                    <input type="text" wire:model="group" class="form-control mb-2" placeholder="Group Name">
                    @error('group') <small class="text-danger">{{ $message }}</small> @enderror

                    <input type="text" wire:model="name" class="form-control mb-2" placeholder="Permission Name">
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    @else
                    <!-- Regular form when adding permissions -->

                    <div class="form-group ">
                        <label class="form-label" for="group">Group Name</label>
                        <div class="d-flex no-block gap-2">
                            <div class="w-100">
                                <input type="text" wire:model="group" class="form-control" placeholder="Permission group">
                                @error('group') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <button type="button" wire:click="addPermission" class="btn btn-info btn-sm w-50"><i class="ti-plus"></i> Permission</button>
                        </div>
                    </div>

                    <div>
                        @foreach($permissions as $index => $permission)
                        <div class="form-group d-flex gap-2">
                            <input type="text" wire:model="permissions.{{ $index }}" class="form-control" placeholder="Permission Name">
                            <button type="button" wire:click="removePermission({{ $index }})" class="btn btn-danger btn-sm ml-2"><i class="ti-close"></i></button>
                        </div>
                        @endforeach
                        @error('permissions.*') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    @endif

                    <div class="mt-2 d-flex gap-2">
                        @if ($permissionId)
                        <button wire:click="updatePermission" class="btn btn-primary w-100 mb-2">Update</button>
                        <button wire:click="cancelEdit" class="btn btn-secondary w-100 mb-2">Cancel</button>
                        @else
                        <button wire:click="save" class="btn btn-success w-100 mb-2">Add</button>
                        <button wire:click="cancelEdit" class="btn btn-secondary w-100 mb-2">Cancel</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Column -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <span>Permissions List</span>

                </div>
                <div class="card-body">
                    <div class="row mb-3">

                        <div class="col-lg-6 mb-2">
                            <select wire:model="perPage" class="form-control form-select w-auto d-inline-block ml-2">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                            </select>
                            <span>per page</span>
                        </div>
                        <div class="col-lg-6 d-flex gap-2">
                            <input type="text" wire:model.debounce.300ms="search" class="form-control mb-2" placeholder="Search">
                            <button type="button" class="btn btn-danger w-50 mb-2"
                                @if(count($selectedPermissions)===0) disabled @endif
                                data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                                <i class="ti-trash"></i> Delete Selected
                            </button>

                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="width: 10px;">
                                        <input type="checkbox" wire:click="toggleSelectAll"
                                            @checked(count($this->selectedPermissions) === count($permissionsList))>
                                    </th>
                                    <th class="cursor-pointer" wire:click="sortBy('name')">
                                        Permission Name
                                        @if($sortColumn === 'name')
                                        <span> <i class="{{ $sortDirection === 'asc' ? 'ti-angle-up' : 'ti-angle-down' }}"></i></span>
                                        @endif
                                    </th>
                                    <th>Group Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($permissionsList as $permission)
                                <tr>
                                    <td>
                                        <input type="checkbox" wire:click="togglePermission({{ $permission->id }})"
                                            @checked(in_array($permission->id, $selectedPermissions))>
                                    </td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->group }}</td>
                                    <td>
                                        <button wire:click="edit({{ $permission->id }})" class="btn btn-primary btn-sm"><i class="ti-pencil"></i> </button>
                                        <button wire:click="confirmDelete({{ $permission->id }})" class="btn btn-danger btn-sm"><i class="ti-trash"></i> </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="2" class="text-center">No Permissions Found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        {{ $permissionsList->links() }}
                    </div>
                </div>

                
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this permission?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button wire:click="deletePermission" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Delete Confirmation Modal -->
    <div wire:ignore.self class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete the selected permissions?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button wire:click="deleteSelected" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Toaster -->
    <script>
        window.addEventListener('show-toast', event => {
            toastr[event.detail.type](event.detail.message);
        });
    </script>
</div>