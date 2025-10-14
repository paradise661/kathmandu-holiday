@extends('layouts.admin.master')

@section('title', 'Website Menu - Kathmandu Holiday')

@section('content')

    <style>
        ul {
            list-style: none !important;
        }

        .item-list,
        .info-box {
            background: #fff;
            padding: 10px;
        }

        .item-list-body {
            max-height: 300px;
            overflow-y: scroll;
        }

        .panel-body p {
            margin-bottom: 5px;
        }

        .info-box {
            margin-bottom: 15px;
        }

        .item-list-footer {
            padding-top: 10px;
        }

        .panel-heading a {
            display: block;
        }

        .form-inline {
            display: inline;
        }

        .form-inline select {
            padding: 4px 10px;
        }

        .btn-menu-select {
            padding: 4px 10px
        }

        .disabled {
            pointer-events: none;
            opacity: 0.7;
        }

        .menu-item-bar {
            padding: 10px 10px;
            border: 1px solid #d7d7d7;
            margin-bottom: 5px;
            width: 75%;
            cursor: move;
            display: block;
        }

        #serialize_output {
            display: block;
        }

        .menulocation label {
            font-weight: normal;
            display: block;
        }

        body.dragging,
        body.dragging * {
            cursor: move !important;
        }

        .dragged {
            position: absolute;
            z-index: 1;
        }

        ol.example li.placeholder {
            position: relative;
            padding: 10px 10px !important;
        }

        ol.example li.placeholder:before {
            position: absolute;
            padding: 10px 10px !important;
        }

        #menuitem {
            list-style: none;
        }

        #menuitem ul {
            list-style: none;
        }

        .input-box {
            width: 75%;
            background: #fff;
            padding: 10px;
            box-sizing: border-box;
            margin-bottom: 5px;
        }

        .card-body .content select {
            padding: 0 70px
        }

        .card-body .content button {
            padding: 0px 20px
        }
    </style>

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Menus</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('dashboard') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0">

                @if (count($menus) != 0)
                    <div class="card card-body shadow p-2">
                        <div class="content ms-3 d-flex gap-2 align-items-baseline pt-3">
                            @if (count($menus) > 0)
                                <p>Select a menu to edit:</p>
                                <form class="form-inline d-flex gap-2" action="{{ url('admin/menus') }}">
                                    <select class="form-select" name="id">
                                        @foreach ($menus as $menu)
                                            @if ($desiredMenu != '')
                                                <option value="{{ $menu->id }}"
                                                    @if ($menu->id == $desiredMenu->id) selected @endif>{{ $menu->title }}
                                                </option>
                                            @else
                                                <option value="{{ $menu->id }}">{{ $menu->title }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <button class="btn btn-sm btn-primary">Select</button>
                                </form>
                                <p>or</p>
                            @endif
                            <a href="{{ url('admin/menus?id=new') }}">Create a new menu.</a>
                        </div>
                    </div>
                @endif
                <div class="row my-5" id="main-row">
                    <div class="col-sm-4 cat-form">
                        <div class="card-body card shadow br-8">
                            <h3>Add Menu Items</h3>
                            <ul class="panel-group list-group" id="menu-items">
                                @if (count($posts) != 0)
                                    <li class="panel panel-default list-group-item">
                                        <div class="panel-heading">
                                            <a data-bs-toggle="collapse" data-bs-parent="#menu-items"
                                                href="#posts-list">Posts <span
                                                    class="fa fa-caret-down pull-right"></span></a>
                                        </div>
                                        <div class="panel-collapse collapse my-3" id="posts-list">
                                            <div class="panel-body">
                                                <div class="item-list-body">
                                                    @foreach ($posts as $post)
                                                        <p><input type="checkbox" name="select-post[]"
                                                                value="{{ $post->id }}"> {{ $post->name }}</p>
                                                    @endforeach
                                                </div>
                                                <div class="item-list-footer">
                                                    <label class="btn btn-sm btn-default"><input id="select-all-posts"
                                                            type="checkbox"> Select All</label>
                                                    <button class="pull-right btn btn-primary btn-sm" id="add-posts"
                                                        type="button">Add to Menu</button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                                @if (count($pages) != 0)
                                    <li class="panel panel-default list-group-item">
                                        <div class="panel-heading">
                                            <a data-bs-toggle="collapse" data-bs-parent="#menu-items"
                                                href="#pages-list">Pages <span
                                                    class="fa fa-caret-down pull-right"></span></a>
                                        </div>
                                        <div class="panel-collapse collapse my-3" id="pages-list">
                                            <div class="panel-body">
                                                <div class="item-list-body">
                                                    @foreach ($pages as $page)
                                                        <p><input type="checkbox" name="select-page[]"
                                                                value="{{ $page->id }}"> {{ $page->name }}</p>
                                                    @endforeach
                                                </div>
                                                <div class="item-list-footer">
                                                    <label class="btn btn-sm btn-default"><input id="select-all-pages"
                                                            type="checkbox"> Select All</label>
                                                    <button class="pull-right btn btn-primary btn-sm" id="add-pages"
                                                        type="button">Add to Menu</button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endif

                                @if (count($packages) != 0)
                                    <li class="panel panel-default list-group-item">
                                        <div class="panel-heading">
                                            <a data-bs-toggle="collapse" href="#packages-list" role="button"
                                                aria-expanded="false" aria-controls="packages-list">Packages <span
                                                    class="fa fa-caret-down pull-right"></span></a>
                                        </div>
                                        <div class="panel-collapse collapse my-3" id="packages-list">
                                            <div class="panel-body">
                                                <div class="item-list-body">
                                                    @foreach ($packages as $pck)
                                                        <p><input type="checkbox" name="select-pck[]"
                                                                value="{{ $pck->id }}"> {{ $pck->name }}</p>
                                                    @endforeach
                                                </div>
                                                <div class="item-list-footer">
                                                    <label class="btn btn-sm btn-default"><input id="select-all-packages"
                                                            type="checkbox"> Select All</label>
                                                    <button class="pull-right btn btn-primary btn-sm" id="add-packages"
                                                        type="button">Add to Menu</button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endif

                                @if (count($destinations) != 0)
                                    <li class="panel panel-default list-group-item">
                                        <div class="panel-heading">
                                            <a data-bs-toggle="collapse" href="#destination-list" role="button"
                                                aria-expanded="false" aria-controls="destination-list">Destination <span
                                                    class="fa fa-caret-down pull-right"></span></a>
                                        </div>
                                        <div class="panel-collapse collapse my-3" id="destination-list">
                                            <div class="panel-body">
                                                <div class="item-list-body">
                                                    @foreach ($destinations as $dest)
                                                        <p><input type="checkbox" name="select-dest[]"
                                                                value="{{ $dest->id }}"> {{ $dest->name }}</p>
                                                        @if (count($dest->children))
                                                            @include('admin.menu.includes.subparent', [
                                                                'subParent' => $dest->children,
                                                                'fname' => 'select-dest[]',
                                                                'count' => '&nbsp;&nbsp;',
                                                            ])
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="item-list-footer">
                                                    <label class="btn btn-sm btn-default"><input
                                                            id="select-all-destination" type="checkbox"> Select
                                                        All</label>
                                                    <button class="pull-right btn btn-primary btn-sm" id="add-destination"
                                                        type="button">Add to Menu</button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endif

                                @if (count($activities) != 0)
                                    <li class="panel panel-default list-group-item">
                                        <div class="panel-heading">
                                            <a data-bs-toggle="collapse" href="#category-list" role="button"
                                                aria-expanded="false" aria-controls="category-list">Category <span
                                                    class="fa fa-caret-down pull-right"></span></a>
                                        </div>
                                        <div class="panel-collapse collapse my-3" id="category-list">
                                            <div class="panel-body">
                                                <div class="item-list-body">
                                                    @foreach ($activities as $cats)
                                                        <p><input type="checkbox" name="select-cats[]"
                                                                value="{{ $cats->id }}"> {{ $cats->name }}</p>
                                                        @if (count($cats->children))
                                                            @include('admin.menu.includes.subparent', [
                                                                'subParent' => $cats->children,
                                                                'fname' => 'select-cats[]',
                                                                'count' => '&nbsp;&nbsp;',
                                                            ])
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="item-list-footer">
                                                    <label class="btn btn-sm btn-default"><input id="select-all-category"
                                                            type="checkbox"> Select All</label>
                                                    <button class="pull-right btn btn-primary btn-sm" id="add-category"
                                                        type="button">Add to Menu</button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endif

                                @if (count($services) != 0)
                                    <li class="panel panel-default list-group-item">
                                        <div class="panel-heading">
                                            <a data-bs-toggle="collapse" data-bs-parent="#menu-items"
                                                href="#services-list">Services <span
                                                    class="fa fa-caret-down pull-right"></span></a>
                                        </div>
                                        <div class="panel-collapse collapse my-3" id="services-list">
                                            <div class="panel-body">
                                                <div class="item-list-body">
                                                    @foreach ($services as $service)
                                                        <p><input type="checkbox" name="select-service[]"
                                                                value="{{ $service->id }}"> {{ $service->name }}</p>
                                                    @endforeach
                                                </div>
                                                <div class="item-list-footer">
                                                    <label class="btn btn-sm btn-default"><input id="select-all-services"
                                                            type="checkbox"> Select All</label>
                                                    <button class="pull-right btn btn-primary btn-sm" id="add-services"
                                                        type="button">Add to Menu</button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endif

                                <li class="panel panel-default list-group-item">
                                    <div class="panel-heading">
                                        <a data-bs-toggle="collapse" data-bs-parent="#menu-items"
                                            href="#custom-links">Custom Links <span
                                                class="fa fa-caret-down pull-right"></span></a>
                                    </div>
                                    <div class="panel-collapse collapse" id="custom-links">
                                        <div class="panel-body">
                                            <div class="item-list-bodys my-2">
                                                <div class="form-group">
                                                    <label>URL</label>
                                                    <input class="form-control" id="url" type="url"
                                                        placeholder="https://">
                                                </div>
                                                <div class="form-group mt-2">
                                                    <label>Link Text</label>
                                                    <input class="form-control" id="linktext" type="text"
                                                        placeholder="">
                                                </div>
                                            </div>
                                            <div class="item-list-footer">
                                                <button class="pull-right btn btn-primary btn-sm" id="add-custom-link"
                                                    type="button">Add to Menu</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8 cat-view">

                        <div class="card-body card shadow br-8">
                            @if ($desiredMenu == '')
                                <h3>Create New Menu</h3>
                                <form method="post" action="{{ url('admin/create-menu') }}">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>Menu Name</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="title"
                                                    placeholder="Enter Menu Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <button class="btn btn-primary">Create Menu</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <h3><span>Menu Structure</span></h3>
                                <div id="menu-content">
                                    <div id="result"></div>
                                    <div style="min-height: 240px;">
                                        <p>Select posts, pages or add custom links to menus.</p>
                                        @if ($desiredMenu != '')
                                            <ul class="ctm-menu ui-sortable list-group" id="menuitems">
                                                @if (!empty($menuitems))
                                                    @foreach ($menuitems as $key => $item)
                                                        <li data-id="{{ $item->id }}">
                                                            <span class="menu-item-bar list-group-item">
                                                                <a class="pull-right" data-bs-toggle="collapse"
                                                                    href="#collapse{{ $item->id }}" role="button"
                                                                    aria-expanded="false"
                                                                    aria-controls="#collapse{{ $item->id }}">
                                                                    @if (empty($item->name))
                                                                        {{ $item->title }}
                                                                    @else
                                                                        {{ $item->name }}
                                                                    @endif
                                                                    <i class="fa fa-caret-down"></i>
                                                                </a>
                                                            </span>
                                                            <div class="collapse" id="collapse{{ $item->id }}">
                                                                <div class="input-box border">
                                                                    <form method="post"
                                                                        action="{{ url('admin/update-menuitem') }}/{{ $item->id }}">
                                                                        {{ csrf_field() }}
                                                                        <div class="form-group my-1">
                                                                            <label>Link Name</label>
                                                                            <input class="form-control" type="text"
                                                                                name="name"
                                                                                value="@if (empty($item->name)) {{ $item->title }} @else {{ $item->name }} @endif">
                                                                        </div>
                                                                        <div class="form-group my-1">
                                                                            <label>URL</label>
                                                                            <input class="form-control" type="text"
                                                                                name="slug"
                                                                                value="{{ $item->slug }}">
                                                                        </div>
                                                                        <div class="form-group my-1">
                                                                            <input type="checkbox" name="target"
                                                                                value="_blank"
                                                                                @if ($item->target == '_blank') checked @endif>
                                                                            Open in a new tab
                                                                        </div>
                                                                        <div class="form-group mt-2">
                                                                            <button
                                                                                class="btn btn-sm btn-primary">Save</button>
                                                                            <a class="btn btn-sm btn-danger"
                                                                                href="{{ url('admin/delete-menuitem') }}/{{ $item->id }}/{{ $key }}">Delete</a>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <ul>
                                                                @if (isset($item->children))
                                                                    @foreach ($item->children as $m)
                                                                        @foreach ($m as $in => $data)
                                                                            <li class="menu-item w-100"
                                                                                data-id="{{ $data->id }}">
                                                                                <span class="menu-item-bar">
                                                                                    <a class="pull-right"
                                                                                        data-bs-toggle="collapse"
                                                                                        href="#collapse{{ $data->id }}"
                                                                                        role="button"
                                                                                        aria-expanded="false"
                                                                                        aria-controls="#collapse{{ $data->id }}">
                                                                                        @if (empty($data->name))
                                                                                            {{ $data->title }}
                                                                                        @else
                                                                                            {{ $data->name }}
                                                                                        @endif
                                                                                        <i class="fa fa-caret-down"></i>
                                                                                    </a>
                                                                                </span>
                                                                                <div class="collapse"
                                                                                    id="collapse{{ $data->id }}">
                                                                                    <div class="input-box border">
                                                                                        <form method="post"
                                                                                            action="{{ url('admin/update-menuitem') }}/{{ $data->id }}">
                                                                                            {{ csrf_field() }}
                                                                                            <div class="form-group my-1">
                                                                                                <label>Link Name</label>
                                                                                                <input class="form-control"
                                                                                                    type="text"
                                                                                                    name="name"
                                                                                                    value="@if (empty($data->name)) {{ $data->title }} @else {{ $data->name }} @endif">
                                                                                            </div>
                                                                                            @if ($data->type == 'custom')
                                                                                                <div
                                                                                                    class="form-group my-1">
                                                                                                    <label>URL</label>
                                                                                                    <input
                                                                                                        class="form-control"
                                                                                                        type="text"
                                                                                                        name="slug"
                                                                                                        value="{{ $data->slug }}">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="form-group my-1">
                                                                                                    <input type="checkbox"
                                                                                                        name="target"
                                                                                                        value="_blank"
                                                                                                        @if ($data->target == '_blank') checked @endif>
                                                                                                    Open in a new tab
                                                                                                </div>
                                                                                            @endif
                                                                                            <div class="form-group my-2">
                                                                                                <button
                                                                                                    class="btn btn-sm btn-primary">Save</button>
                                                                                                <a class="btn btn-sm btn-danger"
                                                                                                    href="{{ url('admin/delete-menuitem') }}/{{ $data->id }}/{{ $key }}/{{ $in }}">Delete</a>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                                <ul>
                                                                                    @if (isset($data->children))
                                                                                        @foreach ($data->children as $s)
                                                                                            @foreach ($s as $in => $subdata)
                                                                                                <li class="menu-item w-100"
                                                                                                    data-id="{{ $subdata->id }}">
                                                                                                    <span
                                                                                                        class="menu-item-bar">
                                                                                                        <a class="pull-right"
                                                                                                            data-bs-toggle="collapse"
                                                                                                            href="#collapse{{ $subdata->id }}"
                                                                                                            role="button"
                                                                                                            aria-expanded="false"
                                                                                                            aria-controls="#collapse{{ $subdata->id }}">
                                                                                                            @if (empty($subdata->name))
                                                                                                                {{ $subdata->title }}
                                                                                                            @else
                                                                                                                {{ $subdata->name }}
                                                                                                            @endif
                                                                                                            <i
                                                                                                                class="fa fa-caret-down"></i>
                                                                                                        </a>
                                                                                                    </span>
                                                                                                    <div class="collapse"
                                                                                                        id="collapse{{ $subdata->id }}">
                                                                                                        <div
                                                                                                            class="input-box border">
                                                                                                            <form
                                                                                                                method="post"
                                                                                                                action="{{ url('admin/update-menuitem') }}/{{ $subdata->id }}">
                                                                                                                {{ csrf_field() }}
                                                                                                                <div
                                                                                                                    class="form-group my-1">
                                                                                                                    <label>Link
                                                                                                                        Name</label>
                                                                                                                    <input
                                                                                                                        class="form-control"
                                                                                                                        type="text"
                                                                                                                        name="name"
                                                                                                                        value="@if (empty($subdata->name)) {{ $subdata->title }} @else {{ $subdata->name }} @endif">
                                                                                                                </div>
                                                                                                                @if ($subdata->type == 'custom')
                                                                                                                    <div
                                                                                                                        class="form-group my-1">
                                                                                                                        <label>URL</label>
                                                                                                                        <input
                                                                                                                            class="form-control"
                                                                                                                            type="text"
                                                                                                                            name="slug"
                                                                                                                            value="{{ $subdata->slug }}">
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="form-group my-1">
                                                                                                                        <input
                                                                                                                            type="checkbox"
                                                                                                                            name="target"
                                                                                                                            value="_blank"
                                                                                                                            @if ($subdata->target == '_blank') checked @endif>
                                                                                                                        Open
                                                                                                                        in a
                                                                                                                        new
                                                                                                                        tab
                                                                                                                    </div>
                                                                                                                @endif
                                                                                                                <div
                                                                                                                    class="form-group my-2">
                                                                                                                    <button
                                                                                                                        class="btn btn-sm btn-primary">Save</button>
                                                                                                                    <a class="btn btn-sm btn-danger"
                                                                                                                        href="{{ url('admin/delete-menuitem') }}/{{ $subdata->id }}/{{ $key }}/{{ $in }}">Delete</a>
                                                                                                                </div>
                                                                                                            </form>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <ul>
                                                                                                        @if (isset($subdata->children))
                                                                                                            @foreach ($subdata->children as $sn)
                                                                                                                @foreach ($sn as $in => $ssn)
                                                                                                                    <li class="menu-item w-100"
                                                                                                                        data-id="{{ $ssn->id }}">
                                                                                                                        <span
                                                                                                                            class="menu-item-bar">
                                                                                                                            <a class="pull-right"
                                                                                                                                data-bs-toggle="collapse"
                                                                                                                                href="#collapse{{ $ssn->id }}"
                                                                                                                                role="button"
                                                                                                                                aria-expanded="false"
                                                                                                                                aria-controls="#collapse{{ $ssn->id }}">
                                                                                                                                @if (empty($ssn->name))
                                                                                                                                    {{ $ssn->title }}
                                                                                                                                @else
                                                                                                                                    {{ $ssn->name }}
                                                                                                                                @endif
                                                                                                                                <i
                                                                                                                                    class="fa fa-caret-down"></i>
                                                                                                                            </a>
                                                                                                                        </span>
                                                                                                                        <div class="collapse"
                                                                                                                            id="collapse{{ $ssn->id }}">
                                                                                                                            <div
                                                                                                                                class="input-box border">
                                                                                                                                <form
                                                                                                                                    method="post"
                                                                                                                                    action="{{ url('admin/update-menuitem') }}/{{ $ssn->id }}">
                                                                                                                                    {{ csrf_field() }}
                                                                                                                                    <div
                                                                                                                                        class="form-group my-1">
                                                                                                                                        <label>Link
                                                                                                                                            Name</label>
                                                                                                                                        <input
                                                                                                                                            class="form-control"
                                                                                                                                            type="text"
                                                                                                                                            name="name"
                                                                                                                                            value="@if (empty($ssn->name)) {{ $ssn->title }} @else {{ $ssn->name }} @endif">
                                                                                                                                    </div>
                                                                                                                                    @if ($ssn->type == 'custom')
                                                                                                                                        <div
                                                                                                                                            class="form-group my-1">
                                                                                                                                            <label>URL</label>
                                                                                                                                            <input
                                                                                                                                                class="form-control"
                                                                                                                                                type="text"
                                                                                                                                                name="slug"
                                                                                                                                                value="{{ $ssn->slug }}">
                                                                                                                                        </div>
                                                                                                                                        <div
                                                                                                                                            class="form-group my-1">
                                                                                                                                            <input
                                                                                                                                                type="checkbox"
                                                                                                                                                name="target"
                                                                                                                                                value="_blank"
                                                                                                                                                @if ($ssn->target == '_blank') checked @endif>
                                                                                                                                            Open
                                                                                                                                            in
                                                                                                                                            a
                                                                                                                                            new
                                                                                                                                            tab
                                                                                                                                        </div>
                                                                                                                                    @endif
                                                                                                                                    <div
                                                                                                                                        class="form-group my-2">
                                                                                                                                        <button
                                                                                                                                            class="btn btn-sm btn-primary">Save</button>
                                                                                                                                        <a class="btn btn-sm btn-danger"
                                                                                                                                            href="{{ url('admin/delete-menuitem') }}/{{ $ssn->id }}/{{ $key }}/{{ $in }}">Delete</a>
                                                                                                                                    </div>
                                                                                                                                </form>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <ul>
                                                                                                                        </ul>
                                                                                                                    </li>
                                                                                                                @endforeach
                                                                                                            @endforeach
                                                                                                        @endif
                                                                                                    </ul>
                                                                                                </li>
                                                                                            @endforeach
                                                                                        @endforeach
                                                                                    @endif
                                                                                </ul>
                                                                            </li>
                                                                        @endforeach
                                                                    @endforeach
                                                                @endif
                                                            </ul>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        @endif
                                    </div>

                                    @if ($desiredMenu != '')
                                        <div class="form-group menulocation mt-5">
                                            <label><b>Menu Location</b></label>
                                            <label><input type="radio" name="location" value="1"
                                                    @if ($desiredMenu->location == 1) checked @endif> Main Nav</label>
                                            <label><input type="radio" name="location" value="2"
                                                    @if ($desiredMenu->location == 2) checked @endif> Footer One</label>
                                            <label><input type="radio" name="location" value="3"
                                                    @if ($desiredMenu->location == 3) checked @endif> Footer Two</label>
                                            <label><input type="radio" name="location" value="4"
                                                    @if ($desiredMenu->location == 4) checked @endif> Footer Three</label>
                                        </div>
                                        <div class="d-flex gap-3 my-2">
                                            <div class="text-right">
                                                <button class="btn btn-sm btn-primary" id="saveMenu">Save Menu</button>
                                            </div>
                                            <div class="text-right">
                                                <a class="btn btn-sm btn-danger"
                                                    href="{{ url('admin/delete-menu') }}/{{ $desiredMenu->id }}">Delete
                                                    Menu</a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-none" id="serialize_output">
        @if ($desiredMenu)
            {{ $desiredMenu->content }}
        @endif
    </div>
    <script src="{{ asset('admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin/assets') }}/js/sortable.js"></script>
    <script>
        $('#select-all-posts').click(function(event) {
            if (this.checked) {
                $('#posts-list :checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $('#posts-list :checkbox').each(function() {
                    this.checked = false;
                });
            }
        });

        $('#select-all-pages').click(function(event) {
            if (this.checked) {
                $('#pages-list :checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $('#pages-list :checkbox').each(function() {
                    this.checked = false;
                });
            }
        });

        $('#select-all-services').click(function(event) {
            if (this.checked) {
                $('#services-list :checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $('#services-list :checkbox').each(function() {
                    this.checked = false;
                });
            }
        });

        $('#select-all-packages').click(function(event) {
            if (this.checked) {
                $('#packages-list :checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $('#packages-list :checkbox').each(function() {
                    this.checked = false;
                });
            }
        });

        $('#select-all-destination').click(function(event) {
            if (this.checked) {
                $('#destination-list :checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $('#destination-list :checkbox').each(function() {
                    this.checked = false;
                });
            }
        });

        $('#select-all-category').click(function(event) {
            if (this.checked) {
                $('#category-list :checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $('#category-list :checkbox').each(function() {
                    this.checked = false;
                });
            }
        });
    </script>
    @if ($desiredMenu)
        <script>
            $('#add-posts').click(function() {
                var menuid = <?= $desiredMenu->id ?>;
                var n = $('input[name="select-post[]"]:checked').length;
                var array = $('input[name="select-post[]"]:checked');
                var ids = [];
                for (i = 0; i < n; i++) {
                    ids[i] = array.eq(i).val();
                }
                if (ids.length == 0) {
                    return false;
                }
                $.ajax({
                    type: "get",
                    data: {
                        menuid: menuid,
                        ids: ids
                    },
                    url: "{{ url('admin/add-post-to-menu') }}",
                    success: function(res) {
                        location.reload();
                    }
                })
            });
            $('#add-pages').click(function() {
                var menuid = <?= $desiredMenu->id ?>;
                var n = $('input[name="select-page[]"]:checked').length;
                var array = $('input[name="select-page[]"]:checked');
                var ids = [];
                for (i = 0; i < n; i++) {
                    ids[i] = array.eq(i).val();
                }
                if (ids.length == 0) {
                    return false;
                }
                $.ajax({
                    type: "get",
                    data: {
                        menuid: menuid,
                        ids: ids
                    },
                    url: "{{ url('admin/add-page-to-menu') }}",
                    success: function(res) {
                        location.reload();
                    }
                })
            });

            $('#add-packages').click(function() {
                var menuid = <?= $desiredMenu->id ?>;
                var n = $('input[name="select-pck[]"]:checked').length;
                var array = $('input[name="select-pck[]"]:checked');
                var ids = [];
                for (i = 0; i < n; i++) {
                    ids[i] = array.eq(i).val();
                }
                if (ids.length == 0) {
                    return false;
                }
                $.ajax({
                    type: "get",
                    data: {
                        menuid: menuid,
                        ids: ids
                    },
                    url: "{{ route('admin.menu.addpackage') }}",
                    success: function(res) {
                        location.reload();
                    }
                })
            });

            $('#add-destination').click(function() {
                var menuid = <?= $desiredMenu->id ?>;
                var n = $('input[name="select-dest[]"]:checked').length;
                var array = $('input[name="select-dest[]"]:checked');
                var ids = [];
                for (i = 0; i < n; i++) {
                    ids[i] = array.eq(i).val();
                }
                if (ids.length == 0) {
                    return false;
                }
                $.ajax({
                    type: "get",
                    data: {
                        menuid: menuid,
                        ids: ids
                    },
                    url: "{{ route('admin.menu.adddestination') }}",
                    success: function(res) {
                        location.reload();
                    }
                })
            });

            $('#add-category').click(function() {
                var menuid = <?= $desiredMenu->id ?>;
                var n = $('input[name="select-cats[]"]:checked').length;
                var array = $('input[name="select-cats[]"]:checked');
                var ids = [];
                for (i = 0; i < n; i++) {
                    ids[i] = array.eq(i).val();
                }
                if (ids.length == 0) {
                    return false;
                }
                $.ajax({
                    type: "get",
                    data: {
                        menuid: menuid,
                        ids: ids
                    },
                    url: "{{ route('admin.menu.addcategory') }}",
                    success: function(res) {
                        location.reload();
                    }
                })
            });
            $('#add-services').click(function() {
                var menuid = <?= $desiredMenu->id ?>;
                var n = $('input[name="select-service[]"]:checked').length;
                var array = $('input[name="select-service[]"]:checked');
                var ids = [];
                for (i = 0; i < n; i++) {
                    ids[i] = array.eq(i).val();
                }
                if (ids.length == 0) {
                    return false;
                }
                $.ajax({
                    type: "get",
                    data: {
                        menuid: menuid,
                        ids: ids
                    },
                    url: "{{ url('admin/add-service-to-menu') }}",
                    success: function(res) {
                        location.reload();
                    }
                })
            });
            $("#add-custom-link").click(function() {
                var menuid = <?= $desiredMenu->id ?>;
                var url = $('#url').val();
                var link = $('#linktext').val();
                if (url.length > 0 && link.length > 0) {
                    $.ajax({
                        type: "get",
                        data: {
                            menuid: menuid,
                            url: url,
                            link: link
                        },
                        url: "{{ url('admin/add-custom-link') }}",
                        success: function(res) {
                            location.reload();
                        }
                    })
                }
            });
        </script>
        <script>
            var group = $("#menuitems").sortable({
                group: 'serialization',
                onDrop: function($item, container, _super) {
                    var data = group.sortable("serialize").get();
                    var jsonString = JSON.stringify(data, null, ' ');
                    $('#serialize_output').text(jsonString);
                    _super($item, container);
                }
            });
        </script>
        <script>
            $('#saveMenu').click(function() {
                var menuid = <?= $desiredMenu->id ?>;
                var location = $('input[name="location"]:checked').val();
                var newText = $("#serialize_output").text();
                var data = JSON.parse($("#serialize_output").text());
                $.ajax({
                    type: "get",
                    data: {
                        menuid: menuid,
                        data: data,
                        location: location
                    },
                    url: "{{ url('admin/update-menu') }}",
                    success: function(res) {
                        window.location.reload();
                    }
                })
            })
        </script>
    @endif
@endsection
