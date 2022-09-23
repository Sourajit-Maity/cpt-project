<x-admin-layout title="State Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $state ? 'Edit' : 'Add' }} State">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('states.index') }}" value="State List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $state ? 'Edit' : 'Add' }} State" />
				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<livewire:admin.master.state.state-create-edit :state="$state"/>
</x-admin-layout>