<x-layout-main title="ToDo List">
    <x-navbar/>
    <div class="container mt-5">
        <h1 class="ps-2">ToDo List</h1>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <livewire:task-form />
                </div>
                <div class="col-lg-9">
                    <livewire:task-list />
                </div>
            </div>
        </div>
    </div>                
</x-layout-main>