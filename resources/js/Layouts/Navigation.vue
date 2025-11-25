<template>
  <aside class="z-20 hidden w-64 overflow-y-auto bg-white md:block flex-shrink-0">
    <div class="py-4 text-gray-500">
      <Link class="ml-6 text-lg font-bold text-gray-800" :href="route('dashboard')">
        <img
        src="/storage/logos/ITSSAT-COMUNITARIO.jpg"
        alt="Logo"
        class="h-20 w-auto m-auto rounded-full"
      >
      </Link>

      <ul class="mt-6">
        <li class="relative px-6 py-3">
          <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
            <template #icon>
              <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                   stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
              </svg>
            </template>
            Dashboard
          </NavLink>
        </li>
        <li class="relative px-6 py-3">
          <span  v-show="route().current('centrosturist.*')"  class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" 
            aria-hidden="true">
          </span>

          <button @click="toggleMenu('centros')"
              class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800"
              aria-haspopup="true">
                <span class="inline-flex items-center">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                    </svg>
                    <span class="ml-4">Centros Turísticos</span>
                </span>
            <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
          </button>
            <ul v-if="showingCentrosMenu"
              class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50" aria-label="submenu">
              <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                <NavLink :href="route('centrosturist.index')" :active="route().current('centrosturist.index')" @click="closeAllMenus()"> 
                  Lista
                </NavLink>
              </li>
              <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                <NavLink :href="route('centrosturist.create')" :active="route().current('centrosturist.create')" @click="closeAllMenus()"> 
                  Crear
                </NavLink>
              </li>
            </ul>
        </li>

        <li class="relative px-6 py-3">
          <span 
            v-show="route().current('guiasturist.*')" 
            class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" 
            aria-hidden="true">
          </span>
          <button @click="toggleMenu('guias')"
              class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800"
              aria-haspopup="true">
                <span class="inline-flex items-center">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                    </svg>
                    <span class="ml-4">Agencias Turísticas</span>
                </span>
            <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
          </button>
            <ul v-if="showingGuiasMenu"
            class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50"
                aria-label="submenu">
              <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                <NavLink :href="route('guiasturist.index')" :active="route().current('guiasturist.index')" @click="closeAllMenus()"> 
                  Lista
                </NavLink>
              </li>
              <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                <NavLink :href="route('guiasturist.create')" :active="route().current('guiasturist.create')" @click="closeAllMenus()"> 
                  Crear
                </NavLink>
              </li>
            </ul>
        </li>
        <li class="relative px-6 py-3">
          <NavLink :href="route('actividadturist.index')" :active="route().current('actividadturist.*')">
                <template #icon>
                    <svg class="w-6 h-6 " aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                    </svg>
                    
                </template>

            Actividades Turísticas
          </NavLink>
        </li>
        <li class="relative px-6 py-3">
          <NavLink :href="route('serviciosturist.index')" :active="route().current('serviciosturist.*')">
                <template #icon>
                    <svg class="w-6 h-6 " aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                    </svg>
                </template>
            Servicios Turísticos
          </NavLink>
        </li>
        <li class="relative px-6 py-3">
          <NavLink :href="route('producto.index')" :active="route().current('producto.*')">
                <template #icon>
                    <svg class="w-6 h-6 " aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                    </svg>
                </template>
            Categorias centros
          </NavLink>
        </li>
      </ul>
    </div>
  </aside>
</template>

<script>
import NavLink from '@/Components/NavLink.vue'
import { Link } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue' 
export default {
  components: {
    NavLink,
    Link,
  },

  setup() {

    const showingCentrosMenu = ref(false)
    const showingGuiasMenu = ref(false)
    const showingActividadMenu = ref(false)
    const showingServiciosMenu = ref(false)
    const showingProductoMenu = ref(false)

    onMounted(() => {
      const current = route().current()
      if (current && current.startsWith('centrosturist')) {
        showingCentrosMenu.value = true
      }
      if (current && current.startsWith('guiasturist')) {
        showingGuiasMenu.value = true
      }
      if (current && current.startsWith('actividadturist')) {
        showingActividadMenu.value = true
      }
      if (current && current.startsWith('serviciosturist')) {
        showingServiciosMenu.value = true
      }
      if (current && current.startsWith('producto')) {
        showingProductoMenu.value = true
      }
    });
    function toggleMenu(menu) {
      if (menu === 'centros') {
        showingCentrosMenu.value = !showingCentrosMenu.value
      } else if (menu === 'guias') {
        showingGuiasMenu.value = !showingGuiasMenu.value
      } else if (menu === 'actividad') {
        showingActividadMenu.value = !showingActividadMenu.value
      } else if (menu === 'servicios') {
        showingServiciosMenu.value = !showingServiciosMenu.value
      } else if (menu === 'producto') {
        showingProductoMenu.value = !showingProductoMenu.value
      }
    }

    function closeAllMenus() {
      showingCentrosMenu.value = false
      showingGuiasMenu.value = false
      showingActividadMenu.value = false
      showingServiciosMenu.value = false
      showingProductoMenu.value = false
    }

   
    return {
      showingCentrosMenu,
      showingGuiasMenu,
      showingActividadMenu,
      showingServiciosMenu,
      showingProductoMenu,
      toggleMenu,
      closeAllMenus,
    }
  }
}
</script>
