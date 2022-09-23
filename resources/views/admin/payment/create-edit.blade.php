<x-admin-layout title="Payment Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $payment ? 'Edit' : 'Add' }} Payment">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('payments.index') }}" value="Payment List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $payment ? 'Edit' : 'Add' }} Payment" />

				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<livewire:admin.payment.payment-create-edit :payment="$payment"/>
</x-admin-layout>