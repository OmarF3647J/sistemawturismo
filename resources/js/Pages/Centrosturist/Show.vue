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



<!-- contenedor padre: ancho completo -->
<div class="w-full mb-8">

  <!-- contenido centrado (título, descripción, info + imagen) -->
  <div class="max-w-6xl mx-auto px-4">
    <!-- título -->
    <h1 class="text-4xl md:text-4xl font-extrabold text-center mb-4">
      {{ centrosturist.nomcentur }}
    </h1>

    <!-- descripción -->
    <p class="mb-6 text-gray-700 text-center md:text-left max-w-4xl mx-auto">
      <span class="font-semibold">Descripción:</span>
      <span class="text-gray-900">{{ centrosturist.descentur }}</span>
    </p>

    <!-- grid: información + imagen -->
    <div class="grid gap-6 md:grid-cols-3 items-start">
      <!-- columna de datos -->
      <div class="md:col-span-2 bg-gray-100/80 p-6  rounded-lg shadow ">
        <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-3 text-gray-700">
          <!-- tus items... -->
          <div>
            <dt class="text-sm font-medium text-gray-500">Dirección</dt>
            <dd class="mt-1 text-sm text-gray-900">{{ centrosturist.dircentur }}</dd>
          </div>
          <div>
            <dt class="text-sm font-medium text-gray-500">Responsable</dt>
            <dd class="mt-1 text-sm text-gray-900">{{ centrosturist.rescentur }}</dd>
          </div>
          <div>
            <dt class="text-sm font-medium text-gray-500">Acepta mascotas</dt>
            <dd class="mt-1 text-sm text-gray-900">{{ centrosturist.activo }}</dd>
          </div>
          <div>
            <dt class="text-sm font-medium text-gray-500">Teléfono</dt>
            <dd class="mt-1 text-sm text-gray-900">{{ centrosturist.telcentur }}</dd>
          </div>
          <div>
            <dt class="text-sm font-medium text-gray-500">Correo</dt>
            <dd class="mt-1 text-sm text-gray-900 break-words">{{ centrosturist.corcentur }}</dd>
          </div>
          <div>
            <dt class="text-sm font-medium text-gray-500">Categoría</dt>
            <dd class="mt-1 text-sm text-gray-900">{{ centrosturist.producto.nomproduct }}</dd>
          </div>
        </dl>

        <hr class="my-4 border-gray-300" />

        <!-- servicios y actividades -->
        <div class="grid gap-4 md:grid-cols-2">
          <div>
            <h3 class="text-sm font-semibold text-gray-600 mb-2">Servicios</h3>
            <ul class="list-disc list-inside text-sm text-gray-800 space-y-1">
              <li v-for="servicio in (centrosturist?.serviciosturist ?? [])" :key="servicio.idsertur">
                {{ servicio.nomsertur }}
              </li>
            </ul>
          </div>

          <div>
            <h3 class="text-sm font-semibold text-gray-600 mb-2">Actividades</h3>
            <ul class="list-disc list-inside text-sm text-gray-800 space-y-1">
              <li v-for="actividad in (centrosturist?.actividadturist ?? [])" :key="actividad.idacttur">
                {{ actividad.nomacttur }}
              </li>
            </ul>
          </div>
        </div>
      </div>

      <!-- columna imagen -->
      <div class="flex items-start justify-center">
        <img
          :src="`/storage/${centrosturist.imgcentur}`"
          :alt="centrosturist.nomcentur"
          class="w-full md:w-[320px] h-64 md:h-64 object-cover rounded-lg shadow-md"
        />
      </div>
    </div>
  </div>

  <!-- SECCIÓN DE AGENCIAS: full width pero sigue siendo hijo del mismo contenedor padre -->
  <section class="w-full mt-8 bg-transparent">
    <!-- usamos px para alinear con el contenido centrado, y -mx para "salir" hasta los bordes si quieres full-bleed real -->
    <div class="w-full -mx-4 px-4">
      <!-- opcional: wrapper centrado para mantener máximo ancho visual en pantallas muy anchas -->
      <div class="max-w-7xl mx-auto">
        <h3 class="text-lg font-semibold text-gray-700 mb-4 px-2">Agencias Turísticas asociadas</h3>

        <!-- Grid: 1 / 2 / 3 / 4 columnas (lg = 4) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
          <!-- tarjeta de agencia -->
          <article
            v-for="guias in (centrosturist?.guiasturist ?? [])"
            :key="guias.idguiatur"
            class="bg-gray-100/80 p-4 rounded-2xl shadow-sm border border-gray-100 h-full flex flex-col"
          >
            <!-- imagen (si existe) -->
            <div class="w-full h-36 rounded-lg overflow-hidden mb-3">
              <img
                v-if="guias.imgguiatur" 
                :src="`/storage/${guias.imgguiatur}`"
                :alt="guias.nomguiatur"
                class="w-full h-full object-cover"
              />
              <div v-else class="w-full h-full flex items-center justify-center text-sm text-gray-400 bg-gray-50">
                Sin imagen
              </div>
            </div>

            <!-- contenido -->
            <div class="flex-1">
  <h4 class="text-sm font-semibold text-gray-800 mb-1">
    {{ guias.nomguiatur }}
  </h4>

  <p class="text-xs text-gray-500 mb-2 truncate">
    {{ guias.nomresguiatur }}
  </p>

  <!-- SI TIENE ACTIVIDADES -->
  <ul
    v-if="(guias.actividadturist ?? [])
      .filter(a => centerActIds.has(a.idacttur)).length"
    class="list-disc list-inside text-xs text-gray-700 space-y-1"
  >
    <li
      v-for="actividad in (guias.actividadturist ?? [])
        .filter(a => centerActIds.has(a.idacttur))"
      :key="actividad.idacttur"
    >
      {{ actividad.nomacttur }}
    </li>
  </ul>

  <!-- SI NO TIENE ACTIVIDADES -->
  <p v-else class="text-xs text-gray-400">
    Sin actividades
  </p>
</div>

            

            <!-- footer con contactos -->
            <div class="mt-3 pt-3 border-t border-gray-100 text-xs text-gray-600 flex items-center justify-between">
              <div class="truncate">
                <span class="font-medium text-gray-700">Tel:</span>
                <span class="ml-1">{{ guias.telguiatur ?? '—' }}</span>
              </div>
              <div class="text-right">
                <a v-if="guias.correguiatur" :href="`mailto:${guias.correguiatur}`" class="text-blue-600 hover:underline text-xs">
                  Contactar
                </a>
              </div>
            </div>
          </article>
        </div>

        <!-- mensaje si no hay agencias -->
        <div v-if="!(centrosturist?.guiasturist ?? []).length" class="text-center text-gray-500 py-8">
          No hay agencias asociadas registradas.
        </div>
      </div>
    </div>
  </section>
</div>



    </AuthenticatedLayout>
</template>