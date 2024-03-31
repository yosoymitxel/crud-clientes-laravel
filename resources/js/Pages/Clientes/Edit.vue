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
                                    <div class="col-md-12">

                                        <div class="form-group mb-2 mb20">
                                            <label for="name" class="form-label">{{ ('Name') }}</label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $cliente?->name) }}" id="name" placeholder="Name">
                                            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                                        </div>
                                        <div class="form-group mb-2 mb20">
                                            <label for="username" class="form-label">{{ ('Username') }}</label>
                                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username', $cliente?->username) }}" id="username" placeholder="Username">
                                            {!! $errors->first('username', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                                        </div>
                                        <div class="form-group mb-2 mb20">
                                            <label for="email" class="form-label">{{ ('Email') }}</label>
                                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $cliente?->email) }}" id="email" placeholder="Email">
                                            {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                                        </div>
                                        <div class="form-group mb-2 mb20">
                                            <label for="phone" class="form-label">{{ ('Phone') }}</label>
                                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $cliente?->phone) }}" id="phone" placeholder="Phone">
                                            {!! $errors->first('phone', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                                        </div>
                                        <div class="form-group mb-2 mb20">
                                            <label for="website" class="form-label">{{ ('Website') }}</label>
                                            <input type="text" name="website" class="form-control @error('website') is-invalid @enderror" value="{{ old('website', $cliente?->website) }}" id="website" placeholder="Website">
                                            {!! $errors->first('website', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                                        </div>

                                    </div>
                                    <div class="col-md-12 mt20 mt-2">
                                        <button type="submit" class="btn btn-primary">{{ ('Guardar') }}</button>
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
        },
        data(){
            return{
                name        = this.cliente.name,
                username    = this.cliente.username,
                email       = this.cliente.email,
                phone       = this.cliente.phone,
                website     = this.cliente.website
            }
        }
    }
</script>
