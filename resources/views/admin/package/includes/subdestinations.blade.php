@if ($subDestinations)
    @foreach ($subDestinations as $sub)
        @if ($sub)
            <li>
                <input class="" type="checkbox" @if (in_array($sub->id, $destinationPackages)) {{ 'checked' }} @endif
                    name="destination[]" value="{{ $sub->id }}">
                <label>{{ $sub->name }}</label>
                <ul>
                    @if (count($sub->children))
                        @include('admin.package.includes.subdestinations', [
                            'subDestinations' => $sub->children,
                        ])
                    @endif
                </ul>
            </li>
        @endif
    @endforeach
@endif
