<div class="form-group mt-3">
    <div class="panel panel-default">
        <div class="panel-header">
            <h4>Parent Category</h4>
        </div>

        <div class="panel-body package_destination">
            <ul style="padding-left:0" class="category_checkbox">
                @foreach ($activitys as $category)
                    <li>
                        <input type="radio" name="parent_id"
                            @if (in_array($category->id, $activityParents)) {{ 'checked' }} @endif class=""
                            value="{{ $category->id }}">
                            <label for="option">
                                @if( Request::segment(3) != 'create')                
                                    @if($category->id == $activity->id)
                                        <strong>{{ $category->name }}</strong>  
                                        @else
                                        {{ $category->name }}
                                    @endif
                                    @else 
                                        {{ $category->name }}                    
                                @endif
                            </label>
                        <ul>
                            @if (count($category->children))
                                @include('admin.activities.includes.subparent', [
                                    'subParent' => $category->children,
                                ])
                            @endif
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>
</div>
