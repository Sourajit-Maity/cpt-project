<x-admin-layout title="">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('admin.hospital.details', ['hospital' => $hospital_id]) }}" value="" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
				</x-slot>
			</x-admin.sub-header>
    </x-slot>

	@livewire('admin.hospital.hospital-institute-details', ['hospital_id' => $hospital_id])

</x-admin-layout>