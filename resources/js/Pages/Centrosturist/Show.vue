<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import NavLink from '@/Components/NavLink.vue';
import DarkButton from '@/Components/DarkButton.vue';
import { computed } from 'vue';


const props = defineProps({centrosturist: {type:Object},actividadturist: {type:Object},guiasturist: {type:Object},productos: {type:Object}, serviciosturist: {type:Object},});

//esto hace un filtrado de las actividades que realizan los guias unicamente en ese centro turistico
const centerActIds = computed(() => {
  const acts = props.centrosturist?.actividadturist ?? [];
  return new Set(acts.map(a => a.idacttur));
});

</script>

<template>
    <Head title="Centros Turísticos" />
    <AuthenticatedLayout>
        <template #header>
            <div class = "inline-flex overflow-hidden mb-4 w-full">
                {{centrosturist.nomcentur}}
                <NavLink :href="route('centrosturist.index')">
                    <DarkButton> 
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                        </svg>
                    </DarkButton>
                </NavLink>
            </div>
        </template>
        <div class="grid gap-11 bg-white mb-8 md:grid-cols-2 rounded-lg">
            <div class="min-w-0 p-4 rounded-lg shadow-xs">
                <p>Nombre: <span class="text-gray-900 font-semibold">{{ centrosturist.nomcentur }}</span></p>
                <p>Dirección: <span class="text-gray-900 font-semibold">{{ centrosturist.dircentur }}</span></p>
                <p>Descripción: <span class="text-gray-900 font-semibold">{{ centrosturist.descentur }}</span></p>
                <p>Responsable: <span class="text-gray-900 font-semibold">{{ centrosturist.rescentur }}</span></p>
                <p>Acepta mascotas: <span class="text-gray-900 font-semibold">{{ centrosturist.activo }}</span></p>
                <p>Telefono: <span class="text-gray-900 font-semibold">{{ centrosturist.telcentur }}</span></p>
                <p>Correo: <span class="text-gray-900 font-semibold">{{ centrosturist.corcentur }}</span></p>
                <p>Categoría: <span class="text-gray-900 font-semibold">{{centrosturist.producto.nomproduct }}</span></p>
                <p>Servicios con los que cuenta: 
                    <span class="text-gray-900 font-semibold">
                        <!-- ml-10 el numero funciona como tabulador o espaciado -->
                        <ul class="ml-10 list-disc"> 
                            <!-- actividad es solo una variable par6a el ciclo for -->
                            <li v-for="servicio in (centrosturist?.serviciosturist ?? [])" :key="servicio.idsertur">
                                {{ servicio.nomsertur }}
                            </li>
                        </ul>
                    </span>
                </p>
                <p>Actividades que se realizan: 
                    <span class="text-gray-900 font-semibold">
                        <!-- ml-10 el numero funciona como tabulador o espaciado -->
                        <ul class="ml-10 list-disc"> 
                            <!-- actividad es solo una variable par6a el ciclo for -->
                            <li v-for="actividad in (centrosturist?.actividadturist ?? [])" :key="actividad.idacttur">
                                {{ actividad.nomacttur }}
                            </li>
                        </ul>
                    </span>
                </p>
                <p>Agencias Turísticas asociadas: 
                    <span class="text-gray-900 font-semibold">
                        <!-- ml-10 el numero funciona como tabulador o espaciado -->
                        <ul class="ml-10 list-disc"> 
                            <!-- actividad es solo una variable par6a el ciclo for -->
                            <li v-for="guias in (centrosturist?.guiasturist ?? [])" :key="guias.idguiatur">
                                {{ guias.nomguiatur  }}
                                <ul class="ml-10 list-disc text-gray-700">
                                    
                                    <li v-for="actividad in (guias.actividadturist ?? []).filter(a => centerActIds.has(a.idacttur))" :key="actividad.idacttur">
                                        {{ actividad.nomacttur }}
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </span>
                </p>
            </div>
            <div class="min-w-0 p-4 rounded-lg shadow-xs">
                
                <!-- <img :src="'/storage/'+centrosturist.imgcentur" :alt="centrosturist.nomcentur"> -->
                <img :src="`/storage/${centrosturist.imgcentur}`" :alt="centrosturist.nomcentur" />

            </div>
        </div>
    </AuthenticatedLayout>
</template>