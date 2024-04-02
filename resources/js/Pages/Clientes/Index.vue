<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Clientes
            </h2>
        </template>

        <div class="py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="card-body bg-white">
                        <div class="card-header flex justify-content-between align-items-center mb-4" style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="float-left">
                                <h2 class="text-2xl font-bold">Informe Cliente</h2>
                            </div>
                            <div class="float-right">
                                <a class="bg-green-500 text-white rounded-md shadow-md p-2 text-sm font-medium mr-4" :href="route('clientes.index')">
                                    Obtener de API
                                </a>
                                <a class="bg-blue-500 text-white rounded-md shadow-md p-2 text-sm font-medium" :href="route('clientes.create')">
                                    Nuevo
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Website</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(cliente, i) in clientes" :key="i">
                                    <td>{{ ++i }}</td>

                                    <td>{{ cliente.name }}</td>
                                    <td>{{ cliente.username }}</td>
                                    <td>{{ cliente.email }}</td>
                                    <td>{{ cliente.phone }}</td>
                                    <td>{{ cliente.website }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary " :href="route('clientes.show',cliente.id)"><i class="fa fa-fw fa-eye"></i> {{ ('Show') }}</a>
                                        <a class="btn btn-sm btn-success" :href="route('clientes.edit',cliente.id)"><i class="fa fa-fw fa-edit"></i> {{ ('Edit') }}</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
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
            clientes: Array,
        }
    }
</script>
