<header class="main-header">
    @if ($setting['site_experiance'] || $socialdata->isNotEmpty())
        <div class="header-top d-none d-md-block">
            <div class="auto-container">
                <div class="top-inner">
                    @if ($setting['site_experiance'])
                        <p><i class="icon-1"></i>{{ $setting['site_experiance'] ?? '' }}</p>
                    @endif
                    @if ($socialdata->isNotEmpty())
                        <ul class="social-links">
                            <li><span>On Social:</span></li>
                            @foreach ($socialdata as $data)
                                <li><a href="{{ $data->link ?? 'javascript:void(0)' }}"
                                        target="{{ $data->link ? '_blank' : '_self' }}"><span
                                            class="{{ $data->icon ?? '' }}"></span></a></li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    @endif
    <div class="header-upper">
        <div class="auto-container">
            <div class="upper-inner">
                <figure class="logo-box">
                    <a href="/">
                        <img src="{{ $setting['site_main_logo'] ? asset(get_media_url($setting['site_main_logo'])) : '' }}"
                            alt="{{ $setting['site_main_logo'] ? get_media($setting['site_main_logo'])->alt : 'Kathmandu Holiday' }}">
                    </a>
                </figure>
                <div class="right-column">
                    <ul class="info-list mr_50">
                        <li><i class="icon-5"></i><a
                                href="tel:{{ $setting['site_phone'] ?? '' }}">{{ $setting['site_phone'] ?? '' }}</a>
                        </li>
                        <li><i class="icon-6"></i><a
                                href="mailto:{{ $setting['site_email'] ?? '' }}">{{ $setting['site_email'] ?? '' }}</a>
                        </li>
                        <li>
                            <a class="theme-btn btn-one text-white px-3" href="/departures/kailash-fixed-departure">
                                Kailash Fixed Departure
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header-lower">
        <div class="auto-container">
            <div class="outer-box">
                <div class="menu-area">
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                    <nav class="main-menu navbar-expand-md navbar-light clearfix">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            @php
                                $menus = getMenus(1);
                            @endphp
                            @if ($menus)
                                <ul class="navigation clearfix">
                                    @foreach ($menus as $key => $value)
                                        @php
                                            $mainclass = isset($value->children) ? ' dropdown' : '';
                                        @endphp
                                        <li class="{{ $mainclass }}">
                                            <a href="{{ $value->slug }}"
                                                target="{{ $value->target ?? '_self' }}">{{ $value->name ?? $value->title }}
                                                @if (isset($value->children))
                                                    <i class="fa fa-angle-down"></i>
                                                @endif
                                            </a>
                                            @if (isset($value->children))
                                                <ul>
                                                    @foreach ($value->children as $key => $child)
                                                        @foreach ($child as $key => $data)
                                                            @php
                                                                $subclass = isset($data->children) ? 'dropdown' : '';
                                                            @endphp
                                                            <li class="{{ $subclass }}">
                                                                <a href="{{ $data->slug }}"
                                                                    target="{{ $data->target ?? '_self' }}">
                                                                    {{ $data->name ?? $data->title }}
                                                                </a>
                                                                @if (isset($data->children))
                                                                    <ul>
                                                                        @foreach ($data->children as $key => $subchild)
                                                                            @foreach ($subchild as $key => $subdata)
                                                                                @php
                                                                                    $sclass = isset($subdata->children)
                                                                                        ? 'dropdown'
                                                                                        : '';
                                                                                @endphp
                                                                                <li class="{{ $sclass }}">
                                                                                    <a href="{{ $subdata->slug }}"
                                                                                        target="{{ $subdata->target ?? '_self' }}">
                                                                                        {{ $subdata->name ?? $subdata->title }}
                                                                                    </a>
                                                                                    @if (isset($subdata->children))
                                                                                        <ul>
                                                                                            @foreach ($subdata->children as $key => $sschild)
                                                                                                @foreach ($sschild as $key => $sbdata)
                                                                                                    @php
                                                                                                        $sbclass = isset(
                                                                                                            $sbdata->children,
                                                                                                        )
                                                                                                            ? 'dropdown'
                                                                                                            : '';
                                                                                                    @endphp
                                                                                                    <li
                                                                                                        class="{{ $sbclass }}">
                                                                                                        <a href="{{ $sbdata->slug }}"
                                                                                                            target="{{ $sbdata->target ?? '_self' }}">
                                                                                                            {{ $sbdata->name ?? $sbdata->title }}
                                                                                                        </a>
                                                                                                    </li>
                                                                                                @endforeach
                                                                                            @endforeach
                                                                                        </ul>
                                                                                    @endif
                                                                                </li>
                                                                            @endforeach
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </nav>
                </div>
                <div class="menu-right-content">
                    <div class="select-box mr_30">
                        <div class="gtranslate_wrapper"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sticky-header">
        <div class="auto-container">
            <div class="outer-box">
                <div class="logo-box">
                    <figure class="logo"><a href="/"><img
                                src="{{ $setting['site_main_logo'] ? asset(get_media_url($setting['site_main_logo'])) : '' }}"
                                alt="{{ $setting['site_main_logo'] ? get_media($setting['site_main_logo'])->alt : 'Kathmandu Holiday' }}"></a>
                    </figure>
                </div>
                <div class="menu-area">
                    <nav class="main-menu clearfix">
                    </nav>
                </div>
                <div class="menu-right-content">
                    <div class="select-box mr_30">
                        <div class="gtranslate_wrapper"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn"><i class="fas fa-times"></i></div>
    <nav class="menu-box">
        <div class="nav-logo">
            <a href="/">
                <img src="{{ $setting['site_main_logo'] ? asset(get_media_url($setting['site_main_logo'])) : '' }}"
                    alt="{{ $setting['site_main_logo'] ? get_media($setting['site_main_logo'])->alt : 'Kathmandu Holiday' }}">
            </a>
        </div>
        <div class="menu-outer"></div>
        <div class="contact-info">
            <h4>Contact Info</h4>
            <ul>
                <li>{!! $setting['site_location'] ?? '' !!}</li>
                <li><a href="tel:{{ $setting['site_phone'] ?? '' }}">{{ $setting['site_phone'] ?? '' }}</a>
                </li>
                <li><a href="mailto:{{ $setting['site_email'] ?? '' }}">{{ $setting['site_email'] ?? '' }}</a>
                </li>
            </ul>
        </div>
        @if ($socialdata->isNotEmpty())
            <div class="social-links">
                <ul class="clearfix">
                    @foreach ($socialdata as $data)
                        <li>
                            <a href="{{ $data->link ?? 'javascript:void(0)' }}"
                                target="{{ $data->link ? '_blank' : '_self' }}"><span
                                    class="{{ $data->icon ?? '' }}"></span></a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </nav>
</div>
