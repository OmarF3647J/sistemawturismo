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
  centrosturist: { type: Object, default: null },
  productos: { type: Array, default: () => [] },
  actividadturist: { type: Array, default: () => [] }, // lista completa de opciones [{idacttur, nomacttur}, ...]
  guiasturist: { type: Array, default: () => [] },
  centrosturist_actividadturist: { type: [Array, null], default: () => [] },
  centrosturist_guiasturist: { type: [Array, null], default: () => [] },
  flash: { type: Object, default: () => ({}) },
});


function normalizeIds(arr, key) {
  if (!Array.isArray(arr)) return [];
  if (arr.length === 0) return [];
  if (typeof arr[0] === 'object' && arr[0] !== null && key in arr[0]) {
    // array de objetos
    return arr.map(item => item[key]);
  } else {
    // asumimos que es array de ids
    return arr;
  }
}

const form = useForm({
    idcentur: props.centrosturist ? props.centrosturist.idcentur : '',
    dircentur: props.centrosturist ? props.centrosturist.dircentur : '',
    nomcentur: props.centrosturist ? props.centrosturist.nomcentur : '',
    descentur: props.centrosturist ? props.centrosturist.descentur : '',
    rescentur: props.centrosturist ? props.centrosturist.rescentur : '',
    telcentur: props.centrosturist ? props.centrosturist.telcentur : '',
    corcentur: props.centrosturist ? props.centrosturist.corcentur : '',
    imgcentur: null,
    idproduct: props.centrosturist ? props.centrosturist.idproduct : '',
    // normalizamos la prop para que siempre tengamos un array de ids
    idacttur: normalizeIds(props.centrosturist_actividadturist, 'idacttur'),
    idguiatur: normalizeIds(props.centrosturist_guiasturist, 'idguiatur'),
});

const titleform = ref(
    props.centrosturist == null ? 'Crear Centro Turístico' : 'Editar Centro Turístico'
);

const req = ref('*Campo obligatorio');
const srcImg = ref('/storage/img/example.jpg');
const msj = ref('');
const classMsj = ref('hidden'); //clase del mensaje





const options = ref([]);
if (Array.isArray(props.actividadturist)) {
  props.actividadturist.forEach((row) => {
    options.value.push({
      id: row.idacttur ?? row.id ?? row.value,
      text: row.nomacttur ?? row.name ?? row.label ?? ''
    });
  });
}

const optionsGguias = ref([]);

if (Array.isArray(props.guiasturist)) {
  props.guiasturist.forEach((row) => {
    // adaptar a la forma esperada: idacttur y nomacttur
    optionsGguias.value.push({ id: row.idguiatur ?? row.id ?? row.value, text: row.nomguiatur ?? row.name ?? row.label ?? '' });
  });
}

const showImg = (e) => {
    const file = e.target.files && e.target.files[0];
    if (!file) return;
    form.imgcentur = file;
    srcImg.value = URL.createObjectURL(file);
};

// si tenemos centrosturist con imagen, mostrarla
if (props.centrosturist != null && props.centrosturist.imgcentur) {
    srcImg.value = '/storage/' + props.centrosturist.imgcentur;
}


if (props.centrosturist != null) {
    form.idcentur = props.centrosturist.idcentur;
    form.dircentur = props.centrosturist.dircentur;
    form.nomcentur = props.centrosturist.nomcentur;
    form.descentur = props.centrosturist.descentur;
    form.rescentur = props.centrosturist.rescentur;
    form.telcentur = props.centrosturist.telcentur;
    form.corcentur = props.centrosturist.corcentur;
    form.idproduct = props.centrosturist.idproduct;
    srcImg.value = '/storage/' + props.centrosturist.imgcentur;
}

// Guardar y editar centro turístico
// const guardar = () => {
//     if (props.centrosturist == null) {
//         form.post(route('centrosturist.store'), {
//             forceFormData: true,
//             onSuccess: () => {
//                 ok('Centro Turístico creado con éxito');
//                 srcImg.value = '/storage/img/example.jpg';
//             },
//         });
//     } else {
//         form.post(route('updatecentrosturist'), {
//             forceFormData: true,
//         });
//     }
// };

const guardar = () => {
    if (props.centrosturist == null) {
        form.post(route('centrosturist.store'), {
            forceFormData: true,
            onSuccess: () => {
                ok('Centro Turístico creado con éxito');
                srcImg.value = '/storage/img/example.jpg';
            },
        });
    } else {
        form.post(route('updatecentrosturist'), {
            forceFormData: true,
            onSuccess: () => {
                ok('Centro Turístico actualizado con éxito');

                setTimeout(() => {
                    location.reload();
                }, 5000);
            }
        });
    }
};


const ok = (m) => {
    form.reset();
    msj.value = m;
    classMsj.value = 'block';
    setTimeout(() => {
        classMsj.value = 'hidden';
    }, 5000);
};



</script>



<template>
    <Head title="Centros Turísticos" />
    <AuthenticatedLayout>
        <template #header>
            <div class = "inline-flex overflow-hidden mb-4 w-full">
                {{titleform}}
                <NavLink :href="route('centrosturist.index')">
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

                    <InputGroup :text="'Nombre Centro Turístico'" :required="'required'" v-model="form.nomcentur">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819" />
                        </svg>
                    </InputGroup>
                    <InputError :message="form.errors.nomcentur" />

                    <InputGroup :text="'Dirección Centro Turístico'" :required="'required'" v-model="form.dircentur">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
                    </InputGroup>
                    <InputError :message="form.errors.dircentur" />

                    <InputGroup :text="'Descripción Centro Turístico'" :required="'required'" v-model="form.descentur">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                    </InputGroup>
                    <InputError :message="form.errors.descentur" />
                    
                    <InputGroup :text="'Responsable Centro Turístico'" :required="'required'" v-model="form.rescentur">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                        </svg>
                    </InputGroup>
                    <InputError :message="form.errors.rescentur" />

                    <InputGroup :text="'Telefono Centro Turístico'" :required="'required'" v-model="form.telcentur" >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                        </svg>
                    </InputGroup>
                    <InputError :message="form.errors.telcentur" />

                    <InputGroup :text="'Correo Centro Turístico'" :required="'required'" v-model="form.corcentur">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                    </InputGroup>
                    <InputError :message="form.errors.corcentur" />

                    <InputGroup @change="showImg($event)" :text="'Imagen Centro Turístico'"  :type="'file'" :accept="'image/*'">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                    </InputGroup>
                    <InputError :message="form.errors.imgcentur" />

                    <SelectInput :text="'Categoría Producto'" :required="'required'" v-model="form.idproduct" :options="productos" class="mt-4" >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                        </svg>
                    </SelectInput>
                    <InputError :message="form.errors.idproduct" />

                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Agencias Turísticas (selecciona 1 o más)
                            <span class="text-red-500">*</span>
                        </label>


                    
                        <div class="grid gap-2 mt-2">
                            <template v-for="opt in optionsGguias" :key="opt.id">
                            <label class="flex items-center space-x-2">
                                <input
                                type="checkbox"
                                :value="opt.id"
                                v-model="form.idguiatur"
                                class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                                />
                                <span class="text-sm text-gray-700">{{ opt.text }}</span>
                            </label>
                            </template>
                        </div>

                        <InputError :message="form.errors.idguiatur" />
                    </div> 



                    <!-- CHECKBOXES: selección múltiple con casillas -->
                    <div class="mt-4">
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
                    </div>



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