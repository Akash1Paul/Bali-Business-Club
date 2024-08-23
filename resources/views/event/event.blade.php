@section('title', 'Event | BBC')
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
                                    <h1>Events</h1>
                                </div>
                                <div class="col">
                                    <a href="{{url('addevents')}}" class="btn btn-primary">Add</a>
                                </div>
                            </div>
                            <div class="table-responsive mt-4">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Time</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">City</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    @foreach($events as $index => $event)

                                        <tr>
                                            <td>{{ $index+1 }}</td>
                                            <td>{{ $event['name'] }}</td>
                                            <td>{{ date('d/m/Y',strtotime($event['date'])) }}</td>
                                            @php
                                            // Assuming you have a $time variable containing "21:31:00"
                                            $form = $event['form'];
                                            $to = $event['to'];
                                            // Convert the time to Carbon instance
                                            $carbonformTime = \Carbon\Carbon::parse($form);
                                            $carbontoTime = \Carbon\Carbon::parse($to);
                                            // Format the time in 12-hour format (with AM/PM)
                                            $formattedformTime = $carbonformTime->format('g:i A');
                                            $formattedtoTime = $carbontoTime->format('g:i A');
                                        @endphp
                                        
                                            <td>{{$formattedformTime .'-'.$formattedtoTime}}</td>
                                            <td>{{$event['address'] }}</td>
                                            <td>{{$event['city'] }}</td>
                                           

                                            <td>
                                                <a href="edit_event/{{ $event['id'] }}" class="btn btn-warning">Edit</a>

                                                <a href="delete_event/{{ $event['id'] }}" class="btn btn-danger"  onclick="return confirm('Do you want to delete this Event?')">Delete</a>
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