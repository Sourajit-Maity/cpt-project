<x-admin-layout title="Hospital Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $user ? 'Edit' : 'Add' }} Hospital">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('users.index') }}" value="User List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $user ? 'Edit' : 'Add' }} Hospital" />

				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<livewire:admin.user-create-edit :user="$user"/>
</x-admin-layout>