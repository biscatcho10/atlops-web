@component('dashboard::layouts.components.sidebarItem')
    @slot('can', ['permission' => 'read_news'])
    @slot('url', route('dashboard.news.index'))
    @slot('name', trans('news::news.plural'))
    @slot('isActive', request()->routeIs('*news*'))
    @slot('icon', 'far fa-newspaper')
    @slot('tree', [
        [
            'name' => trans('news::news.actions.list'),
            'url' => route('dashboard.news.index'),
            'can' => ['permission' => 'read_news'],
            'isActive' => request()->routeIs('*news.index'),
            'module' => 'News',
        ],
        [
            'name' => trans('news::news.actions.create'),
            'url' => route('dashboard.news.create'),
            'can' => ['permission' => 'create_news'],
            'isActive' => request()->routeIs('*news.create'),
            'module' => 'News',
        ],
    ])
@endcomponent
