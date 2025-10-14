<div class="form-group mt-3">
    <div class="panel panel-default">
        <div class="panel-header">
            <h4>Activity</h4>
        </div>

        <div class="panel-body package_destination">
            <ul class="category_checkbox" style="padding-left:0">
                @foreach ($activities as $category)
                    @if ($category)
                        <li>
                            <input class="" type="checkbox" name="category[]"
                                @if (in_array($category->id, $activityPackages)) {{ 'checked' }} @endif
                                value="{{ $category->id }}"><label for="option">{{ $category->name }}</label>
                            <ul>
                                @if (count($category->children))
                                    @include('admin.package.includes.subcategory', [
                                        'subCategory' => $category->children,
                                    ])
                                @endif
                            </ul>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>

    </div>
</div>
