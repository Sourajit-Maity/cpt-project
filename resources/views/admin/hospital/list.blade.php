<x-admin-layout title="Hospital Institute Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="Hospital Institute List">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('hospital.index') }}" value="Hospital Institute List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					<a href="{{route('hospital.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						Add New Hospital Institute
					</a>
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	<livewire:admin.hospital.hospital-list/>
</x-admin-layout>