<x-admin-layout title="Completed Jobs Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="Completed Jobs Details">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('jobs.index') }}" value="Completed Jobs List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	<livewire:admin.jobs.completed-job-details :job="$job"/>
</x-admin-layout>