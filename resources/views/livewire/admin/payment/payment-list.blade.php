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
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">User Name <i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('user_id')"></i>
            </th>           
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 10%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Job Id<i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('job_id')"></i>
            </th>
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 15%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Total Amount <i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('total_amount')"></i>
            </th>

            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 15%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Payment Datetime <i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('payment_datetime')"></i>
            </th>
            
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 10%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Status<i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('status')"></i>
            </th>

            <th class="align-center" rowspan="1" colspan="1" style="width: 20%;" aria-label="Actions">Actions</th>
        </tr>

        <tr class="filter">
            <th>
                <!-- <x-admin.input type="search" wire:model.defer="searchUser" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" /> -->
            </th>

            <th>
                <!-- <x-admin.input type="search" wire:model.defer="searchJob" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" /> -->
            </th> 
            <th>
                <!-- <x-admin.input type="search" wire:model.defer="searchAmount" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" /> -->
            </th>        
            <th>
                <!-- <x-admin.input type="search" wire:model.defer="searchDate" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" /> -->
            </th>
           
            <th>
                <!-- <x-admin.input type="search" wire:model.defer="searchStatus" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" /> -->
            </th>
          
            <th>
                <div class="row">
                    <div class="col-md-6">
                        <!-- <button class="btn btn-brand kt-btn btn-sm kt-btn--icon" wire:click="search">
                            <span>
                                <i class="la la-search"></i>
                                <span>Search</span>
                            </span>
                        </button> -->
                    </div>
                    <div class="col-md-6">
                        <!-- <button class="btn btn-secondary kt-btn btn-sm kt-btn--icon" wire:click="resetSearch">
                            <span>
                                <i class="la la-close"></i>
                                <span>Reset</span>
                            </span>
                        </button> -->
                    </div>
                </div>
            </th>
        </tr>
    </x-slot>

    <x-slot name="tbody">

        @forelse($services as $item)
        
            <tr role="row" class="odd">
              
                    <td>{{ $item->user->first_name }} {{ $item->user->last_name }}</td>              
                    <td>{{ $item->job_id }}</td>
                    <td>{{ $item->total_amount }}</td> 
                    <td>{!! \Carbon\Carbon::parse($item->payment_datetime)->format('d M Y') !!}</td>                    
                    <td class="align-center">  
                        {{ $item->status }} 
                    </td>
                <x-admin.td-action>
                <a class="dropdown-item" href="{{route('payments.show', ['payment' => $item->id])}}" ><i class="la la-eye"></i> Show</a>
                <!-- <a class="dropdown-item" href="{{route('payments.edit', ['payment' => $item->id])}}" ><i class="la la-edit"></i> Edit</a> -->
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
