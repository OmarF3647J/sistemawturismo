<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import WarningButton from '@/Components/WarningButton.vue';
import DarkButton from '@/Components/DarkButton.vue';
import InputGroup from '@/Components/InputGroup.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { ref } from 'vue';



const props = defineProps({
    serviciosturist: {type:Object},centrosturist: {type:Object}
});

const form = useForm({
    idsertur: '',
    nomsertur: '',
    idcentur: '',
});
const v = ref({idsertur: '',nomsertur: '',centrosturist: []

}); 
const showModalView = ref(false); //para la vista de detalle
const showModalForm = ref(false); //para el formulario de crear y editar    
const showModalDelete = ref(false); //para eliminar
const title = ref(''); //titulo del modal
const operation = ref(1); //operacion a realizar create o edit
const msj = ref(''); //mensaje de exito o error
const classMsj = ref(''); //clase del mensaje



const openModalView = (servicios) => {
    v.value = servicios;
    showModalView.value = true;
};

const openModalForm = (op,servicios) => {
    operation.value = op;
    if (op === 1) {
        title.value = 'Crear Servi  cio Turístico';
        form.reset();
    } else if (op === 2) {
        title.value = 'Editar Servicio Turístico';
        form.idsertur = servicios.idsertur;
        form.nomsertur = servicios.nomsertur;
    }
    showModalForm.value = true;
};

const openModalDelete = (servicios) => {
    showModalDelete.value = true;
    v.value = servicios;
    value.idsertur = servicios.idsertur;
    value.nomsertur = servicios.nomsertur;
};



const closeModalView = () => {
    showModalView.value = false;
};
const closeModalForm = () => {
    showModalForm.value = false;
    form.reset();
};
const closeModalDelete = () => {
    showModalDelete.value = false;
};





const guardar = () => {
    if (operation.value === 1) {
        form.post('/serviciosturist', {
            onSuccess: () => {
                ok("Servicio creado con éxito");
            },
        });
    } else if (operation.value === 2) {
        form.put(`/serviciosturist/${form.idsertur}`, {
            onSuccess: () => {
                ok('Servicio actualizado con éxito');
            },
        });
    }
}

//cierra un modal y el otro lo deja abierto(limpia el formulario)
const ok = (m) => {
    if (operation.value === 2) {
        closeModalForm();
    } 
    closeModalDelete();
    form.reset();
    msj.value = m;
    classMsj.value = 'block';
    setTimeout(() => {
        classMsj.value = 'hidden';
    }, 5000);
}


//cierra ambos modales y muestra el mensaje de exito

// const ok = (m) => {
//     if (m) {
//         msj.value = m;
//         classMsj.value = 'alert-success';
//     }
//     closeModalForm();
    
// }

// función para eliminar actividad turística
const deleteServicios = () => {
    form.delete(route('serviciosturist.destroy', v.value.idsertur), {
        onSuccess: () => {
            ok('Servicio eliminado con éxito');
        },
    });
};




</script>

<template>
    <Head title="Servicios Turísticos" />
    
    <AuthenticatedLayout>
        <template #header>
            Servicios Turísticos
            <DarkButton @click="openModalForm(1)">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                </svg>
            </DarkButton>
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



        <div class="w-full overflow-hidden rounded-lg border shadow-md">
            <div class="w-full overflow-x-auto bg-white">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                            <th class="px-4 py-3">ID</th>
                            <th class="px-4 py-3">Nombre del Servicio</th>
                            <th class="px-4 py-3">Detalle</th>
                            <th class="px-4 py-3">Editar</th>
                            <th class="px-4 py-3">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-100">
                        <tr v-for="servicios in serviciosturist" :key="servicios.serviciosturist"
                            class="text-gray-700">
                            <td class="px-4 py-3 text-sm">{{ servicios.idsertur }}</td>
                            <td class="px-4 py-3 text-sm">{{ servicios.nomsertur}}</td>
                            <td class="px-4 py-3 text-sm">
                                <SecondaryButton @click="openModalView(servicios)">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </SecondaryButton >
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <WarningButton @click="openModalForm(2,servicios)">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </WarningButton>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <DangerButton @click="openModalDelete(servicios)">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </DangerButton>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>







        <Modal :show ="showModalView" @close="closeModalView">
            <div class="p-6">
                <p>ID del servicio: <span class="text-lg font-medium text-gray-900">{{ v.idsertur }}</span></p>
                <p>Nombre del : <span class="text-lg font-medium text-gray-900">{{ v.nomsertur }}</span></p>
                


                <!-- Los guias -->
                <p>Guias Turísricos que realizan esta actividad: <span class="text-lg font-medium text-gray-900">
                    <ul class="ml-10 list-disc"> <!-- ml-10 el numero funciona como tabulador o espaciado -->
                        <!-- actividad es solo una variable par6a el ciclo for -->
                        <li v-for="centros in v.centrosturist" :key="centros.idcentur" > 
                            {{ centros.nomcentur }}
                        </li>
                    </ul>
                </span></p>




            </div>
            <div class="m-6 flex justify-end">
                <SecondaryButton @click="closeModalView">Cerrar</SecondaryButton>
            </div>
        </Modal>


        <Modal :show ="showModalForm" @close="closeModalForm">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">{{title }}</h2>
                <div class="mt-6 mb-6 space-y-6 max-w-xl">

                    <InputGroup :text="'Servicio'" :required="'required'" v-model="form.nomsertur" type="text">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                        </svg>
                        
                    </InputGroup>
                    
                    <InputError :message="form.errors.nomsertur" class="mt-2"></InputError>
                    
                    <PrimaryButton @click="guardar" >
                        Guardar
                    </PrimaryButton>

                </div>
            </div>
            <div class="m-6 flex justify-end">
                <SecondaryButton @click="closeModalForm">Cerrar</SecondaryButton>
            </div>
        </Modal>


        <Modal :show ="showModalDelete" @close="closeModalDelete">
            <div class="p-6">
                <p class="text-2xl text-gray-500">
                    Estas seguro de eliminar el servicio turístico: 
                    <span class="text-2xl font-medium text-gray-900">{{ v.nomsertur }}</span> ?</p>

                    <!-- Una forma de eliminar (es necesario hacer una función función "deleteActividad" que se relaciones con el controlador)-->
                     <!-- se pasa el parametro actividad a openModalDelete -->
                    <PrimaryButton @click = "deleteServicios">
                        Si, Eliminar
                    </PrimaryButton>



                    <!-- Una forma de eliminar (sin necesidad de hacer uan función "deleteActividad")-->
                     
                    <!-- <PrimaryButton @click ="form.delete(`/actividadturist/${v.idacttur}`, {
                        onSuccess: () => {
                            ok('Actividad eliminada con éxito');
                        },
                    })" class="mt-6 bg-red-600 hover:bg-red-700 focus:border-red-700 focus:ring-red-700">   

                        Si, Eliminar
                    </PrimaryButton> -->
            </div>
            <div class="m-6 flex justify-end">
                <SecondaryButton @click="closeModalDelete">Cerrar</SecondaryButton>
            </div>
        </Modal>











    </AuthenticatedLayout>
</template>