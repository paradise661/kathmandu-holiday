@if ($subParent)
    @php
        $dash = $count;
    @endphp
    @foreach ($subParent as $sub)
        <p>{!! $dash !!}<input type="checkbox" name="{{ $fname }}" value="{{ $sub->id }}">
            {{ $sub->name }}</p>
        @if (count($sub->children))
            @include('admin.menu.includes.subparent', [
                'subParent' => $sub->children,
                'fname' => $fname,
                'count' => $dash . '&nbsp;&nbsp;',
            ])
        @endif
    @endforeach
@endif
