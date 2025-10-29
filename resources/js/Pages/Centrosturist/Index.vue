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
    centrosturist: {type:Object},productos: {type:Object}
});

</script>

<template>
    <Head title="Centros Turísticos" />
    
    <AuthenticatedLayout>
        <template #header>
            Centros Turísticos
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
                            <th class="px-4 py-3">Producto Asociado</th>
                            <th class="px-4 py-3">Detalle</th>
                            <th class="px-4 py-3">Editar</th>
                            <th class="px-4 py-3">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <tr v-for="centro in centrosturist" :key="centro.idcentrosturist"
                            class="text-gray-700">
                            <td class="px-4 py-3 text-sm">{{ centro.idcentur }}</td>
                            <td class="px-4 py-3 text-sm">{{ centro.nomcentur}}</td>
                            <td class="px-4 py-3 text-sm">{{ centro.telcentur }}</td>
                            <td class="px-4 py-3 text-sm">{{ centro.corcentur }}</td>
                            <td class="px-4 py-3 text-sm">{{ centro.producto.nomproduct }}</td>
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