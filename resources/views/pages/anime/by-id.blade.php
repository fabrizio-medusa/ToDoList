<x-layout-main :title="$title">
    <x-navbar/>
    <div class="container mt-4">
    <h1>{{ $title }}</h1>

    <div class="row">
        @foreach($anime as $animeItem)
            <div class="col-md-4 col-12">
                <div class="card mt-3">
                    <div class="row g-0">
                        <!-- text -->
                        <div class="col-md-12 col-lg-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $animeItem['title'] }}</h5>
                                <p class="card-text">{{ Str::limit($animeItem['synopsis'], 100, '...') }}</p>
                            </div>
                        </div>

                        <!-- image -->
                        <div class="col-md-12 col-lg-4">
                            <img src="{{$animeItem['images']['jpg']['image_url']}}" class="img-fluid rounded-end" alt="{{$animeItem['title']}}">
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="card-footer">
                        <small class="text-muted">Duration: {{$animeItem['duration']}}</small>
                        <small class="text-muted float-end">Score: {{$animeItem['score']}}/10</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

</x-layout-main>