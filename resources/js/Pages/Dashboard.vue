<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
	<Head title="Dashboard" />
	
	<AuthenticatedLayout>
		<template #header>
			Panel de administración
		</template>
		
		<div class="p-4 bg-white rounded-lg shadow-xs">
			Ha iniciado sesión!
		</div>
	</AuthenticatedLayout>
</template>
