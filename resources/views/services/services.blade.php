@section('title', 'Services | BBC')
@include('layouts.header')

<div class="container-scroller">

    @include('navbar')

    <div class="container-fluid page-body-wrapper">

        @include('sidebar')

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-10">
                                <h1>Services</h1>
                            </div>
                            <div class="col">
                                <a href="{{ route('add_service') }}" class="btn btn-primary">Add</a>
                            </div>
                        </div>

                        <div class="mt-4">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">About</th>
                                        <th scope="col">Duration</th>
                                        <th scope="col">Promo Code</th>
                                        <th scope="col">Discount</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($services as $index => $service)
                                        <tr>
                                            <td>{{ $index+1 }}</td>
                                            <td>{{ $service['name'] }}</td>
                                            <td>{{ $service['about'] }}</td>
                                            <td>{{ $service['duration'] }}</td>
                                            <td>{{ $service['promo_code'] }}</td>
                                            <td>{{ $service['discount'] }}</td>
                                            <td>
                                                <a href="edit_service/{{ $service['id'] }}"
                                                    class="btn btn-warning">Edit</a>
                                                <a href="delete_service/{{ $service['id'] }}" class="btn btn-danger"
                                                    onclick="return confirm('Do you want to delete this service?')">Delete</a>
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
