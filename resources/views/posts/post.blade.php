{{--<div class="blog-post">--}}
{{--<h2 class="blog-post-title">--}}
{{--<a href="posts/{{ $post->id }}">--}}
{{--{{ $post->title }}--}}
{{--</a>--}}
{{--</h2>--}}
{{--<p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }} by <a href="#">{{$post->user->name}}</a></p>--}}

{{--{{ $post->body }}--}}

{{--</div>--}}
{{--<p>--}}
{{--<a href="posts/{{ $post->id }}" style="right: 3rem;position: absolute;">Read more</a>--}}
{{--</p>--}}

<div class="col-md-4">
    <div class="card mb-4 shadow-sm">
        <a href="/posts/{{$post->id}}">
        <img  onclick="goToPost({{$post->id}})" class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text={{ $post->title }}"
             alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="{{url('/') }}/images/{{$post->image}}"
             data-holder-rendered="true">
        </a>
        <div class="card-body">
            <a href="/posts/{{$post->id}}" style="text-decoration:none;color: black;">
                <h5 >{{$post->title}}</h5>
            </a>
            <p class="card-text" style="overflow: hidden;max-height: 6rem;min-height: 6rem;">{{ $post->body }}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button onclick="goToCate({{$post->category->id}})" type="button" class="btn btn-sm btn-outline-secondary">{{$post->category->name}}</button>
                </div>
                <small class="text-muted">{{ $post->created_at->toFormattedDateString() }}</small>
            </div>
        </div>
    </div>
</div>

<script>
    function goToCate(id) {
        location.href = '/category/' + id
    }
    function goToPost(id) {
        location.href = "/posts/" + id;
    }
    $("#blog").click(function() {
        location.href = "/posts/{{$post->id}}";
        return false;
    });
</script>