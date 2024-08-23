@section('title', 'Edit Event | BBC')
@include('layouts.header')

    <div class="container-scroller">

        @include('navbar')

        <div class="container-fluid page-body-wrapper">

            @include('sidebar')

            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="card">
                        <div class="card-body">

                            <form action="{{url('saveeditevent/'.$events['id'])}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mt-4">
                                    <h2>Edit Event</h2>
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
                                    <div class="col-md-6" id="date">
                                        <label for="description">Date <span class="text-danger">*</span></label>
                                        <input type="date" name="date" id="tbDate" class="form-control" value="{{ $events['date'] }}" autocomplete="off">
                                       
                                    </div>
                                   
                                    <div class="col-md-6">
                                        <label for="name">Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" value=" {{ $events['name'] }} ">
                                    </div>
                                    
                                    
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <label for="name">From <span class="text-danger">*</span></label>
                                        <input type="time" name="form" id="form" class="form-control"  value="{{ $events['form'] }}" step="2" >
                                    </div>
                                    <div class="col-md-6">
                                        <label for="description">To <span class="text-danger">*</span></label>
                                        <input type="time" name="to" id="to" class="form-control" value="{{ $events['to'] }}" step="2">
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <label for="name">Address <span class="text-danger">*</span></label>
                                        <textarea name="address" id="address" cols="30" rows="10" class="form-control h-auto">{{ $events['address'] }}</textarea>
                                     
                                    </div>
                                    <div class="col-md-6">
                                        <label for="description">City <span class="text-danger">*</span></label>
                                        <input type="text" name="city" id="city" class="form-control" value="{{ $events['city'] }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="description">Price <span class="text-danger">*</span></label>
                                        <input type="text" name="price" id="price" class="form-control" value="{{ $events['price'] }}">
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <label for="name">About <span class="text-danger">*</span></label>
                                        <textarea name="about" id="about" cols="30" rows="10" class="form-control h-auto">{{ $events['about'] }}</textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="name">Background Image</label>
                                        <input type="file" name="photo" id="image" class="form-control" accept="image/*" value="{{ $events['image'] }}" onchange="getFile(event);">
                                      
                                        <img id="imagePreview" src="{{$events['image']}}" alt="Image Preview" style=" max-width:100%; margin-top: 10px; height:200px; width:200px;">
                                        <div class="col-md-12">
                                            <button type="button" class="btn btn-outline-primary mt-3" onclick="uploadImage();">Upload Image</button>
                                        </div>
                                    </div>
                                    <input type="text" id="imagepath" name="imagepath" hidden>
                                    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
                                    <script>
                                                                                const firebaseConfig = {
                                                                                  apiKey: "AIzaSyCXh__jgwwkzXSbbBafv-oIFBj38HhjpRw",
                                                                                  authDomain: "balibusinessclub-4cbca.firebaseapp.com",
                                                                                  projectId: "balibusinessclub-4cbca",
                                                                                  storageBucket: "balibusinessclub-4cbca.appspot.com",
                                                                                  messagingSenderId: "860665696175",
                                                                                  appId: "1:860665696175:web:2cdebb2921d3e7872ee95a"
                                                                                };
                                  
                                    </script>

<script>
    var fileItem;
    var fileName;
    function getFile(e) {
        fileItem = e.target.files[0];
        fileName = fileItem.name;
    }
    function uploadImage() {
        let storageRef = firebase.storage().ref("Images/" + fileName);
        let uploadTask = storageRef.put(fileItem);

        uploadTask.on("state_changed",(snapshot) => {
            console.log(snapshot);
        }, (error) => {
            console.log("Error is ", error);
        }, () => {
            uploadTask.snapshot.ref.getDownloadURL().then((url) => {
                console.log("URL", url);
                document.getElementById('imagepath').value = url;
                alert('Photo Uploaded');
            });
        });
    }

    firebase.initializeApp(firebaseConfig);
   

   


</script>
                                    <script>
                                        document.getElementById('image').addEventListener('change', function() {
    var reader = new FileReader();

    reader.onload = function(e) {
        var previewImage = document.getElementById('imagePreview');
        previewImage.src = e.target.result;
        previewImage.style.display = 'block';
    };

    reader.readAsDataURL(this.files[0]);
});

                                    </script>
                                </div>

                                <div class="row mt-4">
                                    <div class="col">
                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{url('event')}}" class="btn btn-danger">Cancel</a>
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