<footer class="main-footer">
    <div class="pattern-layer" style="background-image: url({{ asset('frontend') }}/assets/images/shape/shape-5.png);">
    </div>
    <div class="widget-section p_relative pt_100 pb_85">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget logo-widget">
                        <figure class="footer-logo">
                            <a href="/">
                                <img src="{{ $setting['site_footer_logo'] ? asset(get_media_url($setting['site_footer_logo'])) : '' }}"
                                    alt="{{ $setting['site_footer_logo'] ? get_media($setting['site_footer_logo'])->alt : 'Kathmandu Holiday' }}">
                            </a>
                        </figure>
                        <div class="text-box">
                            {!! $setting['site_information'] ?? '' !!}
                        </div>
                    </div>
                </div>
                @php
                    $menus = getMenus(2);
                @endphp
                @if ($menus)
                    <div class="col-lg-2 col-md-6 col-sm-12 footer-column">
                        <div class="footer-widget links-widget">
                            <div class="widget-title">
                                <h3>About</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="links-list clearfix">
                                    @foreach ($menus as $key => $value)
                                        <li><a href="{{ $value->slug }}" target="{{ $value->target ?? '_self' }}">
                                                {{ $value->name ?? $value->title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
                @php
                    $menus = getMenus(3);
                @endphp
                @if ($menus)
                    <div class="col-lg-2 col-md-6 col-sm-12 footer-column">
                        <div class="footer-widget links-widget">
                            <div class="widget-title">
                                <h3>Top Cities</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="links-list clearfix">
                                    @foreach ($menus as $key => $value)
                                        <li><a href="{{ $value->slug }}" target="{{ $value->target ?? '_self' }}">
                                                {{ $value->name ?? $value->title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
                @php
                    $menus = getMenus(4);
                @endphp
                @if ($menus)
                    <div class="col-lg-2 col-md-6 col-sm-12 footer-column">
                        <div class="footer-widget links-widget">
                            <div class="widget-title">
                                <h3>Top Countries</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="links-list clearfix">
                                    @foreach ($menus as $key => $value)
                                        <li><a href="{{ $value->slug }}" target="{{ $value->target ?? '_self' }}">
                                                {{ $value->name ?? $value->title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="bottom-inner">
                <div class="copyright">
                    <p>&copy; {{ date('Y') }} <a href="/">Kathmandu Holiday Pvt. Ltd</a>. Made with
                        <i class="fa fa-heart text-danger"></i> by <a href="https://paradiseit.com.np"
                            target="_blank">Paradise
                            InfoTech.</a>
                    </p>
                </div>

                @if ($socialdata->isNotEmpty())
                    <ul class="social-links">
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
</footer>

<div class="scroll-to-top">
    <div>
        <div class="scroll-top-inner">
            <div class="scroll-bar">
                <div class="bar-inner"></div>
            </div>
            <div class="scroll-bar-text">Go To Top</div>
        </div>
    </div>
</div>
