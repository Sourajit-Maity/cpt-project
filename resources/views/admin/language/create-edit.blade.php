<x-admin-layout title="Language Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $language ? 'Edit' : 'Add' }} Language">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('languages.index') }}" value="Language List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $language ? 'Edit' : 'Add' }}" />
				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<livewire:admin.master.language.language-create-edit :language="$language"/>
</x-admin-layout>