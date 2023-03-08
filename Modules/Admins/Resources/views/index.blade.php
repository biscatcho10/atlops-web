@extends('dashboard.layouts.app')

@section('title')
    المديرين
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', "المديرين")
        {{-- @slot('breadcrumbs', ['dashboard.admins.index']) --}}

        @include('admins::partials.filter')

        @component('dashboard::layouts.components.table-box')
            @slot('title', "المديرين")
            @slot('tools')
                @include('admins::partials.actions.create')
            @endslot

            <thead>
                <tr>
                    <th>الاسم</th>
                    <th>البريد الالكتروني</th>
                    {{-- <th>@lang('admins.attributes.content')</th> --}}
                    <th style="width: 160px">...</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $admin)
                    <tr>
                        <td class="d-none d-md-table-cell">
                            {{ $admin->name }}
                        </td>
                        <td class="d-none d-md-table-cell">
                            {{ $admin->email }}
                        </td>
                        <td style="width: 160px">
                            {{-- @include('admin.partials.actions.show')
                            @include('admin.partials.actions.edit')
                            @include('admin.partials.actions.delete') --}}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100" class="text-center">@lang('admin.empty')</td>
                    </tr>
                @endforelse

                @if ($data->hasPages())
                    @slot('footer')
                        {{ $data->links() }}
                    @endslot
                @endif
            @endcomponent
        @endcomponent
    @endsection
