@php
$data = Auth::user()->id;
$user = App\Models\User::find($data);
@endphp

<div class="col-md-2">
    <br><br>
    <img class="card-img-top" style="border-radius: 50%"
        src="{{ !empty($user->profile_photo_path) ? url('upload/userImage/' . $user->profile_photo_path) : url('upload/noImage.png') }}"
        width="80%" height="80%"><br><br>

    <ul class="list-group list-group-flush">
        <a href="" class="btn btn-primary btn-sm btn-block">Home</a>
        <a href="{{ route('user.profile') }}" class="btn btn-info btn-sm btn-block">Profile</a>
        <a href="{{ route('user.password') }}" class="btn btn-success btn-sm btn-block">Changes
            Password</a>
        <a href="{{ route('order.placed') }}" class="btn btn-success btn-sm btn-block">Placed Order</a>
        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>



    </ul>
</div>
