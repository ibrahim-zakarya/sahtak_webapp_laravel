@extends('dashboard.master')
@section('usersActive')
    active
@endsection
@section('content')
@section('title')
    Users
@endsection

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Full name</th>
            <th scope="col">Email</th>
            <th scope="col">Registration date</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->created_at}}</td>
            <td>
                <a onclick="getCurrentUser({{$user->id}})" href="/users/{{$user->id}}/delete" style="color:red;" data-toggle="modal" data-target="#exampleModal">
                    <i class="far fa-trash-alt"></i>
                </a>

            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this user?
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary" onclick="deleteUser()">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Error</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="errorBody">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
                    {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                </div>
            </div>
        </div>
    </div>
    <script>
        var currnet_user = 0;
        function getCurrentUser(userId) {
            currnet_user = userId;
            // alert(currnet_user);
        }

        function deleteUser() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/users/' + currnet_user + '/delete',
                type: "DELETE",
                success: function (d) {

                    if (d['msg']) {
                        $('#exampleModal').modal('hide');
                        $('#errorBody').append( d['msg'] );
                        $('#errorModal').modal('show');
                        return;
                    }
                    location.reload();

                }
            })
        }
    </script>
@endsection