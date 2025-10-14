<section class="page-title centred">
    <div class="bg-layer"
        style="background-image: url({{ $banner ? get_media_url($banner, '', 'banner') : asset('storage/kathmandu-banner-9.jpg') }});">
    </div>
    <div class="auto-container">
        <div class="content-box">
            <span>{{ $parentname ?? '' }}</span>
            <h1>{{ $name ?? '' }}</h1>
        </div>
    </div>
</section>
