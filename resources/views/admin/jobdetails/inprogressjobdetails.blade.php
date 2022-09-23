
<x-admin-layout title="In progress Jobs Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="In progress Jobs Details">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('jobs.index') }}" value="In progress Jobs List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	<livewire:admin.jobs.job-details :job="$job"/>
</x-admin-layout>