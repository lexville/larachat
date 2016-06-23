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
                            <a href="#" class="post-edit" id="edit">Edit</a> |
                            <a href="{{ route('post.delete', ['postId' => $post->id]) }}">Delete</a>
                        @endif
                    </div>
                </article>
            @endforeach
            {!! $posts->render() !!}
        </div>
    </section>
    <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Post</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="post-body">Edit the Post</label>
                            <textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-raised btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-raised btn-primary" id="modal-save">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script>
        var token = "{{ csrf_token() }}";
        var url = "{{ route('post.edit')}}";
    </script>
@endif
