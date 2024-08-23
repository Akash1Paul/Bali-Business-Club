@section('title', 'Edit Services | BBC')
@include('layouts.header')

<div class="container-scroller">

    @include('navbar')

    <div class="container-fluid page-body-wrapper">

        @include('sidebar')

        <div class="main-panel">
            <div class="content-wrapper">

                <div class="card">
                    <div class="card-body">

                        <form action=" {{ route('edit_service', $service[0]['id']) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mt-4">

                                <h2>Edit Product</h2>

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
                                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ $service[0]['name'] }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="duration" class="form-label">Duration (in hours) <span class="text-danger">*</span></label>
                                        <input type="number" name="duration" id="duration" class="form-control"
                                            value="{{ $service[0]['duration'] }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="promo_code" class="form-label">Promo Code <span class="text-danger">*</span></label>
                                        <input type="text" name="promo_code" id="promo_code" class="form-control"
                                            value="{{ $service[0]['promo_code'] }}">
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <label for="category" class="form-label">About <span class="text-danger">*</span></label>
                                        <textarea class="form-control h-auto" name="about" id="about" rows="5" cols="10">{{ $service[0]['about'] }}</textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="discount" class="form-label">Discount <span class="text-danger">*</span></label>
                                        <input type="number" name="discount" id="discount" class="form-control"
                                            value="{{ $service[0]['discount'] }}">
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="name">Background Image</label>
                                        <input type="file" name="photo" id="image" class="form-control" accept="image/*" value="{{ $service[0]['image'] }}" onchange="getFile(event);">
                                      
                                        <img id="imagePreview" src="{{$service[0]['image']}}" alt="Image Preview" style=" max-width:100%; margin-top: 10px; height:200px; width:200px;">
                                      
                                    </div>
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-outline-primary mt-3" onclick="uploadImage();">Upload Image</button>
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
                                     <div class="col-md-6">
                                        <label for="discount" class="form-label">Popularity <span class="text-danger">*</span></label>
                                            <select name="popularity" id="popularity"  class="form-control">
                                                <option value="" disabled selected>Select</option>
                                                <option value="low"  {{$service[0]['popularity'] == 'low' ? 'selected' : '' }}>Low</option>
                                                <option value="medium"  {{$service[0]['popularity'] == 'medium' ? 'selected' : '' }}>Medium</option>
                                                <option value="high"  {{$service[0]['popularity'] == 'high' ? 'selected' : '' }}>High</option>
                                            </select>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col">
                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')

</html>
