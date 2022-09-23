<x-admin-layout title="Job Apply Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="Job Apply Info">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('job-apply-details.show', ['jobapply' => $jobapply]) }}" value="" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	<livewire:admin.job-apply.jobapply-details :jobapply="$jobapply"/>
</x-admin-layout>