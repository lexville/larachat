@if(Auth::check())
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>What do you have to say?</h3></header>
            <form action="{{ route('post.create') }}" method="post">
                <div class="form-group {{ $errors->has('email') ? ' has-error' : ''}}">
                    <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Your Post"></textarea>
                    @if ($errors->has('body'))
                        <span class="help-block">{{ $errors->first('body') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-raised btn-primary">Create Post</button>
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
            </form>
        </div>
    </section>
    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>What's trending....</h3></header>
            @foreach($posts as $post)
                <article class="post article" data-postid="{{ $post->id }}">
                    <p>{{ $post->body }}</p>
                    <div class="info">
                        <small class="user-info"><em>Posted by {{ $post->user->username }} on {{ $post->created_at }}</em></small>
                    </div>
                    <div class="interaction">
                        <a href="#" class="like">Like</a> |
                        <a href="#" class="like">Dislike</a>
                        @if(Auth::user() == $post->user)
                            |
                            <a href="#" class="edit">Edit</a> |
                            <a href="{{ route('post.delete', ['postId' => $post->id]) }}">Delete</a>
                        @endif
                    </div>
                </article>
            @endforeach
            {!! $posts->render() !!}
        </div>
    </section>
@endif
