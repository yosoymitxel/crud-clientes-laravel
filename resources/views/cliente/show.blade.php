
    <x-app-layout class="content container-fluid">
        <header class="p-4 bg-white dark:bg-gray-800 shadow mb-12">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Clientes') }}
            </h2>
        </header>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Datos del Cliente No: '.$cliente->id) }} </span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('clientes') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                        <div class="form-group mb-2 mb20">
                            <strong>Nombre:</strong>
                            {{ $cliente->name }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Username:</strong>
                            {{ $cliente->username }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Email:</strong>
                            {{ $cliente->email }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Teléfono:</strong>
                            {{ $cliente->phone }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Web:</strong>
                            {{ $cliente->website }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
