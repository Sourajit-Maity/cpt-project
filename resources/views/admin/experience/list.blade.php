<x-admin-layout title="Experience Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="Experience List">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('experiences.index') }}" value="Experience List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					<a href="{{route('experiences.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						Add New Experience
					</a>
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	<livewire:admin.master.experience.experience-list/>
</x-admin-layout>