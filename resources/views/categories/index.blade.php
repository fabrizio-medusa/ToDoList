<x-layout-main title="Categorie">

    <x-navbar />

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <h1>Categorie</h1>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{route('categories.create')}}" class="btn btn-primary">Crea Categoria</a>
            </div>
        </div>
        <x-success />
        <table class="table table-bordered mt-3">
            <tr>
                <th>#</th>
                <th>Categoria</th>
                <th>Articoli</th>
                <th></th>
            </tr>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <ul>
                        <li>
                            @foreach($category->articles as $article)
                            {{ $article->title }}
                            <br>
                            @endforeach
                        </li>
                    </ul>
                    
                </td>
                <td class="text-start">
                    <!-- Modifica Categoria -->
                    <a href="{{route('categories.edit', $category)}}" class="btn btn-secondary btn-sm">Modifica</a>
                    
                    <!-- Elimina Categoria -->
                    <form action="{{route('categories.destroy', $category)}}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Elimina</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>                
    </div>

</x-layout-main>
  

