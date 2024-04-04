<x-layout-main title="Accedi">

    <x-navbar />

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card rounded-top-4">
                    <div class="card-header">
                        Accedi
                    </div>
                    <div class="card-body">
                            <form action="/login" method="POST">
                                @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="email""></label>
                                    <input type="email" name="email" id="email" value="{{old ('email')}}" class="form-control rounded-5" placeholder="Email">
                                    @error('email') <span class="text-danger small"> {{ $message }} </span>@enderror
                                </div>
                                <div class="col-12">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control rounded-5" placeholder="Password">
                                    @error('password') <span class="text-danger small"> {{ $message }} </span>@enderror
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary mt-2 rounded-5">Accedi</button>
                                </div>
                                <div class="col-12 text-center">
                                    <span>Non sei registrato? clicca <a href="/register" class="text-decoration-none">qui</a></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout-main>