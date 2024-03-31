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
                    <tr v-for="(cliente, i) in clientes" :key="i">
                        <td>{{ ++i }}</td>

                        <td>{{ cliente.name }}</td>
                        <td>{{ cliente.username }}</td>
                        <td>{{ cliente.email }}</td>
                        <td>{{ cliente.phone }}</td>
                        <td>{{ cliente.website }}</td>

                    </tr>
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
