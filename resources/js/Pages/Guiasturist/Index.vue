<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import WarningButton from '@/Components/WarningButton.vue';
import DarkButton from '@/Components/DarkButton.vue';




const props = defineProps({
    guiasturist: {type:Object}
});

</script>

<template>
    <Head title="Agencias Turísticas" />
    
    <AuthenticatedLayout>
        <template #header>
            Agencias Turísticas
        </template>
        
        <div class="w-full overflow-hidden rounded-lg border shadow-md">
            <div class="w-full overflow-x-auto bg-white">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                            <th class="px-4 py-3">ID</th>
                            <th class="px-4 py-3">Nombre</th>
                            <th class="px-4 py-3">Telefono</th>
                            <th class="px-4 py-3">Correo</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-100">
                        <tr v-for="guias in guiasturist" :key="guias.idguiaturist"
                            class="text-gray-700">
                            <td class="px-4 py-3 text-sm">{{ guias.idguiatur }}</td>
                            <td class="px-4 py-3 text-sm">{{ guias.nomguiatur}}</td>
                            <td class="px-4 py-3 text-sm">{{ guias.telguiatur }}</td>
                            <td class="px-4 py-3 text-sm">{{ guias.corguiatur }}</td>
                            <td class="px-4 py-3 text-sm"><SecondaryButton>Ver</SecondaryButton></td>
                            <td class="px-4 py-3 text-sm"><WarningButton>Edit</WarningButton></td>
                            <td class="px-4 py-3 text-sm"><DangerButton>Elim</DangerButton></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>