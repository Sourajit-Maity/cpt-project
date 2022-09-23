<x-admin-layout title="Job Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $job ? 'Edit' : 'Add' }} Job">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('jobs.index') }}" value="Job List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $job ? 'Edit' : 'Add' }} Job" />

				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<livewire:admin.jobs.job-create-edit :job="$job"/>
</x-admin-layout>