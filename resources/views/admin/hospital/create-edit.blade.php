<x-admin-layout title="Hospital Institute Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $hospital ? 'Edit' : 'Add' }} Hospital Institute">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('hospital.index') }}" value="Hospital Institute List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $hospital ? 'Edit' : 'Add' }} Hospital Institute" />

				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<livewire:admin.hospital.hospital-create-edit :hospital="$hospital"/> 
</x-admin-layout>