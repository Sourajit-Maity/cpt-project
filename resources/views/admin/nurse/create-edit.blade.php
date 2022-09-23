<x-admin-layout title="Nurse Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $nurse ? 'Edit' : 'Add' }} Nurse">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('nurse.index') }}" value="Nurse List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $nurse ? 'Edit' : 'Add' }} Nurse" />

				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<livewire:admin.nurse.nurse-create-edit :nurse="$nurse"/>
</x-admin-layout>