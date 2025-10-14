<div class="form-group">
    <div class="panel panel-default">
        <div class="panel-header">
            <h4>Destinations</h4>
        </div>

        <div class="panel-body package_destination">
            <ul class="category_checkbox" style="padding-left:0">
                @foreach ($destinations as $destination)
                    @if ($destination)
                        <li>
                            <input class="" type="checkbox" name="destination[]"
                                @if (in_array($destination->id, $destinationPackages)) {{ 'checked' }} @endif
                                value="{{ $destination->id }}"><label for="option">{{ $destination->name }}</label>
                            <ul>
                                @if (count($destination->children))
                                    @include('admin.package.includes.subdestinations', [
                                        'subDestinations' => $destination->children,
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
