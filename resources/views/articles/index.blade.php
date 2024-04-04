<x-layout-main title="I miei Articoli">

    <x-navbar />

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <h1>I miei Articoli</h1>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('articles.create') }}" class="btn btn-primary">Crea Articolo</a>
            </div>
        </div>
        <x-success />
        <table class="table table-bordered mt-3">
            <tr>
                <th>#</th>
                <th>Autore</th>
                <th>Titolo</th> 
                <th>Categoria</th>                   
                <th></th>
            </tr>
            
            @foreach($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->user->email }}</td>
                <td><a href="">{{ $article->title }}</a></td>
                <td>
                    @foreach($article->categories as $category)
                    {{ $category->name }} <br>
                    @endforeach
                </td>
                <td class="d-flex">
                    <!-- Modifica Articolo -->
                    <a href="{{route('articles.edit', $article)}}" class="btn btn-secondary btn-sm me-1">Modifica</a>

                    <!-- Elimina Articolo -->
                    <form action="{{route('articles.destroy', $article)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm ">Elimina</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

</x-layout-main>
  

