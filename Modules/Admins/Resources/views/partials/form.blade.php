@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@bsMultilangualFormTabs
{{ BsForm::text('title')->required()->attribute(['data-parsley-maxlength' => '191','data-parsley-minlength' => '3']) }}
{{ BsForm::textarea('content')->attribute('class','form-control textarea')->required()->rows(4) }}
@endBsMultilangualFormTabs

{{ BsForm::date('published_at')->required() }}

{{-- @isset($news)
    {{ BsForm::image('image')->collection('images')->files($news->getMediaResource('images'))->notes(trans('news::news.messages.images_note')) }}
@else
    {{ BsForm::image('image')->collection('images')->notes(trans('news::news.messages.images_note')) }}
@endisset --}}

<label>{{ __('news::news.attributes.image') }}</label>
@isset($news)
    @include('dashboard::layouts.apps.file', [
        'file' => $news->getFirstMediaUrl('images'),
        'name' => 'image'
    ])
@else
    @include('dashboard::layouts.apps.file', ['name' => 'image'])
@endisset
