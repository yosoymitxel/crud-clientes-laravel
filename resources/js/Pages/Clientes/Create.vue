<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                New Costumer
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="row padding-1 p-1">
                                    <form @submit="onSubmit" method="POST" class="flex flex-col gap-4">
                                        <div class="card-header flex justify-between items-center mb-4">
                                            <div class="float-left">
                                                <h2 class="text-2xl font-bold">New Costumer</h2>
                                            </div>
                                            <div class="float-right">
                                                <a class="btn btn-primary btn-sm" :href="route('clientes.index')"> {{ ('Back') }}</a>
                                            </div>

                                        </div>

                                        <div class="flex flex-col gap-2">
                                            <label for="name" class="font-medium">Name:</label>
                                            <input type="text" name="name" id="name" v-model="cliente.name" required maxlength="255" class="border border-gray-300 rounded-md p-2">
                                        </div>

                                        <div class="flex flex-col gap-2">
                                            <label for="username" class="font-medium">Username:</label>
                                            <input type="text" name="username" id="username" v-model="cliente.username" required maxlength="255" class="border border-gray-300 rounded-md p-2">
                                        </div>

                                        <div class="flex flex-col gap-2">
                                            <label for="email" class="font-medium">Email:</label>
                                            <input type="email" name="email" id="email" v-model="cliente.email" required maxlength="255" class="border border-gray-300 rounded-md p-2">
                                        </div>

                                        <div class="flex flex-col gap-2">
                                            <label for="phone" class="font-medium">Phone:</label>
                                            <input type="text" name="phone" id="phone" v-model="cliente.phone" required class="border border-gray-300 rounded-md p-2">
                                        </div>

                                        <div class="flex flex-col gap-2">
                                            <label for="website" class="font-medium">Website:</label>
                                            <input type="text" name="website" id="website" v-model="cliente.website" maxlength="255" class="border border-gray-300 rounded-md p-2">
                                        </div>
                                        <div class="my-4">
                                            <h2 class="text-xl font-bold">{{ ('Company Details') }}</h2>
                                            <hr>
                                        </div>
                                        <div class="flex flex-col gap-2">
                                            <label for="company-name" class="font-medium">Company Name:</label>
                                            <input type="text" name="company.name" id="company-name" v-model="company.name" maxlength="255" class="border border-gray-300 rounded-md p-2">
                                        </div>

                                        <div class="flex flex-col gap-2">
                                            <label for="company-catchPhrase" class="font-medium">Company Slogan:</label>
                                            <input type="text" name="company.catchPhrase" id="company-catchPhrase" v-model="company.catchPhrase" maxlength="255" class="border border-gray-300 rounded-md p-2">
                                        </div>

                                        <div class="flex flex-col gap-2">
                                            <label for="company-bs" class="font-medium">Company Description:</label>
                                            <input type="text" name="company.bs" id="company-bs" v-model="company.bs" maxlength="255" class="border border-gray-300 rounded-md p-2">
                                        </div>
                                        <div class="my-4">
                                            <h2 class="text-xl font-bold">{{ ('Address Details') }}</h2>
                                            <hr>
                                        </div>
                                        <div class="flex flex-col gap-2">
                                            <label for="street" class="font-medium">Street:</label>
                                            <input type="text" name="address.street" id="street" v-model="address.street" required maxlength="255" class="border border-gray-300 rounded-md p-2">
                                        </div>

                                        <div class="flex flex-col gap-2">
                                            <label for="suite" class="font-medium">Suite (optional):</label>
                                            <input type="text" name="address.suite" id="suite" v-model="address.suite" maxlength="255" class="border border-gray-300 rounded-md p-2">
                                        </div>

                                        <div class="flex flex-col gap-2">
                                            <label for="city" class="font-medium">City:</label>
                                            <input type="text" name="address.city" id="city" v-model="address.city" required maxlength="255" class="border border-gray-300 rounded-md p-2">
                                        </div>

                                        <div class="flex flex-col gap-2">
                                            <label for="zipcode" class="font-medium">Zip Code:</label>
                                            <input type="text" name="address.zipcode" id="zipcode" v-model="address.zipcode" required maxlength="255" class="border border-gray-300 rounded-md p-2">
                                        </div>
                                        <button type="submit" class="bg-blue-500 text-white rounded-md p-2 font-medium">Save</button>
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
                cliente: {
                    name: '',
                    username: '',
                    email: '',
                    phone: '',
                    website: '',
                },
                company: {
                    name: '',
                    catchPhrase: '',
                    bs: '',
                },
                address: {
                    street: '',
                    suite: '',
                    city: '',
                    zipcode: '',
                },
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
                console.log({
                    name: this.cliente.name,
                    username: this.cliente.username,
                    email: this.cliente.email,
                    phone: this.cliente.phone,
                    website: this.cliente.website,
                })
                try{
                    const response =  axios.post(`${window.location.href.split("//")[0]}/api/clientes/`,
                        {
                            name: this.cliente.name,
                            username: this.cliente.username,
                            email: this.cliente.email,
                            phone: this.cliente.phone,
                            website: this.cliente.website,
                            company: {  // Add company data here
                                name: this.company.name,  // Assuming company data is in company
                                catchPhrase: this.company.catchPhrase,
                                bs: this.company.bs,
                            },
                            address: {   // Add address data here
                                street: this.address.street,
                                suite: this.address.suite,
                                city: this.address.city,
                                zipcode: this.address.zipcode,
                                // Add optional geo data if available:
                                geo: {
                                    lat: this.address.lat,
                                    lng: this.address.lng,
                                },
                            },
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
                                this.mensajeModal  = 'Costumer was created'
                            } else {
                                // Error handling for non-2xx status codes
                                this.tituloModal =  statusText
                                this.mensajeModal  = `Error: API request failed with status ${status}`
                                // Handle API errors appropriately (e.g., show error message to user)
                            }

                            this.showComponent = true;
                        }).catch( (error) => {
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
