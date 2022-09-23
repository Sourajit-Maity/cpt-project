<x-admin-layout title="Nurse Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="Nurse List">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('nurse.index') }}" value="Nurse List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					<a href="{{route('nurse.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						Add New Nurse
					</a>
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	<livewire:admin.nurse.nurse-list/>
</x-admin-layout>