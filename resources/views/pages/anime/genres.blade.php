<x-layout-main :title="$title">
    <x-navbar/>
    <div class="container mt-4">
        <h1>{{ $title }}</h1>
        @foreach($genres as $genre)
        <div class="row">
            <a href="{{ route('anime.bygenres', ['id' => $genre['mal_id'], 'name' => $genre['name']]) }}" class="text-decoration-none">
                <div class="col-12 mt-3 py-3 bg-secondary text-center fs-2 fw-bold text-white my-hover">
                    {{ $genre['name'] }}
                </div>
            </a>
        </div>            
        @endforeach        
    </div>
</x-layout-main>