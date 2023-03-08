@extends('dashboard::layouts.default')

@section('title')
    {{ $news->title }}
@endsection
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $news->title)
        @slot('breadcrumbs', ['dashboard.news.show', $news])

        <div class="row">
            <div class="col-md-8">
                @component('dashboard::layouts.components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-middle">
                        <tbody>
                        <tr>
                            <th width="200">@lang('news::news.attributes.title')</th>
                            <td>{{ $news->title }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('news::news.attributes.published_at')</th>
                            <td>{{ $news->published_at }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('news::news.attributes.content')</th>
                            <td>{!! $news->content !!}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('news::news.attributes.image')</th>
                            <td>
                                <img src="{{ $news->getImage() }}"
                                     class="img img-size-"
                                     alt="{{ $news->title }}" width="300px">
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    @slot('footer')
                        @include('news::news.partials.actions.edit')
                        @include('news::news.partials.actions.delete')
                    @endslot
                @endcomponent
            </div>
        </div>

    @endcomponent
@endsection
