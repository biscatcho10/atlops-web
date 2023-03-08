{{ BsForm::resource('admins::admins')->get(url()->current()) }}
@component('dashboard::layouts.components.accordion')
    @slot('title', trans('admins::actions.filter'))

    <div class="row">
        <div class="col-md-4">
            {{ BsForm::text('title')->value(request('title')) }}
        </div>
        <div class="col-md-4">
            {{ BsForm::text('content')->value(request('content')) }}
        </div>
        <div class="col-md-4">
            {{ BsForm::number('perPage')
                ->value(request('perPage', 15))
                ->min(1)
                ->label(trans('admins.perPage')) }}
        </div>
    </div>

    @slot('footer')
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fas fa fa-fw fa-filter"></i>
            @lang('admins.actions.filter')
        </button>
    @endslot
@endcomponent
{{ BsForm::close() }}
