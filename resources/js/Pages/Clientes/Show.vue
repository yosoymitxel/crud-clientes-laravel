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
                                        <span class="card-title">{{ ('Datos del Cliente No: '+cliente.id) }} </span>
                                    </div>
                                    <div class="float-right">
                                        <router-link :to="{name: 'edit', params: { id: cliente.id }}" class="btn btn-success">Edit</router-link>
                                        <a class="btn btn-primary btn-sm" :href="route('clientes.index')"> {{ ('Back') }}</a>
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
