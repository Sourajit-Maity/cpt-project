<x-admin-layout title="Shift Time Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="Shift Time List">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('shift-time.index') }}" value="Shift Time List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					<a href="{{route('shift-time.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						Add New Shift Time
					</a>
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	<livewire:admin.master.shift-time.shift-time-list/>
</x-admin-layout>