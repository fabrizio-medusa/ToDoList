<x-layout-main title="Registrati">

    <x-navbar />

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card rounded-top-4">
                    <div class="card-header">
                        Registrati
                    </div>
                    <div class="card-body">
                            <form action="/register" method="POST">
                                @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="name"></label>
                                    <input type="text" name="name" id="name" value="{{old ('name')}}" class="form-control rounded-5" placeholder="Nome">
                                    @error('name') <span class="text-danger small"> {{ $message }} </span>@enderror
                                </div>
                                <div class="col-12">
                                    <label for="email"></label>
                                    <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control rounded-5" placeholder="Email">
                                    @error('email') <span class="text-danger small"> {{ $message }} </span>@enderror
                                </div>
                                <div class="col-12">
                                    <label for="password"></label>
                                    <input type="password" name="password" id="password" class="form-control rounded-5" placeholder="Password">
                                    @error('password') <span class="text-danger small"> {{ $message }} </span>@enderror
                                </div>
                                <div class="col-12">
                                    <label for="password_confirmation"></label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control rounded-5" placeholder="Conferma Password">
                                    @error('password') <span class="text-danger small"> {{ $message }} </span>@enderror
                                </div>
                                <div class="col-12 text-center mt-3">
                                    <button type="submit" class="btn btn-primary rounded-5">Registrati</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout-main>