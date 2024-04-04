<x-layout-main title="Account">
    <x-navbar />

    <div class="container mt-5">
        <h1>Benvenuto {{ auth()->user()->name }}</h1>
    </div>

</x-layout-main>