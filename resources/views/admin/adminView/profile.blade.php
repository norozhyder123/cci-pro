@extends('admin.index')
@section('content')
<div class="col-lg-9 col-md-12 col-sm-12 ps-3">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div class="text_size-24 font_weight--500">Welcome Admin</div>
        
    </div>
    <div class="stock_update mb-3">
        <form action="{{ route('admin.profile.update',['id' => $users->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
             @foreach ($errors->all() as $error)
                 <p class="text-danger">{{$error}}</p>
             @endforeach
            @endif
            @if(session()->has('message'))
                <p class="text-success">
                    {{ session()->get('message') }}
                </p>
            @endif
            <fieldset class="form-group">
                <label for="exampleInputfirstName">Name</label>
                <input type="text" class="form-control" id="exampleInputfirstName" placeholder="Enter email" value="{{ $users->name }}" name="name" required="">
            </fieldset>
            
            <fieldset class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{ $users->email }}" name="email" required="">
                <small class="text-muted">We'll never share your email with anyone else.</small>
            </fieldset>
            <fieldset class="form-group">
                <label for="exampleInputphone">Phone</label>
                <input type="text" class="form-control" id="exampleInputphone" placeholder="Enter Phone" value="{{ $users->phone }}" name="phone">
                <small class="text-muted">We'll never share your phone with anyone else.</small>
            </fieldset>
            <fieldset class="form-group">
                <label for="exampleInputoldPassword">Old Password</label>
                <input type="password" class="form-control" id="exampleInputoldPassword" placeholder="Enter Old Password" name="old_password">
                <small class="text-muted">If You want to Change Password than Provide Old Password Or If you want other changes you don't require password</small>
            </fieldset>
            <fieldset class="form-group">
                <label for="exampleInputnewPassword">New Password</label>
                <input type="password" class="form-control" id="exampleInputnewPassword" placeholder="Enter New Password" name="password">
            </fieldset>
            <!-- <fieldset class="form-group">
                <label for="exampleSelect1">Status</label>
                <select class="form-control color-black" id="eexampleSelect11" name="status">
                    <option value="active" {{ $users->status == 'active'?'selected':'' }}>Active</option>
                    <option value="pending" {{ $users->status == 'pending'?'selected':'' }}>Pending</option>
                    <option value="inactive" {{ $users->status == 'inactive'?'selected':'' }}>Inactive</option>
                    <option value="suspended" {{ $users->status == 'suspended'?'selected':'' }}>Suspend</option>
                </select>
            </fieldset> -->
            <fieldset class="form-group">
                <label for="exampleInputstate">State</label>
                <input type="text" class="form-control" id="exampleInputstate" placeholder="Enter State" value="{{ $users->state }}" name="state">
            </fieldset>
            <fieldset class="form-group">
                <label for="exampleInputcountry">Country</label>
                <input type="text" class="form-control" id="exampleInputcountry" placeholder="Enter Country" value="{{ $users->country }}" name="country">
            </fieldset>
            <fieldset class="form-group">
                <label for="exampleInputcity">City</label>
                <input type="text" class="form-control" id="exampleInputcity" placeholder="Enter City" value="{{ $users->city }}" name="city">
            </fieldset>
            <fieldset class="form-group">
                <label for="exampleInputzipcode">Zip Code</label>
                <input type="text" class="form-control" id="exampleInputzipcode" placeholder="Enter Country" value="{{ $users->zip_code }}" name="zip_code">
            </fieldset>
            <fieldset class="form-group">
                <label for="exampleInputprofileImg">Profile Image</label>
                <input type="file" class="form-control" id="exampleInputprofileImg" name="profile_img" accept="image/png, image/gif, image/jpeg">
            </fieldset>
            <button type="submit" class="btn green_btn mt-3">Update</button>
        </form>
    </div>
</div>
@endsection