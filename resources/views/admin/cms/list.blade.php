<x-admin-layout title="">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="">
				<!-- <x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('cms.index') }}" value="" />
				</x-admin.breadcrumbs> -->

			    <x-slot name="toolbar" >
					<!-- <a href="#" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						Add New CMS
					</a> -->
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	<livewire:admin.cms.cms-list/>
</x-admin-layout>