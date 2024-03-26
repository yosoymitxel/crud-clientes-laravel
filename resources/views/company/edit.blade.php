@section('template_title')
    {{ __('Update') }} Company
@endsection
<x-app-layout class="content container-fluid">
    <div class="">
        <div class="col-md-12">

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">{{ __('Update') }} Company</span>
                </div>
                <div class="card-body bg-white">
                    <form method="POST" action="{{ route('companies.update', $company->id) }}"  role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('company.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
