<x-layout-main>
<x-navbar />

<div class="container mt-4">
  

  <div class="mt-4">
      <div class="row">
        <div class="col-md-6 mx-auto">
        <h1> Contattaci </h1>
          <x-success />
            <div class="alert alert-success">
              {{ session('success')}}
            </div>
          @endif
        <form action="{{ route('contacts.send') }}" method="POST">
          @csrf
        <div class="row g-3">
          <div class="col-12">
            <label for="name">Nome</label>
            <input type="text" id="name" name="name" class="form-control">          
          </div>
          <div class="col-12">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control">
          </div>
          <div class="col-12">
            <label for="message">Messaggio</label>
            <textarea name="message" id="message" rows="6" class="form-control"></textarea>
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary">Invia Messaggio</button>
          </div>

        </div>
    </form>
        </div>
      </div>
    

  </div>




</div>
</x-layout-main>


