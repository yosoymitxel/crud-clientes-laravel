@extends('layouts.app')

@section('template_title')
    {{ $address->name ?? __('Show') . " " . __('Address') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Address</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('addresses.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Cliente Id:</strong>
                            {{ $address->cliente_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Street:</strong>
                            {{ $address->street }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Suite:</strong>
                            {{ $address->suite }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>City:</strong>
                            {{ $address->city }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Zipcode:</strong>
                            {{ $address->zipcode }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Lat:</strong>
                            {{ $address->lat }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Lng:</strong>
                            {{ $address->lng }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
