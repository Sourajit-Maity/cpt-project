<x-admin-layout title="City Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="City List">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('cities.index') }}" value="City List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					<a href="{{route('cities.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						Add New City
					</a>
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	<livewire:admin.master.city.city-list/> 
</x-admin-layout>