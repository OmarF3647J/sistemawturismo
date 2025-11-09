<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import NavLink from '@/Components/NavLink.vue';
import DarkButton from '@/Components/DarkButton.vue';

const props = defineProps({guiasturist: {type:Object},centrosturist: {type:Object},actividadturist: {type:Object},});

</script>

<template>
    <Head title="Agencias Turísticas" />
    <AuthenticatedLayout>
        <template #header>
            <div class = "inline-flex overflow-hidden mb-4 w-full">
                {{guiasturist.nomguiatur}}
                <NavLink :href="route('guiasturist.index')">
                    <DarkButton> 
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                        </svg>
                    </DarkButton>
                </NavLink>
            </div>
        </template>
        <div class="grid gap-9 bg-white mb-8 md:grid-cols-2 rounded-lg">
            <div class="min-w-0 p-4 rounded-lg shadow-xs">
                <p>Nombre: <span class="text-gray-900 font-semibold">{{ guiasturist.nomguiatur }}</span></p>
                <p>Dirección: <span class="text-gray-900 font-semibold">{{ guiasturist.nomresguiatur }}</span></p>
                <p>Descripción: <span class="text-gray-900 font-semibold">{{ guiasturist.telguiatur }}</span></p>
                <p>Responsable: <span class="text-gray-900 font-semibold">{{ guiasturist.corguiatur }}</span></p>
                <p>Actividades que realiza la agencia: 
                    <span class="text-gray-900 font-semibold">
                        <ul class="ml-10 list-disc"> <!-- ml-10 el numero funciona como tabulador o espaciado -->
                            <!-- actividad es solo una variable par6a el ciclo for -->
                            <li v-for="actividad in (guiasturist?.actividadturist ?? [])" :key="actividad.idacttur">
                                {{ actividad.nomacttur }}
                            </li>
                        </ul>
                    </span>
                </p>
                <p>Agencias Turísticas asociadas: 
                    <span class="text-gray-900 font-semibold">
                        <ul class="ml-10 list-disc"> <!-- ml-10 el numero funciona como tabulador o espaciado -->
                            <!-- actividad es solo una variable par6a el ciclo for -->
                            <li v-for="centro in (guiasturist?.centrosturist ?? [])" :key="centro.idcentur">
                                {{ centro.nomcentur  }}
                            </li>
                        </ul>
                    </span>
                </p>
            </div>
            <div class="min-w-0 p-4 rounded-lg shadow-xs">
                
                <!-- <img :src="'/storage/'+centrosturist.imgcentur" :alt="centrosturist.nomcentur"> -->
                <img :src="`/storage/${guiasturist.imgguiatur}`" :alt="guiasturist.nomguiatur" />

            </div>
        </div>
    </AuthenticatedLayout>
</template>