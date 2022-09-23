<x-admin-layout title="Hospital Management"> 
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="Hospital List">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('users.index') }}" value="Hospital List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					<a href="{{route('users.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						Add New Hospital
					</a>
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	<livewire:admin.user-list/>
</x-admin-layout>