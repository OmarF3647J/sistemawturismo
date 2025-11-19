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
            <div class = "inline-flex overflow-hidden  w-full">
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

       <div class="max-w-6xl mx-auto mb-8 px-4">
    <h1 class="text-4xl md:text-4xl font-extrabold text-center mb-5">
        {{ guiasturist.nomguiatur }}
    </h1>
  <!-- GRID: datos (2/3) + imagen (1/3) -->
  <div class="grid gap-6 md:grid-cols-3 items-start">

    <!-- COLUMNA IZQUIERDA -->
    <div class="md:col-span-2 bg-gray-100/80 p-6 rounded-lg shadow">

      
      <!-- PARES DE DATOS COMO DL -->
      <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4 text-gray-700">

        

        <div>
          <dt class="text-sm font-medium text-gray-500">Responsable</dt>
          <dd class="mt-1 text-sm text-gray-900">{{ guiasturist.nomresguiatur }}</dd>
        </div>

        <div>
          <dt class="text-sm font-medium text-gray-500">Teléfono</dt>
          <dd class="mt-1 text-sm text-gray-900">{{ guiasturist.telguiatur }}</dd>
        </div>

        <div>
          <dt class="text-sm font-medium text-gray-500">Correo</dt>
          <dd class="mt-1 text-sm text-gray-900">{{ guiasturist.corguiatur }}</dd>
        </div>

      </dl>

      <!-- SEPARADOR -->
      <hr class="my-4 border-gray-300" />

      <!-- ACTIVIDADES Y CENTROS EN UNA MISMA FILA -->
<div class="grid md:grid-cols-2 gap-6 mt-6">

  <!-- ACTIVIDADES -->
  <div>
    <h3 class="text-sm font-semibold text-gray-600 mb-2">
      Actividades que realiza
    </h3>

    <ul class="list-disc ml-6 text-sm text-gray-800 space-y-1">
      <li
        v-for="actividad in (guiasturist?.actividadturist ?? [])"
        :key="actividad.idacttur"
      >
        {{ actividad.nomacttur }}
      </li>
    </ul>
  </div>

  <!-- CENTROS ASOCIADOS -->
  <div>
    <h3 class="text-sm font-semibold text-gray-600 mb-2">
      Centros Turísticos asociados
    </h3>

    <ul class="list-disc ml-6 text-sm text-gray-800 space-y-1">
      <li
        v-for="centro in (guiasturist?.centrosturist ?? [])"
        :key="centro.idcentur"
      >
        {{ centro.nomcentur }}
      </li>
    </ul>
  </div>

</div>


    </div>

    <!-- COLUMNA DERECHA (IMAGEN + DESCRIPCIÓN ARRIBA) -->
    <div class="space-y-4 p-4">
      <img
        :src="`/storage/${guiasturist.imgguiatur}`"
        :alt="guiasturist.nomguiatur"
        class="w-full md:w-[320px] h-64 md:h-64 object-cover rounded-lg shadow-md"
      />
    </div>

  </div>
</div>

    </AuthenticatedLayout>
</template>