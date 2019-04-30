@extends ('layouts.master')

@section ('content')
    @include('layouts.categories')
    @if(isset($posts))
        @if(isset($posts->last()->title))
            <div class="container">
                <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
                    <div class="col-md-6 px-0">
                        <h1 class="display-4 font-italic">{{ $posts->last()->title }}</h1>
                        <p class="lead my-3" style="max-height: 6rem; overflow: hidden;">{{ $posts->last()->body }}</p>
                        <p class="lead mb-0"><a href="/posts/{{ $posts->last()->id }}" class="text-white font-weight-bold">Continue reading...</a></p>
                    </div>
                </div>
            </div>
        @endif
    @endif
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-10 blog-main">
                <h3 class="pb-3 mb-4 font-italic border-bottom">
                    From the Firehose
                </h3>
                <div class="album py-5 bg-light">
                    <div class="container">
                        <div class="row">
                            @if(isset($posts))
                                @foreach($posts as $post)
                                    @include('posts.post')
                                @endforeach
                            @endif
                            @if(isset($category))
                                @foreach($category->posts as $post)
                                    @include('posts.post')
                                @endforeach
                            @endif

                        </div>
                    </div>
                    <nav class="blog-pagination" style="margin-left: 1rem;">
                        {{--<a class="btn btn-outline-primary" href="#">Older</a>--}}
                        {{--<a class="btn btn-outline-secondary disabled" href="#">Newer</a>--}}
                    </nav>
                </div>


            </div><!-- /.blog-main -->

            <aside class="col-md-2 blog-sidebar">
                <div class="p-3 mb-3 bg-light rounded">
                    <h4 class="font-italic">About</h4>
                    <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                </div>

                <div class="p-3">
                    <h4 class="font-italic">Archives</h4>
                    <ol class="list-unstyled mb-0">
                        @foreach($archives as $stats)
                            <li><a href="/?month={{$stats['month']}}&year={{$stats['year']}}">{{ $stats['month'] . ' ' . $stats['year'] }}</a></li>
                        @endforeach
                    </ol>
                </div>

                <div class="p-3">
                    <h4 class="font-italic">Elsewhere</h4>
                    <ol class="list-unstyled">
                        <li><a href="#">GitHub</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Facebook</a></li>
                    </ol>
                </div>
            </aside><!-- /.blog-sidebar -->
        </div>
        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection
