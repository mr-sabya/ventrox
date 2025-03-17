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
                @if(count($selectedItems)===0) disabled @endif
                wire:click="deleteSelected">
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
                            @checked(count($selectedItems)===count($items))>
                    </th>
                    <!-- Dynamically create table headers based on available fields -->
                    @foreach ($items->first() as $column => $value)
                    @if ($column !== 'id') <!-- Exclude 'id' column from displaying -->
                    <th wire:click="sortBy('{{ $column }}')" class="cursor-pointer">
                        {{ ucwords(str_replace('_', ' ', $column)) }}
                        @if ($sortColumn === $column)
                        <span><i class="{{ $sortDirection === 'asc' ? 'ti-angle-up' : 'ti-angle-down' }}"></i></span>
                        @endif
                    </th>
                    @endif
                    @endforeach
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                <tr>
                    <td>
                        <input type="checkbox" wire:click="toggleSelectItem({{ $item['id'] }})"
                            @checked(in_array($item['id'], $selectedItems))>
                    </td>
                    @foreach ($item as $column => $value)
                    @if ($column !== 'id')
                    <td>
                        @if ($column === $imageColumn && $value)
                        <img src="{{ $value }}" alt="Image" style="width: 50px; height: auto;">
                        @else
                        {{ $value }}
                        @endif
                    </td>
                    @endif
                    @endforeach
                    <td>
                        <!-- Loop through the additional action buttons passed to the component -->
                        @foreach ($actionButtons as $button)
                        <button wire:click="{{ $button['action'] }}({{ $item['id'] }})" class="btn {{ $button['class'] }} btn-sm">
                            <i class="{{ $button['icon'] }}"></i> {{ $button['label'] }}
                        </button>
                        @endforeach
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="{{ count($items->first()) + 1 }}" class="text-center">No items found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $items->links() }}
    </div>
</div>