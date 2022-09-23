<x-admin-layout title="Security Question Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $securityquestion ? 'Edit' : 'Add' }} Security Question">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('security-question.index') }}" value="Security Question List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $securityquestion ? 'Edit' : 'Add' }}" />
				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	@livewire('admin.master.security-question.security-question-create-edit', ['securityquestion' => $securityquestion])
</x-admin-layout>