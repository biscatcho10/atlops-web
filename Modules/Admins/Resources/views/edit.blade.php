@extends('dashboard::layouts.default')

@section('title')
    {{ $news->name }}
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $news->name)
        @slot('breadcrumbs', ['dashboard.news.edit', $news])

        {{ BsForm::resource('news::news')->putModel($news, route('dashboard.news.update', $news), ['files' => true,'data-parsley-validate']) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('news::news.actions.edit'))

            @include('news::news.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('news::news.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
