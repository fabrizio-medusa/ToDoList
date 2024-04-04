<x-layout-main title="Categorie">
    <x-navbar />

    <div class="container mt-4">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <h1>Modifica una Categoria</h1>
                        <x-success />
                        <a href="{{route('categories.index')}}">Indietro</a>
                    <form action="{{ route('categories.update', $category)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g3">
                            <div class="col-12">
                                <label for="name">Nome</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category ->name )}}" maxlength="50">
                                @error('name') <span class="text-danger small">{{$message}}</span>@enderror
                            </div>
                            <div class="col-12 mt-2">
                                <button class="btn btn-primary" type="submit">Salva</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>  
    </div>

</x-layout-main>
  

