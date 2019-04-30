<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between" style="justify-content: center !important;">
        @foreach($categories as $category)
            <a class="p-2 text-muted" href="/category/{{$category->id}}">{{$category->name}}</a>
        @endforeach
    </nav>
</div>