<x-admin-layout title="Shift Time Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $shifttime ? 'Edit' : 'Add' }} Shift Time">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('shift-time.index') }}" value="Shift Time List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $shifttime ? 'Edit' : 'Add' }}" />
				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>

	@livewire('admin.master.shift-time.shift-time-create-edit', ['shifttime' => $shifttime])

</x-admin-layout>