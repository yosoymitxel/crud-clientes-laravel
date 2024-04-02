<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Importar Clientes desde API
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header flex justify-between items-center mb-4">
                                    <div class="float-left">
                                            <h2 class="text-2xl font-bold">Importar Clientes desde API</h2>
                                    </div>
                                    <div class="float-right">
                                        <a class="btn btn-info" :href="route('clientes.index')"> {{ ('Back') }}</a>
                                    </div>
                                </div>

                                <div class="card-body bg-white text-center">
                                    <h2 class="mb-2">Obtener datos automáticamente...</h2>
                                    <button @click="fetchUsers" class="btn btn-success">
                                        Agregar desde API
                                    </button>
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
            cliente: Object,
        },
        methods: {
            async fetchUsers() {
                 Swal.fire ({
                    title: "¿Quieres cargar los datos?",
                    showCancelButton: true,
                    confirmButtonText: "Cargar Nuevos Datos",
                }).then(async (result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        try {
                            const response = await axios.get('https://jsonplaceholder.typicode.com/users');
                            this.users = response.data;
                            console.log(response.data)
                            let successfulInsertions = 0;
                            let errors = [];

                            for (const user of response.data) {
                                try {
                                    const submitResponse = await this.submitUser(user);
                                    successfulInsertions++;
                                } catch (error) {
                                    errors.push(error);
                                    console.error('Error creating user:', error.response.data);
                                }
                            }

                            // Process is finished
                            Swal.fire({
                                title: "Procesado",
                                text: `Finished processing users. Successfully inserted ${successfulInsertions} users.`,
                                icon: "question"
                            });
                            if (errors.length > 0) {
                                console.error('Encountered errors during insertion:', errors);
                                // Handle errors (e.g., display notification to the user)
                            }
                        } catch (error) {
                            console.error('Error fetching users:', error);
                        }
                    } else if (result.isDenied) {
                        Swal.fire("Changes are not saved", "", "info");
                    }
                });


            },

            async submitUser(user) {
                const response = await axios.post('/api/clientes', user);
                return response; // Return the response for success tracking
            },
        },

    }
</script>
