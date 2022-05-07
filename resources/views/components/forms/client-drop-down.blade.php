<div>
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
    <div class="form-group">
        <select class="form-control" name="role_id">
            <option value="">Select Role</option>
            @foreach( [1=>'vendor','seller'] as $key => $client )
                <option value="{{$key}}">{{$client}}</option>
            @endforeach
        </select>
    </div>
</div>
