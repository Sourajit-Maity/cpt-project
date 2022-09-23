<x-admin-layout title="Job Apply Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $jobapply ? 'Edit' : 'Add' }} Job apply">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('job-apply-details.index') }}" value="Job Apply List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $jobapply ? 'Edit' : 'Add' }} Job Apply" />

				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<livewire:admin.job-apply.jobapply-create-edit :jobapply="$jobapply"/>
</x-admin-layout>