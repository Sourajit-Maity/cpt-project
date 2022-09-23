<x-admin-layout title="Payment Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="Payment Info">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('payments.show', ['payment' => $payment]) }}" value="" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
				</x-slot>
			</x-admin.sub-header>
    </x-slot>

	@livewire('admin.payment.payment-info', ['payment' => $payment])

</x-admin-layout>