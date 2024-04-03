<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Costumers
            </h2>
        </template>

        <div class="py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="card bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="card-body bg-white">
                        <div class="card-header flex justify-between items-center mb-4">
                            <div class="float-left">
                                <h2 class="text-2xl font-bold" >Costumers</h2>
                            </div>
                            <div class="float-right">
                                <a class="btn btn-success mr-4" :href="route('clientes.createapi')">
                                    Get From API
                                </a>
                                <a class="btn btn-primary" :href="route('clientes.create')">
                                    New
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
                                    <th>Details</th>
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
                                    <td class="text-center">
                                        <button @click="toggleDetails(cliente)"><i class="fa fa-plus"></i></button>
                                        <table v-if="isShowDetails(cliente)">
                                            <thead>
                                                <tr>
                                                    <th>City</th>
                                                    <th>Street</th>
                                                    <th>Suite</th>
                                                    <th>Company</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="address in cliente.address" :key="address.id">
                                                    <td>{{ address.city }}</td>
                                                    <td>{{ address.street }}</td>
                                                    <td>{{ address.suite }}</td>
                                                    <div v-for="company in cliente.company" :key="company.id">
                                                        <td>{{ company.name }}</td>
                                                    </div>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>

                                    <td>
                                        <a class="btn btn-sm btn-info mr-2 mb-2" :href="route('clientes.show',cliente.id)"><i class="fa fa-fw fa-eye"></i> {{ ('Show') }}</a>
                                        <a class="btn btn-sm btn-warning px-4" :href="route('clientes.edit',cliente.id)"><i class="fa fa-fw fa-edit"></i> {{ ('Edit ') }}</a>
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
        data() {
            return {
                expandedDetails: {},
            };
        },
        props:{
            clientes: Array,
        },
        methods: {
            toggleDetails(cliente, type = 'address') {
                this.expandedDetails[cliente.id] = this.expandedDetails[cliente.id] || {};
                this.expandedDetails[cliente.id][type] = !this.expandedDetails[cliente.id][type];
            },
            isShowDetails(cliente, type = 'address') {
                return this.expandedDetails[cliente.id] && this.expandedDetails[cliente.id][type];
            },
        },
    }
</script>
