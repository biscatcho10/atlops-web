@component('dashboard::layouts.components.sidebarItem')
    @slot('url', route('dashboard.home'))
    @slot('name', trans('dashboard::dashboard.home'))
    @slot('icon', 'fas fa-layer-group')
    @slot('routeActive', 'dashboard.home')
@endcomponent
<!-- Admins -->
@include('accounts::admins.sidebar')
<!-- Donors -->
@include('donations::donors.sidebar')
<!-- volunteers -->
@include('volunteers::volunteers.sidebar')
<!-- Service -->
@include('services::services.sidebar')
<!-- Partners -->
@include('partners::partners.sidebar')
<!-- Reports -->
@include('reports::reports.sidebar')
<!-- News -->
@include('news::news.sidebar')
<!-- Galleries -->
@include('services::galleries.sidebar')
<!-- Sliders -->
@include('sliders::sliders.sidebar')
<!-- Countries -->
{{-- @include('countries::sidebar') --}}
<!-- Contact Us -->
@include('settings::contact-us.sidebar')
<!-- Subscribers -->
@include('settings::subscribers.sidebar')
<!-- About Us -->
@include('settings::about-sidebar')
<!-- settings -->
@include('dashboard::sidebar.settings')


