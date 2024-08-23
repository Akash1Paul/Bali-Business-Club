@section('title', 'User | BBC')
@include('layouts.header')

    <div class="container-scroller">

        @include('navbar')

        <div class="container-fluid page-body-wrapper">

            @include('sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mt-4">
                                <div class="col-md-10">
                                    <h1>Users</h1>
                                </div>
                                {{-- <div class="col">
                                    <a href="add_user" class="btn btn-primary">Add</a>
                                </div> --}}
                            </div>
                            <div class="table-responsive mt-4">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Roles</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    @foreach($users as $index => $user)

                                        <tr>
                                            <td>{{ $index+1 }}</td>
                                            <td>{{ $user['name'] }}</td>
                                            <td>{{ $user['email'] }}</td>
                                            <td>
                                                @if($user['roles'] == 1)

                                                    Admin
                                                
                                                @else
                                                    
                                                    User
                                                
                                                @endif
                                            </td>
                                            <td>
                                                
                                                <a href="delete_user/{{ $user['id'] }}" class="btn btn-danger"  onclick="return confirm('Do you want to delete this user?')">Delete</a>
                                            </td>
                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('layouts.footer')

</html>