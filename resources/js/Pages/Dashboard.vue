<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import {Bar} from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'
ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)
import { ref } from 'vue';
import { Pie } from 'vue-chartjs';
import { ArcElement } from 'chart.js';

ChartJS.register(ArcElement);


const props = defineProps({
  centrosturist: { type: Array, default: () => [] },       // <-- coleccion
  centrosturist_count: { type: Number, default: 0 },       // <-- conteo para el card
  guiasturist: {type: Array, default: () => [] },
  guiasturist_count: { type: Number, default: 0 }, 
  actividadturist: { type: Number, default: 0 },
  serviciosturist: { type: Number, default: 0 },
  producto: { type: Number, default: 0 },
});

//grafica 1
const centros = ref([]);
const actividades = ref([]);
const chartData1 = ref(null);
const chartOptions1 = ref(null);
const colores = ref([]);


//grafica 2
const labelsPie = ref([]);
const dataPie = ref([]);
const colorsPie = ref([]);
const chartData2 = ref(null);
const chartOptions2 = ref(null);


const random = () => Math.floor(Math.random() * 255);


const generarGrafica1 = () => {
  centros.value = props.centrosturist.map(c => c.nomcentur);
  actividades.value = props.centrosturist.map(c => c.actividadturist.length);
  // colores.value = props.centrosturist.map(() => `rgba(${random()}, ${random()}, ${random()}, 0.7)`);
  // neecesitamos un solo color para las barras que sea azul bg-blue-100
  colores.value = props.centrosturist.map(() => `rgba(59, 130, 246, 0.7)`); // azul
  chartData1.value = {
	labels: centros.value,
	datasets: [
	  {
		label: 'Número de Actividades por Centro Turístico',
		backgroundColor: colores.value,
		data: actividades.value,
	  },
	],
  };
  chartOptions1.value = {
	responsive: true,
	maintainAspectRatio: false,
	scales: {
	  y: {
		beginAtZero: true,
		stepSize: 1,
	  },
	},
  };
};


const generarGrafica2 = () => {
  const labels = [];
  const values = [];

  props.guiasturist.forEach(g => {
    const nombre = g.nomguiatur || g.nomresguiatur || g.nombre || g.name || 'Guía sin nombre';

    let count = 0;
    if (Array.isArray(g.actividades)) count = g.actividades.length;
    else if (Array.isArray(g.actividadturist)) count = g.actividadturist.length;
    else if (Array.isArray(g.activities)) count = g.activities.length;
    else if (typeof g.actividades_count === 'number') count = g.actividades_count;
    else if (typeof g.activities_count === 'number') count = g.activities_count;

    labels.push(nombre);
    values.push(count);
  });

  labelsPie.value = labels;
  dataPie.value = values;
  colorsPie.value = labelsPie.value.map(() => `rgba(${random()}, ${random()}, ${random()}, 0.7)`);

  chartData2.value = {
    labels: labelsPie.value,
    datasets: [
      {
        label: 'Actividades por Guía Turístico',
        data: dataPie.value,
        backgroundColor: colorsPie.value,
      },
    ],
  };

  chartOptions2.value = {
    responsive: true,
    maintainAspectRatio: false,
  };
};




generarGrafica1();
generarGrafica2();

</script>


<template>
	<Head title="Dashboard" />

	<AuthenticatedLayout>
		<template #header>
			Dashboard
		</template>
		
		<div class="p-4 bg-white rounded-lg shadow-xs">
			<div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-5">
              <!-- Card -->
              <div class="flex border items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                  <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEG0lEQVR4nO1ZW0hVQRRdmpVlT8EbZS8iDHpQVJBCBZX2ZY+PHgQVRfUR2pf4FdnjQ/rI6KsXREQkEVSfRQk9LItKi6SkFMoeHz1MSS2N7MaONbAZzz333nM9F0+4YDjDvjP7zJrZs2afucAABtDvkALgNksqAoylAMIsKxBgnFJEKhFQDAHQQhI9AH4CyEQAsZYk6gBcZ30PAohLHHwJgPWsP0vA33AAhwA0Aejm8wCAYfARoxlKElLZDLMvJLPQgz8ZbI3ab2FV7vtJZjtfUqVsR2k77sHfQfZ9Q/XLAJAP4C3t++ETqvgCIWQwm7Y2DzPYxL7LLXs+7Y3wAdlKpSTENB7yxVvi9NnNfiMs+0jau+ADSuhcNruNXfztlscVsQ/VAtpfo4/SkLsA7gFIp9yK8zUObWUGOwD8ATBd2SV9qXZJZQ7Qp+yJfK5MgdojZX1BJFcpyBU+W6hUTjjLNuXKtlr5KHToM4zq5KRa1ZzAhFHh4PykS/vFbPMRQBptN1VfOTydkE51auSeaeRKpPdVWDWrAZjBLInSr0HN/kyGmoRcJ+s5SDJyOaB3XH7ZJ3dI0A2l7HeV54rUTwA4zfoxJBkVfLEcdvFgHIBfLGbzy8rMVWeNLbW+IUWF1SIP/a+qULyh7Hdo240kIU+FVbRQckKhIrJK2TfQ9sKjX89hJU8vSKNyhalkBoMBfKB9WRz+QgBqWaSelLAyKKePM5a9jPbLMfrJAvBcrbCo4vhkhJXBNCW9o5Q9xPzpN4CpcZIIx0Mm0bDSuEVfOy37BYcMwIYQrmc789T1ercw02El50ii2ExfDyKs+meX0/uxNWBDRBN8FO0QbO4jVZGDtJU+Z1m/PaF9a4S+D9jGzLohAtqeOEyQL2FlcDzCwbot2qwq2CuSFLWysYA+vwIYquxS/xTD+7LiVS0TVj+YD8mh1c7ykmn8DkuBYsVT+l5n2Q/Tfj5Cv5C10fWGD8WTsjuVVqbccoUTK4rZ95pln0IZ7nIYWMiLag3muWG+kY/xaieDCd4MxrRO5yUMN8Z4gZ3J73wZ9KQIedleFxKRVKsXmSPqg2helEHlKcWR8oqDkFRkgsstSiXb74twW/JefYzZ0uukWr0kOIczJV9m8xEbUrlCjTGGoy6dzIjLePqncA/qPWRLr03EUYIrErhcE0Ir6aOG4dkZB6kefufvj+EGJmwR6QUjbRIyfiODq1DAiWtTAmIGOscrke9s4EVWE8VEdXNpykmvRKI28BmimBfVODoAjAkiEcEgAOfUWC4wI5BLv0ARAdWrlJcWbgLRQaUqti8K+wsRg8lUwQamS26k6nh29Usi0SBJ5CZ1N1xrViZoRLTimQuOIk1kLEukC+r+iCKO/d/pHv4PSrsQ+eZSzL9JQSgDGAB8wF/8XB8QjLxi/AAAAABJRU5ErkJggg==" alt="national-park">
                </div>
                <div>
                  <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Total de Centros Turísticos
                  </p>
                  <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
					{{ centrosturist_count }}
                  </p>
                </div>
              </div>
              <!-- Card -->
              <div class="flex border items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                  <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAADe0lEQVR4nO2ZW4hNURjHf25n3O8PLmFSbqUpUm5Donhwy5siNYmZpyke5IHigUEShfAkDx5ckweUiOSSiUgJ5ZI5426aTHIbo6X/ruU4++y9zz571lZ+tWou3/rW/9t7rW99a234jy9jgU3AZeA18BX4BNwDNgP9STlDgGPAT6CtQDPBTSKlTJJAI7QFOALM19vpAfQBZgAnZNMMHAUWAx1ICSOAdxJ4BRgeYL8n5w1dVKDOOStBV4HOIew7ASOB1cB79T2HY0ZrTbRojURllBKBCWY2DtkuEYdK4GMXDrkoEXNj+JhtTU1nvJSI8pjJwvh4jEM+SkS3GD6GycczHPJcIgbH8DFBPupxyB2JqIjhY4l8nMIhByWiJoaPHfKxDoeskIjjMXxcl49KHLJUIppC7uq5mEr4m3xMxiG3JGJtkf1NubJNPkyh6YysRJhSo1imy4c5vzjjvESYKVYsq+XjMA6ploinwJoi+m8EXsjHchzSBTgtIQ8i9u2oysBUzyeLTBYlpYPOFa1Avwj9JuoB3CdFnJSo2gh9dqvPTlLEAoky1XDPEPZDrQPVeFJER+CmhJ0BygrY9tXZvk23LqljHPA5RDVcIZu3wCBSSlYizRnDjzGyeUiKaZbIAQVsymVjzjKpZKz2hK+qofwYqEC+xDwiJ0Kldncj8EAIe28TfaJayzlTdPXZat009grRb4B1DmmVj6m0M2U6UN3Oc0Ed5RKiW57+9UAV0DVB/b83uvXAG2tgs7j3Wb9Hxeu310oUbbpL3gD0LvVmV2tdVHv1UY01jeIG4j2oauCu9fcPOrQVSh6hME/kguX4GjAvQFAU/PrN0c2j9/9LEQvSPzDz9IYcvQIWRRBUBzSqTLdbVsVip5APYKHG9tZP92IC2WelyKBvHjZVAV+sTFsZwd9waQib2v8qI75r0zIbXSEyulFvzBG7StPBbstybLJ6e8ZHIcZpo/2hn0Oz1comQXi3IHZr8knFJnE8ymNvxgtiv2y3RAnE2yNmRigUp1H8DYrxEcQs2ZorqNA0qVOYT8l+C9aeclm9uUyMjNffetuhiZJO/WzzTbltCY3lSymc5y5+L40nMZYvpXDurR27NSQ0VrtPrbqExvKlFM4zCiZbosWeeCDeFJpe5IHMb8q1eyB1IUqSoLYlDYFkFEy+xR3UGhREJqlA+Nf4BdDKhKBBYT2QAAAAAElFTkSuQmCC" alt="tourist-male">
                </div>
                <div>
                  <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Total de Agencias Turísticas
                  </p>
                  <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ guiasturist_count }}
                  </p>
                </div>
              </div>
              <!-- Card -->
              <div class="flex border items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                  <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAADcUlEQVR4nO2YaYiNURjHf7ax11iylp3kC2IsnyyDkEaaZIqUlOxbiRKJUhRFssQnyZIP1i/4INFYkj2hLIOxZV9ihKuj/6mnt3vve++dLqPOr07vfc/2nuecZzsXAoFAIBAIBAL/C/WBWUA58BI4B4zmP6IBMBd4AiQi5QcwgRpOQ2A+UGkWfhUoBVoDq1X3BmhFDVWhGcBTI8ANYCJQK9L3mNr3UgMFqDQCXE8hgKcj8El9S/jHNAYWAM+MANdiBLAs1pgKoCn/iEnAKyPABWBsir7tgQ3AQ2Cyqa8DXNL4zTHf6wTskOP4rud21edMmRGgPI0r7QHsAqpM/w9AO9Ontxb2ExiUYp5RwMckni+h+pG5CnJTk8xO0d4POKjFeVe7Hzild/fbslb1bt6CSFtnI8QRoL9U2j2Pms1xNpc1X4FfMnLLcOCk2a1vUoduau8AfFab22Ubb+6qfkVkTjfeC5EML8y2XAS5rMFLgSYKbBcjx70eaJtk7BL1uScBPEO1OU74nqbeB1N3yskoMg4ja8bro1F9denHcqAwzdh6wC31Xxlp26n6s0Bt1Xn7chuWjKbm9HOiRB7nPXBeqUijmDGNZA9VKdSl0Ljymap7nOGJPOIvUaKPJeQEnO43S9KvVH3ey207F5vORnyGsDXP6//jdbxBunIFGBgz5pD6HlKc+Kj3ozqBJnoeM17LOZK8UCB7+WJ2eJ6CYBzt1d+NG6M48SFFHHH1I/IlRDFwx3xsD9AmyzkWauwJvXeUi62QjVVInfJyEi5i7zMC3AaG5ThXS83xurqLOqsEsFcGfesqefTH79RpWZIonQ0tjEpWi3JN9FmLdP4/GYN1afKncDjXdEF0BaYDx42H+6lsolJpzAFt1BBtYuwtb3tETcqMQC2UEPrA+AAYl+Pii5QJPEhh0Ik05Z0uZ6PjHEmxLkl+oLv9bZLu+oi6RoJnSoF2c6NSe7swd/3drT8riuTBGqo4G+wLTAO2mPzMFxen5qRbi5N0irk72HJGHqZYaXtr5VBusc2BLsAAYKqi+knjkn15Jg80IhNVidAdWBXZkBfAojgbHaCc6HkOauDLL53yOtmYz6uqQx1d9qy9utQpFneV7SMVcLZyGrgPvNVFqUrqd18nuVcp+gS51nxRS+nQbf1/FggEAoFAIBAIkJbfur8/Ghl9WggAAAAASUVORK5CYII=" alt="swimming">
                </div>
                <div>
                  <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Total de Actividades Trísticas
                  </p>
                  <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ actividadturist }}
                  </p>
                </div>
              </div>
              <!-- Card -->
              <div class="flex border items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                  <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAACXBIWXMAAAsTAAALEwEAmpwYAAAED0lEQVR4nO2ZXWhURxTHf3bTJtQW2sakVtom0ipBlAQfWrQ1D/14FCroY4riQ1MkTz4oih8UHwKCoFKKj36UpRFBsCDSiiRrbP1oSxNtGkV9aYJSW/yIWpW6MnAGDsPd3bu79969SeYPA3fvOTNz5j/n/GduAh4etUIGOAn8KM/TDp8DeWldTDNkgD8VAVeAOqbh7l+Wlpd3UxptQDeQBW6rRVsybovtC/GdUuI1oNLdtjPSPyPPrr0/xngSF6+zqs+WAjvcJjbr93OM8SQuXk3AkPQZAd4o4DOsfGbHGE9NxKtZLdBkRKEsGRYy4o4nNNpEmKIQr/elz1iAbUxs76VJTPsLiFedpN9PZYpXt/j0ScAj0szzYbGZwMsV00rjiUy8toYUr6z4PAkI1L7LJhhPWXU7LL9L+RSrX5vmtm5t6tr6Ne2vBONJXLxOAZdk0frMzqiS+CHBeEIjCvGKEonH012leEWNxOPJVileLl4CeqT2R2VBDTWMpySqFS+LN4Fe4N+AwG8Am4FXE4wnNKoVr8XAIeCxCjAHrABWAefV+3vALuCtGONJBM8BnwDH1OL+l99LAvw/FNtT8TVkHQAWMsnwIvCl1HZeXU93Am+Lz0xgnfiMimBZDegAvlW1bAj5Hugk5Xgd2A7cUgu/DmwAXiniY9tNsb0mvq3AbmBC+fwSkPY1RzuwH3jk3M9XqkCDfLQGXFDv70i2zJG+s4SYv5WP+QReC9TXatEzVH0/der7gyJ1bX2WBozp+j4SDVgg9nrZ/dGArAlzckSCegniogriLrAPmC8+L4jPsONj0rklxBztsvAnBUgz4rocOBcwvjlmY0Gz1PK4mnTcYb9JfMaK+JSDubKo+2q807J4k4E6a/IFsqZqzJcgHgQI0fPi825AoL86PtWgSUj8R40/5IzfUSJrysYy4IRTu0eEcYuP5HjSPkdjPK5eBtbLDU+fMj1y9NrN+AZ4qHzMH1E+LmeiLrUocyvbA7yj6tvYf1MTmJ3/GphHMjAxrAH+UDGYE2Ib0KiO2x3OlXt12AmuSodedX6bGt7osG/qe5OaNGkYMfzM+Z/ChCO2Jmu+Etu1sAPflw6tsvN7JRPsJL8Lm2Yn0oJOpxztNXqRZKYlJxT6lKLaAU07DnxKumEWfND56LLNXK9DoVFdSO6oASwGndscKbS1qPf/Ad+pcg6NBjlvXQJyjsKSUpsbd8XIRzVQwvAE4AkgFgIGUyJ0pWyxEZBLkdB5ESwCTwApI2Aw4HZWqOWmogjmy2xRzZcaEcyHDCjp+UoiqoEqJSDu+UrCE4AngEpbLgICyjk9iolpTQgYiICAXFoIYLqXQLXwBOAJwBNA+uYrCU8Ak7tVjVwKFlFpcz+QPDw8PDxQeAZvk4bkkvc5cgAAAABJRU5ErkJggg==" alt="3-star-hotel">
                </div>
                <div>
                  <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Total de Servicios Trísticas
                  </p>
                  <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ serviciosturist }}
                  </p>
                </div>
              </div>
              <div class="flex border items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                  <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAABdklEQVR4nO2YUW6DMAyG/yduMLSzrHegp+porzWUC5SHXgB2jUyTghTRJE1iDK7kX0JqbMvkg8QuAVQqVak6ADMAS7xml4s7b1Rb3Gy5ph3yRrUEU7XOw5U3K9AAGAIxOXZRIAOAn0BMjl0UCEViQUzhMhMLMhQuM7EgpRIFYrRqQRYIRWJBjFYtYSClEgVitGpBFghFh4NMXvBbf1h1G8FMq0/SM1Ne1duo2/C04385LToz5Y1KT1Fe5PHHHwDubvwA8Flgt7nz8wMbADcAv+6J9s6GDH8MpAUwut+jG6PAbmtAroHX+u3FpvwxEApEWwuyrOsvACdvsyHDHwOhQIAKcvImGtrAIX/qjdRCtLUgfWDpXLzYlD+1R2ohRspm792Tn9wk15s95k9VLSqELQWhSFTVokhU1WoY+sghVevK1Ed2r1ozQx85pGrNDH1kCwgrpY/sXrUahj5ySNWiKFW1Sv+6Pzx79vz0FAXPN9NTFJUKMvQHjBgyjDhawHEAAAAASUVORK5CYII=" alt="categorize">
                  </div>
                  <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                      Total de Categorías Turísticas
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                      {{ producto }}
                    </p>
                  </div>
                </div>
              </div>


			    <div class="min-w-1 p-0 rounded-lg shadow-xs">
						<Bar :data="chartData1" :options="chartOptions1" ></Bar>
					</div>
        <div class="min-w-0 p-0 rounded-lg shadow-xs" style="height: 360px;">
          <Pie :data="chartData2" :options="chartOptions2" />
        </div>

      


		</div>
	</AuthenticatedLayout>
</template>