@section('template_title')
    {{ __('Create') }} Company
@endsection

<x-app-layout class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">{{ __('Create') }} Company</span>
                </div>
                <div class="card-body bg-white">
                    <form method="POST" action="{{ route('companies.store') }}"  role="form" enctype="multipart/form-data">
                        @csrf

                        @include('company.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
