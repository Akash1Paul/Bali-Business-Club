@section('title', 'Edit Discount | BBC')
@include('layouts.header')

    <div class="container-scroller">

        @include('navbar')

        <div class="container-fluid page-body-wrapper">

            @include('sidebar')

            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="card">
                        <div class="card-body">

                            <form action="{{url('saveeditdiscount/'.$discounts['id'])}}" method="POST" >
                                @csrf

                                <div class="mt-4">
                                    <h2>Edit Discount</h2>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        @if ($errors->any())
                                        <div class="alert alert-danger mt-0">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <label for="name">Event <span class="text-danger">*</span></label>
                                        <select name="event_id" id="" class="form-control">
                                            <option value="">Select Event</option>
                                            @foreach ($events as $item)
                                                <option value="{{$item->id}}"{{ $item->id==$discounts['event_id'] ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="name">Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ $discounts['name'] }}">  
                                    </div>   
                                </div>

                               
                                <div class="row mt-4">
                                   
                                    <div class="col-md-6">
                                        <label for="description">Promo Code <span class="text-danger">*</span></label>
                                        <input type="text" name="promo_code" id="promo_code" class="form-control" value="{{ $discounts['promo_code'] }}">
                                    </div>
                                   

                                    <div class="col-md-6">
                                        <label for="description">Discount <span class="text-danger">*</span></label>
                                        <input type="text" name="discount" id="discount" class="form-control" value="{{ $discounts['discount'] }}">
                                    </div>
                                </div>
                               

                                <div class="row mt-4">
                                    <div class="col">
                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{url('discount')}}" class="btn btn-danger">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>

                      
                    </div>
                   
                </div>
          
            </div>
      
        </div>
        
    </div>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $('#tbDate').daterangepicker({
        "singleDatePicker": true,
        "startDate": "{{ date('m/d/Y') }}",
      }, function(start, end, label) {
        console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
        
      });
    
</script>
    @include('layouts.footer')

</html>