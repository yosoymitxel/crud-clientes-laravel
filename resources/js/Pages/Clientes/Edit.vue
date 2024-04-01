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
                                            <input type="text" name="name" id="name" v-model="cliente.name" class="border border-gray-300 rounded-md p-2">
                                        </div>

                                        <div class="flex flex-col gap-2">
                                            <label for="username" class="font-medium">Nombre de usuario:</label>
                                            <input type="text" name="username" id="username" v-model="cliente.username" class="border border-gray-300 rounded-md p-2">
                                        </div>

                                        <div class="flex flex-col gap-2">
                                            <label for="email" class="font-medium">Correo electrónico:</label>
                                            <input type="email" name="email" id="email" v-model="cliente.email" class="border border-gray-300 rounded-md p-2">
                                        </div>

                                        <div class="flex flex-col gap-2">
                                            <label for="phone" class="font-medium">Teléfono:</label>
                                            <input type="text" name="phone" id="phone" v-model="cliente.phone" class="border border-gray-300 rounded-md p-2">
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
                name: '{{ cliente.name }}',
                username: '{{ cliente.username }}',
                email: '{{ cliente.email }}',
                phone: '{{ cliente.phone }}',
                website: '{{ cliente.website }}',
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
                                console.error('Error: Invalid JSON response received.');
                                // Handle invalid JSON appropriately (e.g., show error message to user)
                                return; // Exit the function if response is not valid JSON
                            }

                            // Extract status and data
                            const status = response.status;
                            const data = response.data;

                            console.log('Status:', status);
                            console.log('Data:', data);

                            // Handle success or error based on status code
                            if (status >= 200 && status < 300) {
                                // Success! Data contains the updated cliente information
                                // ... (use the data for further processing)
                                console.log('Se ha modificado')
                            } else {
                                // Error handling for non-2xx status codes
                                console.error(`Error: API request failed with status ${status}`);
                                // Handle API errors appropriately (e.g., show error message to user)
                            }
                        })
                        //.then(() => router.push({ name: 'home'}))
                }
                catch(err){
                    //error.value = err.message
                    console.log(err.message)
                }
            }

        }
    }
</script>
