<x-admin-layout title="Skill Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $skill ? 'Edit' : 'Add' }} Skill">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('skills.index') }}" value="Skill List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $skill ? 'Edit' : 'Add' }}" />
				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<livewire:admin.master.skill.skill-create-edit :skill="$skill"/>
</x-admin-layout>