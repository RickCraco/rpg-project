@auth
    <div class="text-white bg-black d-flex flex-column justify-content-between py-3" style="position: fixed; top: 100px; left: 0; height: calc(100vh - 100px); width: 150px; shadow: 10px 0 10px 0 rgba(0, 0, 0, 0.5);">
        <div>
            <div class="text-center mb-5">
                <h5>Characters</h5>
                <a class="text-primary text-decoration-none " href="{{ route('admin.characters.index')}}">Control Panel</a>
            </div>
            <div class="text-center mb-5">
                <h5>Items</h5>
                <a class="text-primary text-decoration-none " href="{{ route('admin.items.index')}}">Control Panel</a>
            </div>
            <div class="text-center mb-5">
                <h5>Types</h5>
                <a class="text-primary text-decoration-none " href="{{ route('admin.types.index')}}">Control Panel</a>
            </div>
        </div>
        <div>
            <div class="text-center">
                <h5><a href="{{ route('home') }}" class="text-white text-decoration-none"><i class="fa-solid fa-house"></i></a></h5>
            </div>
        </div>
    </div>
@endauth
