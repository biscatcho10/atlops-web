<?php

Breadcrumbs::for('dashboard.admins.index', function ($breadcrumb) {
    // $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('admins::admins.plural'), route('admins.index'));
});

Breadcrumbs::for('dashboard.admins.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.admins.index');
    $breadcrumb->push(trans('admins::admins.actions.create'), route('admins.create'));
});

Breadcrumbs::for('dashboard.admins.show', function ($breadcrumb, $admin) {
    $breadcrumb->parent('dashboard.admins.index');
    $breadcrumb->push($admin->name, route('admins.show', $admin));
});

Breadcrumbs::for('dashboard.admins.edit', function ($breadcrumb, $admin) {
    $breadcrumb->parent('dashboard.admins.show', $admin);
    $breadcrumb->push(trans('admins::admins.actions.edit'), route('admins.edit', $admin));
});
