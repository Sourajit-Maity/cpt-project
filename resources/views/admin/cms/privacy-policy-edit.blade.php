<x-admin-layout title="">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="">
				<!-- <x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('cms.index') }}" value="" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $cms ? 'Edit' : 'Add' }} " />

				</x-admin.breadcrumbs> -->
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<livewire:admin.cms.privacey-policy-edit :cms="$cms"/>
</x-admin-layout>