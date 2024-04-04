<x-layout-main title="modifica articolo">
    <x-navbar />
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 mx-auto">
            <h1 class="mb-4">Modifica articolo</h1>

        <x-success />
        <a href="{{route('articles.index')}}"><<-Indietro</a>
        <form action="{{ route ('articles.update', $article) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-12">
                    <label for="title">Titolo</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $article->title) }}" class="form-control @error('title') is-invalid @enderror">
                    @error('title') <span class="text-danger small"> {{ $message }}</span>@enderror
                </div>
                <div class="col-12">
                    <label for="categories">Categoria</label>
                            @foreach($categories as $category)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"
                                    @checked(in_array($category->id, old('categories', $article->categories->pluck('id')->toArray())))
                                    name="categories[]" value=" {{$category->id}} " id="categories_{{ $category->id }}">
                                    <label class="form-check-label" for="flexCheckDefault">                              {{ $category->name }}
                                    </label>
                                </div>
                            @endforeach
                        @error('categories') <span class="text-danger small"> {{ $message }}</span>@enderror
                </div>
                <div class="col-12">
                    <label for="description">Descrizione</label>
                    <textarea name="description" id="description" rows="4" 
                        class="form-control @error('description') is-invalid @enderror">{{ old('description', $article->description)}}</textarea>
                    @error('description') <span class="text-danger small"> {{ $message }}</span>@enderror
                </div>
                <div class="col-12">
                    <label for="image">Immagine</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="col-12">
                    <label for="body">Corpo</label>
                    <textarea name="body" id="body" rows="10" 
                        class="form-control">{{ old('body', $article->body)}}</textarea>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary ">Salva</button>
                </div>
            </div>
        </form>
            </div>
        </div>
    </div>



    

</x-layout-main>
  

