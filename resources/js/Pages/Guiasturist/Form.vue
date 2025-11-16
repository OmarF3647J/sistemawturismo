<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import NavLink from '@/Components/NavLink.vue';
import DarkButton from '@/Components/DarkButton.vue';
import InputGroup from '@/Components/InputGroup.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';
import SelectInput from '@/Components/SelectInput.vue';

import { ref, computed, onMounted, onBeforeUnmount } from 'vue';

// PROPS: ahora incluimos los arrays de ids/relaciones que envía el controlador
const props = defineProps({
    guiasturist: {type:Object}, // lista de guías turísticos para el select
    actividadturist: {type:Array}, // lista de actividades turísticas para el select
    centrosturist: {type:Array}, // el centro turístico a editar (o null para crear)
    guiasturist_actividadturist: {type:Array}, // array de ids o relaciones de actividades asociadas
    centrosturist_guiasturist: {type:Array}, // array de ids o relaciones de guías asociadas
    flash: {type:Object},
});


// --- Inicializar formulario ---
// Detectamos si la prop centrosturist_actividadturist viene como:
//  - array de ids: [1,2,3]
//  - o array de objetos: [{idacttur:1}, {idacttur:2}] (por si la enviaste así)
function normalizeIds(arr, key) {
    if (!Array.isArray(arr)) return [];
    if (arr.length === 0) return [];
    if (typeof arr[0] === 'object' && arr[0] !== null && key in arr[0]) {
        // array de objetos
        return arr.map(item => item[key]);
    } else {
        // array de ids
        return arr;
    }
}

const form = useForm({
    idguiatur: props.guiasturist ? props.guiasturist.idguiatur: '',
    nomguiatur: props.guiasturist ? props.guiasturist.nomguiatur: '',
    nomresguiatur: props.guiasturist ? props.guiasturist.nomresguiatur: '',
    telguiatur: props.guiasturist ? props.guiasturist.telguiatur: '',
    corguiatur: props.guiasturist ? props.guiasturist.corguiatur: '',
    imgguiatur: null,
    idacttur: normalizeIds(props.guiasturist_actividadturist, 'idacttur'),
    idcentur: normalizeIds(props.centrosturist_guiasturist, 'idcentur'),

});

const titleform = ref(
    props.centrosturist == null ? 'Crear Agencia Turística' : 'Editar Agencia Turística'
);

const req = ref('*Campo obligatorio');
const srcImg = ref('/storage/img/example.jpg');
const msj = ref('');
const classMsj = ref('hidden'); //clase del mensaje








// options: convertir actividadturist (modelo) a {id,text}
const options = ref([]);
if (Array.isArray(props.actividadturist)) {
  props.actividadturist.forEach((row) => {
    options.value.push({
      id: row.idacttur ?? row.id ?? row.value,
      text: row.nomacttur ?? row.name ?? row.label ?? ''
    });
  });
}















// Computed: actividades seleccionadas (objetos) para mostrar chips
// const selectedActivities = computed(() => {
//   const ids = Array.isArray(form.idacttur) ? form.idacttur.map(i => Number(i)) : [];
//   return options.value.filter(opt => ids.includes(Number(opt.id)));
// });

// // función para quitar actividad (actualiza form.idacttur)
// function removeActivity(id) {
//   form.idacttur = (form.idacttur || []).filter(i => Number(i) !== Number(id));
// }

// // ---- Dropdown simulado: mantener abierto hasta clic fuera ----
// const activitiesOpen = ref(false);
// const activitiesWrapper = ref(null);

// // Añade/quita (toggle) una actividad por id. No cierra el dropdown.
// function addActivityById(id) {
//   if (id === undefined || id === null) return;
//   const current = Array.isArray(form.idacttur) ? form.idacttur.map(i => String(i)) : [];
//   const sid = String(id);
//   if (current.includes(sid)) {
//     // si ya existe -> quitar (toggle)
//     form.idacttur = current.filter(i => i !== sid);
//   } else {
//     // añadir
//     form.idacttur = [...current, sid];
//   }
//   // NO cerramos activitiesOpen aquí — el dropdown queda abierto hasta clic fuera
// }

// // manejar clic fuera para cerrar el dropdown
// function handleClickOutside(e) {
//   if (!activitiesWrapper.value) return;
//   if (!activitiesWrapper.value.contains(e.target)) {
//     activitiesOpen.value = false;
//   }
// }

// // cerrar con Escape
// function handleKeydown(e) {
//   if (e.key === 'Escape') activitiesOpen.value = false;
// }

// onMounted(() => {
//   document.addEventListener('click', handleClickOutside);
//   document.addEventListener('keydown', handleKeydown);
// });
// onBeforeUnmount(() => {
//   document.removeEventListener('click', handleClickOutside);
//   document.removeEventListener('keydown', handleKeydown);
// });




















// const optionsGguias = ref([]);

// if (Array.isArray(props.centrosturist)) {
//   props.centrosturist.forEach((row) => {
//     // adaptar a la forma esperada: idacttur y nomacttur
//     optionsGguias.value.push({ id: row.idcentur ?? row.id ?? row.value, text: row.nomcentur ?? row.name ?? row.label ?? '' });
//   });
// }

// // Computed: actividades seleccionadas (objetos) para mostrar chips
// const selectedGuias = computed(() => {
//   const ids = Array.isArray(form.idcentur) ? form.idcentur.map(i => Number(i)) : [];
//   return optionsGguias.value.filter(opt => ids.includes(Number(opt.id)));
// });

// // es la función para quitar actividad (actualiza form.idguiatur)
// function removeGuias(id) {
//   form.idcentur = (form.idcentur || []).filter(i => Number(i) !== Number(id));
// }

// const selectedOptionGuias = ref('');


// // añadir inmediatamente la opción seleccionada al array form.idguiatur
// function addSelectedGuias() {
//   const id = selectedOptionGuias.value;
//   if (!id) return;

//   // convertir ids actuales a strings para evitar problemas con tipos
//   const ids = Array.isArray(form.idcentur) ? form.idcentur.map(i => String(i)) : [];

//   // evitar duplicados
//   if (!ids.includes(String(id))) {
//     form.idcentur = [...ids, id];
//   }

//   // limpiar la selección para que el usuario pueda seleccionar otra de inmediato
//   selectedOptionGuias.value = '';
// }

















// --- Mostrar imagen seleccionada ---
const showImg = (e) => {
    const file = e.target.files && e.target.files[0];
    if (!file) return;
    form.imgguiatur = file;
    srcImg.value = URL.createObjectURL(file);
};

// si tenemos centrosturist con imagen, mostrarla
if (props.guiasturist != null && props.guiasturist.imgguiatur) {
    srcImg.value = '/storage/' + props.guiasturist.imgguiatur;
}


const ok = (m) => {
    form.reset();
    msj.value = m;
    classMsj.value = 'block';
    setTimeout(() => {
        classMsj.value = 'hidden';
    }, 5000);
};

// Guardar y editar centro turístico
const guardar = () => {
    if (props.guiasturist == null) {
        form.post(route('guiasturist.store'), {
            forceFormData: true,
            onSuccess: () => {
                ok('Centro Turístico creado con éxito');
                srcImg.value = '/storage/img/example.jpg';
            },
        });
    } else {
        form.post(route('updateguiasturist', props.guiasturist.idguiatur), {
            forceFormData: true,
            onSuccess: () => {
                ok('Agencia Turística actualizada con éxito');
                setTimeout(() => {
                    location.reload();
                }, 5000);
            },
        });
    }
};





</script>


<template>
    <Head title="Agencias Turísticas" />
    <AuthenticatedLayout>
        <template #header>
            <div class = "inline-flex overflow-hidden mb-4 w-full">
                {{titleform}}
                <NavLink :href="route('guiasturist.index')">
                    <DarkButton> 
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                        </svg>
                    </DarkButton>
                </NavLink>
            </div>
        </template>


            <div class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md" :class="classMsj" v-if="msj">
                <!-- oculta el mensaje  -->
                <!-- En el video no se agrega la siguiente linea v-if="msj -->
				<div class="flex justify-center items-center w-12 bg-green-500">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>

				</div>
				
				<div class="px-4 py-2 -mx-3">
					<div class="mx-3">
						<span class="font-semibold text-green-600">Succes</span>
						<p class="text-sm text-gray-600">{{ msj }}</p>
					</div>
				</div>
			</div>


            

        <div class="grid gap-9 bg-white mb-8 md:grid-cols-2 rounded-lg">
            <div class="min-w-0 p-4 rounded-lg shadow-xs">

                <form class="mt-6 mb-6 space-y-6 max-w-xl" @submit.prevent="guardar">

                    <!-- <InputGroup :text="'Nombre Centro Turístico'" :required="'required'" v-model="form.idcentur">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819" />
                        </svg>
                    </InputGroup>
                    <InputError :message="form.errors.idcentur" /> -->

                    <InputGroup :text="'Nombre Centro Turístico'" :required="'required'" v-model="form.nomguiatur">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819" />
                        </svg>
                    </InputGroup>
                    <InputError :message="form.errors.nomguiatur" />

                    <InputGroup :text="'Dirección Centro Turístico'" :required="'required'" v-model="form.nomresguiatur">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
                    </InputGroup>
                    <InputError :message="form.errors.nomresguiatur" />

                    <InputGroup :text="'Descripción Centro Turístico'" :required="'required'" v-model="form.telguiatur">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                    </InputGroup>
                    <InputError :message="form.errors.telguiatur" />
                    
                    <InputGroup :text="'Responsable Centro Turístico'" :required="'required'" v-model="form.corguiatur">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                        </svg>
                    </InputGroup>
                    <InputError :message="form.errors.corguiatur" />



                    <InputGroup @change="showImg($event)" :text="'Imagen Centro Turístico'"  :type="'file'" :accept="'image/*'">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                    </InputGroup>
                    <InputError :message="form.errors.imgguiatur" />

                    

                    
                    <!-- termina el codigo de producto con select porque necesito que el usuario seleccione la categoria -->



                    
                    

                    <!-- :required="'require'"  agregar solo si es requerido el campo--> 
                    <!-- <InputGroup v-else @change="showImg($event)" :text="'Imagen Centro Turístico'"  :type="'file'" :accept="'image/*'">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                    </InputGroup> -->

















                    <!-- cuadro que muestra las actividades seleccionadas como chips -->
                    <!-- wrapper con ref para detectar clic fuera -->
                    <!-- <div ref="activitiesWrapper" class="relative mt-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Agencias Turísticas (selecciona 1 o más)
                            <span class="text-red-500">*</span>
                        </label>
                       
                        <div class="mb-2 flex flex-wrap gap-2">
                            <template v-if="selectedActivities.length">
                            <span v-for="act in selectedActivities" :key="act.id" class="inline-flex items-center px-2 py-1 rounded-full bg-gray-100 text-sm border" >
                                <span class="mr-2">{{ act.text }}</span>
                                <button type="button" @click="removeActivity(act.id)" class="inline-flex items-center justify-center w-5 h-5 rounded-full hover:bg-gray-200"> -->
                                <!-- simple X icon -->
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 8.586L15.293 3.293a1 1 0 0 1 1.414 1.414L11.414 10l5.293 5.293a1 1 0 0 1-1.414 1.414L10 11.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L8.586 10 3.293 4.707A1 1 0 0 1 4.707 3.293L10 8.586z" clip-rule="evenodd"/>
                                </svg>
                                </button>
                            </span>
                            </template>

                            <template v-else>
                            <span class="text-sm text-gray-500">No hay agencia seleccionadas</span>
                            </template>
                        </div> -->
                         <!-- botón que actúa como 'select' -->
                        <!-- <button type="button" @click.stop="activitiesOpen = !activitiesOpen" class="w-full text-left px-3 py-2 rounded-md border border-gray-300 shadow-sm focus:ring focus:ring-indigo-500 focus:border-indigo-500 flex justify-between items-center" aria-haspopup="listbox" :aria-expanded="activitiesOpen" > -->

                        <!-- lista de actividades -->
                                            
                        <!-- <span class="text-gray-400">Selecciona una actividad...</span>

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd" />
                            </svg>
                        </button> -->

                        <!-- menu desplegable (si activitiesOpen true) -->
                        <!-- <div v-show="activitiesOpen" class="absolute z-50 mt-1 w-full bg-white border rounded-md shadow-lg max-h-48 overflow-auto" role="listbox" @click.stop>
                            <button v-for="opt in options" :key="opt.id" type="button" @click.prevent="addActivityById(opt.id)" class="w-full text-left px-3 py-2 hover:bg-gray-100 flex justify-between items-center">
                            <span>{{ opt.text }}</span>
                            <span class="text-sm text-gray-500">
                                <template v-if="(form.idacttur || []).map(i => String(i)).includes(String(opt.id))">✓</template>
                            </span>
                            </button>
                        </div>
                    </div> -->
































                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Agencias Turísticas (selecciona 1 o más)
                            <span class="text-red-500">*</span>
                        </label>


                    
                        <div class="grid gap-2 mt-2">
                            <template v-for="opt in options" :key="opt.id">
                            <label class="flex items-center space-x-2">
                                <input
                                type="checkbox"
                                :value="opt.id"
                                v-model="form.idacttur"
                                class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                                />
                                <span class="text-sm text-gray-700">{{ opt.text }}</span>
                            </label>
                            </template>
                        </div>

                        <InputError :message="form.errors.idacttur" />
                    </div> 







                    



                    








                    <!-- CHECKBOXES: selección múltiple con casillas -->
                    <!-- <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Actividades (selecciona 1 o más)
                            <span class="text-red-500">*</span>
                        </label>


                    
                        <div class="grid gap-2 mt-2">
                            <template v-for="opt in options" :key="opt.id">
                            <label class="flex items-center space-x-2">
                                <input
                                type="checkbox"
                                :value="opt.id"
                                v-model="form.idacttur"
                                class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                                />
                                <span class="text-sm text-gray-700">{{ opt.text }}</span>
                            </label>
                            </template>
                        </div>

                        <InputError :message="form.errors.idacttur" />
                    </div> -->














                    <PrimaryButton>
                        Guardar
                    </PrimaryButton>
                </form>
            </div>
            <div class="min-w-0 p-4 rounded-lg shadow-xs">
                <!-- <img :src="'/storage/'+centrosturist.imgcentur" :alt="centrosturist.nomcentur"> -->
                <img :src="srcImg"  />
            </div>
        </div>
    </AuthenticatedLayout>
</template>