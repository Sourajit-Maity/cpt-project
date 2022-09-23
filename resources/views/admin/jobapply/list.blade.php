<x-admin-layout title="Job Apply Details Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="Job Apply Details List">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('job-apply-details.index') }}" value="Job Apply Details List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					<!-- <a href="{{route('job-apply-details.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						Add New Job Apply
					</a> -->
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	<livewire:admin.job-apply.jobapply-list/>
</x-admin-layout>