<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>APP Verbs</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}"> 

</head>
<body> 
  <div class="container pt-4 pb-4">
    @if (Route::has('login'))
    <div class="row">
      <div class="col-lg-12">
        @auth
        <div class="float-end">
          <a  href="{{ url('/admin') }}" class="btn btn-success btn-lg">admin</a>
      </div>
        @else
        <div class="float-end">
            <a  href="{{ route('login') }}" class="btn btn-danger btn-lg">Log</a>
        </div>
        @endauth
      </div>
    </div>
    @endif
   <div class="row">      
      <div class="col-lg-12 pt-4 pb-4 ">
        <ul class="nav nav-pills mb-3 " id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab"  data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Verbs</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link"  id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Adjetives</button>
          </li>         
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="col-lg-12">         
              @livewire('show-verb')
            </div>
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="col-lg-12">
              @livewire('show-adjective')
            </div>
          </div>          
        </div>        
      </div>
   </div>
  </div>
@livewireScripts
<script src="{{ mix('/js/app.js') }}"></script> 
<script>
  document.addEventListener('DOMContentLoaded', function () {
    let tabs = document.querySelectorAll('[data-bs-toggle="pill"]');
    tabs.forEach(function(tab) {
        tab.addEventListener('click', function(event) {
           Livewire.emit('tabChanged');
           Livewire.emit('tabChanged2');

           // Livewire.emit
           console.log("vamos bien");
           
        });
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>
</body>
</html>