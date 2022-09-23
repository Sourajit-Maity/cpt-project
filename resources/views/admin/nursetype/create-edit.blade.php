<x-admin-layout title="Projects Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $nursetype ? 'Edit' : 'Add' }} Projects">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('projects.index') }}" value="Projects List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $nursetype ? 'Edit' : 'Add' }}" />
				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>

	@livewire('admin.master.nurse-type.nurse-type-create-edit', ['nursetype' => $nursetype])

</x-admin-layout>