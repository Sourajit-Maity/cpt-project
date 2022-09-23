<x-admin-layout title="Country Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $country ? 'Edit' : 'Add' }} Country">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('countries.index') }}" value="Country List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $country ? 'Edit' : 'Add' }}" />
				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<livewire:admin.master.country.country-create-edit :country="$country"/>
</x-admin-layout>