@extends('dashboard::layouts.default')

@section('title')
    @lang('news::news.actions.create')
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('news::news.plural'))
        @slot('breadcrumbs', ['dashboard.news.create'])

        {{ BsForm::resource('news::news')->post(route('dashboard.news.store'), ['files' => true,'data-parsley-validate']) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('news::news.actions.create'))

            @include('news::news.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('news::news.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
