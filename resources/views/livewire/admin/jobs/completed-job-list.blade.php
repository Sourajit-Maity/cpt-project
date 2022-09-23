<x-admin.table>
    
    <x-slot name="perPage">
        <label>Show
            <x-admin.dropdown wire:model="perPage" class="custom-select custom-select-sm form-control form-control-sm">
                @foreach ($perPageList as $page)
                    <x-admin.dropdown-item :value="$page['value']" :text="$page['text']" />
                @endforeach
            </x-admin.dropdown> entries
        </label>
    </x-slot>

    <x-slot name="thead">
        <tr role="row">
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 15%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Nurse Name <i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('first_name')"></i>
            </th>
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 15%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Hospial Name <i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('first_name')"></i>
            </th>
            
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 15%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Location <i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('hospital_location')"></i>
            </th>
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 15%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Date <i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('job_post_date')"></i>
            </th>

            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 10%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Total Amount <i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('total_amount')"></i>
            </th>
            
            <!-- <th class="align-center" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 20%;"
                aria-label="Status: activate to sort column ascending">Status</th> -->

            <th class="align-center" rowspan="1" colspan="1" style="width: 20%;" aria-label="Actions">Actions</th>
        </tr>

        <tr class="filter">
            <th>
                <x-admin.input type="search" wire:model.defer="searchNurse" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>

            <th>
                <x-admin.input type="search" wire:model.defer="searchHospital" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <th>
                <x-admin.input type="search" wire:model.defer="searchLocation" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <th>
                <x-admin.input type="search" wire:model.defer="searchDate" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <th>
                <x-admin.input type="search" wire:model.defer="searchAmount" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <!-- <th>
                <select class="form-control form-control-sm form-filter kt-input" wire:model.defer="searchStatus"
                    title="Select" data-col-index="2">
                    <option value="-1">Select One</option>
                    <option value="1">Active</option>
                    <option value="0">Deactive</option>
                </select>
            </th> -->
            <th>
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-brand kt-btn btn-sm kt-btn--icon" wire:click="search">
                            <span>
                                <i class="la la-search"></i>
                                <span>Search</span>
                            </span>
                        </button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-secondary kt-btn btn-sm kt-btn--icon" wire:click="resetSearch">
                            <span>
                                <i class="la la-close"></i>
                                <span>Reset</span>
                            </span>
                        </button>
                    </div>
                </div>
            </th>
        </tr>
    </x-slot>

    <x-slot name="tbody">
        @forelse($details as $item)
            <tr role="row" class="odd">
                @if (isset($item->nurse->first_name))
                    <td>{{ $item->nurse->first_name }} {{ $item->nurse->last_name }}</td>
                @else 
                    <td></td>
                @endif
                    <td>{{ $item->hospital->first_name }} {{ $item->hospital->last_name }}</td>
                    <td>{{ $item->hospital_location }}</td>
                    <td>{{ $item->job_post_date }}</td>
                    <td>{{ $item->total_amount }}</td> 
                <!-- <td class="align-center"><span
                        class="kt-badge  kt-badge--{{ $item->job_status  == 1 ? 'success' : 'warning' }} kt-badge--inline cursor-pointer"
                        wire:click="changeStatusConfirm({{ $item->id }})">{{ $item->job_status  == 1 ? 'Active' : 'Deactive' }}</span>
                </td> -->
                <x-admin.td-action>                   
                    <a class="dropdown-item" href="{{route('complete-jobs.show', ['complete_job' => $item->id])}}" ><i class="la la-edit"></i> Show</a>
                </x-admin.td-action>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="align-center">No records available</td>
            </tr>
        @endforelse

    </x-slot>
    <x-slot name="pagination">
        {{ $details->links() }}
    </x-slot>
    <x-slot name="showingEntries">
        Showing {{ $details->firstitem() ?? 0 }} to {{ $details->lastitem() ?? 0 }} of {{ $details->total() }} entries
    </x-slot>
</x-admin.table>
