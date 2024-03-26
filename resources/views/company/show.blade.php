@section('template_title')
    {{ $company->name ?? __('Show') . " " . __('Company') }}
@endsection

    <x-app-layout class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Company</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('companies.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                        <div class="form-group mb-2 mb20">
                            <strong>Cliente Id:</strong>
                            {{ $company->cliente_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Name:</strong>
                            {{ $company->name }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Catchphrase:</strong>
                            {{ $company->catchPhrase }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Bs:</strong>
                            {{ $company->bs }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

