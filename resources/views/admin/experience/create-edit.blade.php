<x-admin-layout title="Experience Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $experience ? 'Edit' : 'Add' }} Experience">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('experiences.index') }}" value="Experience List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $experience ? 'Edit' : 'Add' }}" />
				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<livewire:admin.master.experience.experience-create-edit :experience="$experience"/>
</x-admin-layout>