<x-admin-layout title="Payment Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="Payment List">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('payments.index') }}" value="Payment List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					<a href="{{route('payments.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						Add New Payment
					</a>
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	<livewire:admin.payment.payment-list/>
</x-admin-layout>