@section('title', 'Discount | BBC')
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
                                    <h1>Discount</h1>
                                </div>
                                <div class="col">
                                    <a href="{{url('add_discount')}}" class="btn btn-primary">Add</a>
                                </div>
                            </div>
                            <div class="table-responsive mt-4">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Promo Code</th>
                                            <th scope="col">Discount(%)</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    @foreach($discounts as  $index => $discount)

                                        <tr>
                                            <td>{{ $index+1 }}</td>
                                            <td>{{ $discount['name'] }}</td>
                                            <td>{{ $discount['promo_code'] }}</td>
                                            <td>{{ $discount['discount'] }}</td>
                                         
                                            <td>
                                                <a href="edit_discount/{{ $discount['id'] }}" class="btn btn-warning">Edit</a>

                                                <a href="delete_discount/{{ $discount['id'] }}" class="btn btn-danger"  onclick="return confirm('Do you want to delete this Discount?')">Delete</a>
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