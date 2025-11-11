<aside class="layout-menu menu-vertical menu bg-menu-theme" id="layout-menu">
    <div class="app-brand demo p-0">
        <a class="app-brand-link mx-auto my-0" href="{{ route('home') }}" target="_blank">
            @if ($setting['site_main_logo'])
                <img src="{{ $setting['site_main_logo'] ? asset(get_media($setting['site_main_logo'])->fullurl) : '' }}"
                    alt="{{ $setting['site_main_logo'] ? get_media($setting['site_main_logo'])->alt : 'Kathmandu Holiday' }}"
                    height="40">
            @else
                <span class="app-brand-text demo menu-text fw-bolder ms-2">Kathmandu Holiday</span>
            @endif
        </a>

        <a class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none" href="javascript:void(0);">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('dashboard') }}">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-item @if (Request::segment(2) == 'media') {{ 'active open' }} @endif">
            <a class="menu-link {{ Request::segment(2) == 'media' ? 'active' : '' }}" href="{{ route('media.index') }}">
                <i class="menu-icon tf-icons bx bx-images"></i>
                <div data-i18n="Accordion">Media</div>
            </a>
        </li>

        <li class="menu-item @if (Request::segment(2) == 'menus') {{ 'active open' }} @endif">
            <a class="menu-link {{ Request::segment(2) == 'menus' ? 'active' : '' }}"
                href="{{ route('admin.menu.index') }}">
                <i class="menu-icon tf-icons bx bx-menu-alt-right"></i>
                <div data-i18n="Accordion">Menu</div>
            </a>
        </li>
        <li
            class="menu-item @if (Request::segment(2) == 'contacts' || Request::segment(2) == 'packageinquiry') {{ 'active open' }} @endif">
            <a class="menu-link menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bx-notepad"></i>
                <div data-i18n="General Setting">Form</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item @if (Request::segment(2) == 'contacts') {{ 'active open' }} @endif">
                    <a class="menu-link {{ Request::segment(2) == 'contacts' ? 'active' : '' }}"
                        href="{{ route('contacts.index') }}">
                        <i class="menu-icon tf-icons bx bxs-contact"></i>
                        <div data-i18n="Accordion">Inquiries</div>
                    </a>
                </li>
                <li class="menu-item @if (Request::segment(2) == 'packageinquiry') {{ 'active open' }} @endif">
                    <a class="menu-link {{ Request::segment(2) == 'packageinquiry' ? 'active' : '' }}"
                        href="{{ route('packageinquiry.index') }}">
                        <i class="menu-icon tf-icons bx bxs-contact"></i>
                        <div data-i18n="Accordion">Booking</div>
                    </a>
                </li>

            </ul>
        </li>

        <!-- CMS -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">CMS</span></li>
        <!-- Cards -->
        <li
            class="menu-item @if (Request::segment(2) == 'blog' || Request::segment(2) == 'blogcategory') {{ 'active open' }} @endif">
            <a class="menu-link menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bx-news"></i>
                <div data-i18n="General Setting">Posts</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'blog' && Request::segment(3) == '' ? 'active' : '' }}"
                        href="{{ route('blog.index') }}">
                        <i class="menu-icon tf-icons bx bx-news"></i>
                        <div data-i18n="Accordion">All Posts</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'blog' && Request::segment(3) == 'create' ? 'active' : '' }}"
                        href="{{ route('blog.create') }}">
                        <i class="menu-icon tf-icons bx bxs-file-plus"></i>
                        <div data-i18n="Accordion">Create Post</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'blogcategory' ? 'active' : '' }}"
                        href="{{ route('blogcategory.index') }}">
                        <i class="menu-icon tf-icons bx bxs-file"></i>
                        <div data-i18n="Accordion">Categories</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item @if (Request::segment(2) == 'page') {{ 'active open' }} @endif">
            <a class="menu-link menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="General Setting">Pages</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'page' && Request::segment(3) == '' ? 'active' : '' }}"
                        href="{{ route('page.index') }}">
                        <i class="menu-icon tf-icons bx bx-file"></i>
                        <div data-i18n="Accordion">All Pages</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'page' && Request::segment(3) == 'create' ? 'active' : '' }}"
                        href="{{ route('page.create') }}">
                        <i class="menu-icon tf-icons bx bxs-file-plus"></i>
                        <div data-i18n="Accordion">Create Page</div>
                    </a>
                </li>

            </ul>
        </li>
        <li class="menu-item @if (
            Request::segment(2) == 'packages' ||
            Request::segment(2) == 'activities' ||
            Request::segment(2) == 'destinations' ||
            Request::segment(2) == 'departure'
        ) {{ 'active open' }} @endif">
            <a class="menu-link menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bx-package"></i>
                <div data-i18n="General Setting">Packages</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'packages' && Request::segment(3) == '' ? 'active' : '' }}"
                        href="{{ route('packages.index') }}">
                        <i class="menu-icon tf-icons bx bx-package"></i>
                        <div data-i18n="Accordion">All Packages</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'packages' && Request::segment(3) == 'create' ? 'active' : '' }}"
                        href="{{ route('packages.create') }}">
                        <i class="menu-icon tf-icons bx bxs-file-plus"></i>
                        <div data-i18n="Accordion">Create Package</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'destinations' ? 'active' : '' }}"
                        href="{{ route('destinations.index') }}">
                        <i class="menu-icon tf-icons bx bx-world"></i>
                        <div data-i18n="Basic">Destinations</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'activities' ? 'active' : '' }}"
                        href="{{ route('activities.index') }}">
                        <i class="menu-icon tf-icons bx bx-run"></i>
                        <div data-i18n="Basic">Activities</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'departure' ? 'active' : '' }}"
                        href="{{ route('departure.index') }}">
                        <i class="menu-icon tf-icons bx bx-calendar"></i>
                        <div data-i18n="Basic">Departures</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item @if (Request::segment(2) == 'review') {{ 'active open' }} @endif">
            <a class="menu-link menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bxs-quote-alt-left"></i>
                <div data-i18n="General Setting">Reviews</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'review' && Request::segment(3) == '' ? 'active' : '' }}"
                        href="{{ route('review.index') }}">
                        <i class="menu-icon tf-icons bx bxs-quote-alt-left"></i>
                        <div data-i18n="Accordion">All Reviews</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'review' && Request::segment(3) == 'create' ? 'active' : '' }}"
                        href="{{ route('review.create') }}">
                        <i class="menu-icon tf-icons bx bxs-file-plus"></i>
                        <div data-i18n="Accordion">Create Review</div>
                    </a>
                </li>

            </ul>
        </li>
        <li class="menu-item @if (Request::segment(2) == 'download') {{ 'active open' }} @endif">
            <a class="menu-link menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bx-download"></i>
                <div data-i18n="General Setting">Downloads</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'download' && Request::segment(3) == '' ? 'active' : '' }}"
                        href="{{ route('download.index') }}">
                        <i class="menu-icon tf-icons bx bx-download"></i>
                        <div data-i18n="Accordion">All Downloads</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'download' && Request::segment(3) == 'create' ? 'active' : '' }}"
                        href="{{ route('download.create') }}">
                        <i class="menu-icon tf-icons bx bx-plus"></i>
                        <div data-i18n="Accordion">Create Download</div>
                    </a>
                </li>

            </ul>
        </li>
        <li class="menu-item @if (Request::segment(2) == 'members') {{ 'active open' }} @endif">
            <a class="menu-link menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bx-user-pin"></i>
                <div data-i18n="General Setting">Teams</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'members' && Request::segment(3) == '' ? 'active' : '' }}"
                        href="{{ route('members.index') }}">
                        <i class="menu-icon tf-icons bx bx-user-pin"></i>
                        <div data-i18n="Accordion">All Teams</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'members' && Request::segment(3) == 'create' ? 'active' : '' }}"
                        href="{{ route('members.create') }}">
                        <i class="menu-icon tf-icons bx bxs-user-plus"></i>
                        <div data-i18n="Accordion">Create Team</div>
                    </a>
                </li>

            </ul>
        </li>
        <li class="menu-item @if (Request::segment(2) == 'services') {{ 'active open' }} @endif">
            <a class="menu-link menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bx-analyse"></i>
                <div data-i18n="General Setting">Services</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'services' && Request::segment(3) == '' ? 'active' : '' }}"
                        href="{{ route('services.index') }}">
                        <i class="menu-icon tf-icons bx bx-analyse"></i>
                        <div data-i18n="Accordion">All Services</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'services' && Request::segment(3) == 'create' ? 'active' : '' }}"
                        href="{{ route('services.create') }}">
                        <i class="menu-icon tf-icons bx bxs-file-plus"></i>
                        <div data-i18n="Accordion">Create Service</div>
                    </a>
                </li>

            </ul>
        </li>
        <li class="menu-item @if (Request::segment(2) == 'partner') {{ 'active open' }} @endif">
            <a class="menu-link menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="General Setting">Partners</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'partner' && Request::segment(3) == '' ? 'active' : '' }}"
                        href="{{ route('partner.index') }}">
                        <i class="menu-icon tf-icons bx bx-group"></i>
                        <div data-i18n="Accordion">All Partners</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'partner' && Request::segment(3) == 'create' ? 'active' : '' }}"
                        href="{{ route('partner.create') }}">
                        <i class="menu-icon tf-icons bx bxs-file-plus"></i>
                        <div data-i18n="Accordion">Create Partner</div>
                    </a>
                </li>

            </ul>
        </li>
        <li class="menu-item @if (Request::segment(2) == 'branch') {{ 'active open' }} @endif">
            <a class="menu-link menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bx-location-plus"></i>
                <div data-i18n="General Setting">Branches</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'branch' && Request::segment(3) == '' ? 'active' : '' }}"
                        href="{{ route('branches.index') }}">
                        <i class="menu-icon tf-icons bx bx-location-plus"></i>
                        <div data-i18n="Accordion">All Branches</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'branch' && Request::segment(3) == 'create' ? 'active' : '' }}"
                        href="{{ route('branches.create') }}">
                        <i class="menu-icon tf-icons bx bxs-file-plus"></i>
                        <div data-i18n="Accordion">Create Branch</div>
                    </a>
                </li>

            </ul>
        </li>

        <li class="menu-item @if (Request::segment(2) == 'faq') {{ 'active open' }} @endif">
            <a class="menu-link menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bx-question-mark"></i>
                <div data-i18n="General Setting">Faqs</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'faq' && Request::segment(3) == '' ? 'active' : '' }}"
                        href="{{ route('faq.index') }}">
                        <i class="menu-icon tf-icons bx bx-question-mark"></i>
                        <div data-i18n="Accordion">All Faqs</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'faq' && Request::segment(3) == 'create' ? 'active' : '' }}"
                        href="{{ route('faq.create') }}">
                        <i class="menu-icon tf-icons bx bxs-file-plus"></i>
                        <div data-i18n="Accordion">Create Faq</div>
                    </a>
                </li>

            </ul>
        </li>

        <li class="menu-item @if (Request::segment(2) == 'slider') {{ 'active open' }} @endif">
            <a class="menu-link menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bx-slider-alt"></i>
                <div data-i18n="General Setting">Sliders</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'slider' && Request::segment(3) == '' ? 'active' : '' }}"
                        href="{{ route('slider.index') }}">
                        <i class="menu-icon tf-icons bx bx-slider-alt"></i>
                        <div data-i18n="Accordion">All Sliders</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'slider' && Request::segment(3) == 'create' ? 'active' : '' }}"
                        href="{{ route('slider.create') }}">
                        <i class="menu-icon tf-icons bx bxs-file-plus"></i>
                        <div data-i18n="Accordion">Create Slider</div>
                    </a>
                </li>

            </ul>
        </li>
        <li class="menu-item @if (Request::segment(2) == 'youtube') {{ 'active open' }} @endif">
            <a class="menu-link menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bx-slider-alt"></i>
                <div data-i18n="General Setting">Youtube Links</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'youtube' && Request::segment(3) == '' ? 'active' : '' }}"
                        href="{{ route('youtube.index') }}">
                        <i class="menu-icon tf-icons bx bx-slider-alt"></i>
                        <div data-i18n="Accordion">All Links</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'youtube' && Request::segment(3) == 'create' ? 'active' : '' }}"
                        href="{{ route('youtube.create') }}">
                        <i class="menu-icon tf-icons bx bxs-file-plus"></i>
                        <div data-i18n="Accordion">Create Links</div>
                    </a>
                </li>

            </ul>

            <!-- General Settings  -->
        <li
            class="menu-item @if (Request::segment(2) == 'setting' || Request::segment(2) == 'social' || Request::segment(2) == 'whyus') {{ 'active open' }} @endif">
            <a class="menu-link menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="General Setting">Global Setting</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'setting' ? 'active' : '' }}"
                        href="{{ route('admin.setting.index') }}">
                        <i class="menu-icon tf-icons bx bx-cog"></i>
                        <div data-i18n="Accordion">Setting</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'social' ? 'active' : '' }}"
                        href="{{ route('social.index') }}">
                        <i class="menu-icon tf-icons bx bx-images"></i>
                        <div data-i18n="Accordion">Social Icons</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'whyus' ? 'active' : '' }}"
                        href="{{ route('whyus.index') }}">
                        <i class="menu-icon tf-icons bx bx-info-square"></i>
                        <div data-i18n="Accordion">Why Us</div>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</aside>