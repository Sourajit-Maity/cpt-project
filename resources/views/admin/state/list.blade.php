<x-admin-layout title="State Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="State List">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('states.index') }}" value="State List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					<a href="{{route('states.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						Add New State
					</a>
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	<livewire:admin.master.state.state-list/>
</x-admin-layout>