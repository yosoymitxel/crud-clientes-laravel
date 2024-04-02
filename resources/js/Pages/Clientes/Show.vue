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
                                <div class="card-header flex justify-between items-center mb-4">
                                    <div class="float-left">
                                        <h2 class="text-2xl font-bold">Datos de Cliente</h2>
                                    </div>
                                    <div class="float-right">
                                        <a class="btn btn-sm btn-warning mr-2" :href="route('clientes.edit',cliente.id)">
                                            <i class="fa fa-fw fa-edit"></i> {{ ('Edit') }}
                                        </a>
                                        <a class="btn btn-info" :href="route('clientes.index')"> {{ ('Back') }}</a>
                                    </div>
                                </div>

                                <div class="card-body bg-white">
                                    <div class="form-group mb-2 mb20">
                                        <strong>Nombre:</strong>
                                        {{ cliente.name }}
                                    </div>
                                    <div class="form-group mb-2 mb20">
                                        <strong>Username:</strong>
                                        {{ cliente.username }}
                                    </div>
                                    <div class="form-group mb-2 mb20">
                                        <strong>Email:</strong>
                                        {{ cliente.email }}
                                    </div>
                                    <div class="form-group mb-2 mb20">
                                        <strong>Teléfono:</strong>
                                        {{ cliente.phone }}
                                    </div>
                                    <div class="form-group mb-2 mb20">
                                        <strong>Web:</strong>
                                        {{ cliente.website }}
                                    </div>

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
        }
    }
</script>
