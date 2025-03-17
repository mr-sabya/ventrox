<div>
    <h3 class="mb-3">
        @if($editRole)
        Edit Role
        @else
        Role Management
        @endif
    </h3>

    <div class="row">
        <!-- Form Column -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    @if($editRole)
                    Edit Role
                    @else
                    Add Role
                    @endif
                </div>
                <div class="card-body">
                    @if($editRole)
                    <!-- Form for Editing Role -->
                    <input type="text" wire:model="name" class="form-control mb-2" placeholder="Role Name">
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    @else
                    <!-- Form for Adding Role -->
                    <input type="text" wire:model="name" class="form-control mb-2" placeholder="Role Name">
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    @endif

                    <div class="form-group">
                        <label class="form-label" for="permissions">Permissions</label>
                        <div class="d-flex flex-column">
                            @foreach($permissionsGroupedByGroup as $groupName => $permissions)
                            <div class="mb-3">
                                <h5><input id="{{ $groupName }}" wire:click="permissionSelectByGroup('{{ $groupName }}')" type="checkbox" class="form-check-input"> <label class="form-check-label" for="{{ $groupName }}">
                                        {{ $groupName }}
                                    </label> </h5>
                                @foreach($permissions as $permission)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input"
                                        wire:click="togglePermission({{ $permission->id }})"
                                        @checked(in_array($permission->id, $permissionlists))
                                    <label class="form-check-label" for="permission_{{ $permission->id }}">
                                        {{ $permission->name }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-2 d-flex gap-2">
                        @if ($roleId)
                        <button wire:click="update" class="btn btn-primary w-100 mb-2">Update</button>
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
                    <span>Roles List</span>
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
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Select</th>
                                    <th>Role Name</th>
                                    <th>Permissions</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rolesList as $role)
                                <tr>
                                    <td>
                                        <input type="checkbox" wire:click="togglePermission({{ $role->id }})"
                                            @checked(in_array($role->id, $selectedPermissions))>
                                    </td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @foreach($role->permissions as $permission)
                                        <span>{{ $permission->name }} </span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <button wire:click="edit({{ $role->id }})" class="btn btn-primary btn-sm">Edit</button>
                                        <button wire:click="confirmDelete({{ $role->id }})" class="btn btn-danger btn-sm">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $rolesList->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this role?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button wire:click="deleteRole" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
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