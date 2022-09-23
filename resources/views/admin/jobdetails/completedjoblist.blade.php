<x-admin-layout title="Complete Jobs Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="Complete Jobs List">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('complete-jobs.index') }}" value="Complete Jobs List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	<livewire:admin.jobs.completed-job-list/>
</x-admin-layout>