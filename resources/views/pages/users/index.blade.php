@extends('layout')

@section('content')

<div class="row justify-center mb-4">
    <div class="col-sm-12">
        <a href="{{ route('users.create') }}" class="btn btn-primary">Create New User</a>
    </div>
</div>

@include('partials.success', ['message' => Session::get('responseMessage')])

<div class="row justify-center">
    <div class="col-sm-12">
        <table id="usersTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Birthdate</th>
                    <th>Age</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->birthdate }}</td>
                    <td>{{ $user->age }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Actions
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <a class="dropdown-item" href="{{ route('users.edit', $user->id) }}">Edit</a>
                                <a class="delete-user dropdown-item" href="#" data-user-id="{{ $user->id }}">Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<form id="delete-user-form" method="POST" action="{{ route('users.destroy', '__user_id__') }}">
    @csrf
    @method('DELETE')
    <input type="hidden" name="user_id" id="delete-user-id">
</form>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#usersTable').DataTable();
    });

    $(document).ready(function() {
    $('.delete-user').click(function() {
        var userId = $(this).data('user-id');

        var formAction = $('#delete-user-form').attr('action').replace('__user_id__', userId);
        $('#delete-user-form').attr('action', formAction);
        
        $('#delete-user-id').val(userId);
        if (confirm('Are you sure you want to delete this user?')) {
            $('#delete-user-form').submit();
        }
    });
});
</script>
@endsection

@section('css')
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection