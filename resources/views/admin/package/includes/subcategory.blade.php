@if ($subCategory)
    @foreach ($subCategory as $sub)
        @if ($sub)
            <li>
                <input class="" type="checkbox" @if (in_array($sub->id, $activityPackages)) {{ 'checked' }} @endif
                    name="category[]" value="{{ $sub->id }}">
                <label>{{ $sub->name }}</label>
                <ul>
                    @if (count($sub->children))
                        @include('admin.package.includes.subcategory', [
                            'subCategory' => $sub->children,
                        ])
                    @endif
                </ul>
            </li>
        @endif
    @endforeach
@endif
