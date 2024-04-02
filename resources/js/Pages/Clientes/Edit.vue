<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Detalle de un Cliente
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                                    <div class="float-left">
                                        <span class="card-title">{{ ('Modificar datos del Cliente No: '+cliente.id) }} </span>
                                    </div>
                                    <div class="float-right">
                                        <a class="btn btn-primary btn-sm" :href="route('clientes.index')"> {{ ('Back') }}</a>
                                    </div>
                                </div>

                                <div class="row padding-1 p-1">

                                    <form @submit="onSubmit" method="POST" class="flex flex-col gap-4 p-4">

                                        <h2 class="text-2xl font-bold">Editar Cliente</h2>

                                        <div class="flex flex-col gap-2">
                                            <label for="name" class="font-medium">Nombre:</label>
                                            <input type="text" name="name" id="name" v-model="cliente.name" required class="border border-gray-300 rounded-md p-2">
                                        </div>

                                        <div class="flex flex-col gap-2">
                                            <label for="username" class="font-medium">Nombre de usuario:</label>
                                            <input type="text" name="username" id="username" v-model="cliente.username" required class="border border-gray-300 rounded-md p-2">
                                        </div>

                                        <div class="flex flex-col gap-2">
                                            <label for="email" class="font-medium">Correo electrónico:</label>
                                            <input type="email" name="email" id="email" v-model="cliente.email" required class="border border-gray-300 rounded-md p-2">
                                        </div>

                                        <div class="flex flex-col gap-2">
                                            <label for="phone" class="font-medium">Teléfono:</label>
                                            <input type="text" name="phone" id="phone" v-model="cliente.phone" required class="border border-gray-300 rounded-md p-2">
                                        </div>

                                        <div class="flex flex-col gap-2">
                                            <label for="website" class="font-medium">Sitio web:</label>
                                            <input type="text" name="website" id="website" v-model="cliente.website" class="border border-gray-300 rounded-md p-2">
                                        </div>

                                        <button type="submit" class="bg-blue-500 text-white rounded-md p-2 font-medium">Actualizar</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="modal-content" class="fixed z-10 inset-0 overflow-y-auto " v-if="showComponent">
            <div class="flex items-center justify-center min-height-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <h5 class="text-xl font-medium leading-tight text-gray-900 mb-2" id="modal-headline">
                            {{ tituloModal }}
                        </h5>
                        <p class="text-sm text-gray-500">
                            {{ mensajeModal }}
                        </p>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button id="closeButton" type="button" @click="handleCloseClick" class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
<script>



    export default {
        components: {
            AppLayout

        },
        props:{
            cliente: Object
        },
        data() {
            return {
                showComponent: false,
                mensajeModal: '',
                tituloModal: ''
            }
        },

        methods: {
            onSubmit(e) {
                e.preventDefault();

                // Enviar datos al servidor para actualizar el cliente
                // ...

                // Actualizar la lista de clientes localmente
                // ...
                let id = this.cliente.id;
                console.log(this.$router)
                try{
                    const response =  axios.put(`${window.location.href.split("//")[0]}/api/clientes/${ id }`,
                        {
                            name: this.cliente.name,
                            username: this.cliente.username,
                            email: this.cliente.email,
                            phone: this.cliente.phone,
                            website: this.cliente.website,
                        })
                        .then((response) => {
                            // Validate response as JSON
                            if (typeof response.data !== 'object' || response.data === null) {
                                console.error(response.data);
                                // Handle invalid JSON appropriately (e.g., show error message to user)
                                this.mensajeModal =  'Error JSON'
                                this. tituloModal = 'Invalid JSON response received.'
                                this.showComponent = true;
                                return; // Exit the function if response is not valid JSON
                            }

                            // Extract status and data
                            console.log(response)
                            const status = response.status;
                            const data = response.data;
                            const statusText = response.statusText;

                            console.log('Status:', status);
                            console.log('Data:', data);

                            // Handle success or error based on status code
                            if (status >= 200 && status < 300) {
                                // Success! Data contains the updated cliente information
                                // ... (use the data for further processing)
                                console.log('Se ha modificado')

                                this.tituloModal =  statusText
                                this.mensajeModal  = 'Se ha modificado correctamente'
                            } else {
                                // Error handling for non-2xx status codes
                                this.tituloModal =  statusText
                                this.mensajeModal  = `Error: API request failed with status ${status}`
                                // Handle API errors appropriately (e.g., show error message to user)
                            }

                            this.showComponent = true;
                        }).catch(function (error) {
                            this.tituloModal =  'Error'
                            this.mensajeModal  = error.message
                            this.showComponent = true;
                        })
                        //.then(() => router.push({ name: 'home'}))
                }
                catch(err){
                    //error.value = err.message
                    this.tituloModal =  'Error'
                    this.mensajeModal  = err.message
                    this.showComponent = true;
                    // Handle API errors appropriately (e.g., show error message to user)
                }


            },
            handleCloseClick() {
                this.showComponent = false;
            },

        }

    }

</script>
