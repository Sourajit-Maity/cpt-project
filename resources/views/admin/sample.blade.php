<x-admin-layout title="User list">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="Dashboard">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="List" />
				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
		<x-admin.form-section submit="updateInfo">
			<x-slot name="form">
							<x-admin.form-group>
								<x-admin.lable value="Name" />
								<x-admin.input wire:model="name" placeholder="Strain Base Name" autocomplete="off" for="name" class="@error('name')is-invalid@enderror"/>
								<x-admin.input-error for="name" />
							</x-admin.form-group>

							<x-admin.form-group class="col-lg-12">
								<x-admin.lable value="text area" />
								<x-admin.textarea wire:model="name1" placeholder="name1" autocomple="off" class="@error('name1')is-invalid@enderror"/>
								<x-admin.input-error for="name" />
							</x-admin.form-group>
					</div>
					<br>
			</x-slot>
			<x-slot name="actions">
				<x-admin.button  color="success">Save</x-admin.button>
				<x-admin.link color="dark">Cancel</x-admin.link>
			</x-slot>
		</x-form-section>
</x-admin-layout>