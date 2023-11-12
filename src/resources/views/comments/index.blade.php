<div class="row">
    <div class="col-md-8 formComment">
        @include('comments::partials.errorAlert')
        @include('comments::partials.successAlert')

        <form action="{{ route('addComment', $post[0]->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="comment" class="form-label">Comment</label>
                <textarea class="form-control" id="comment" name="body" placeholder="Enter comment..." rows="3"></textarea>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" name="submit" type="submit">Comment</button>
            </div>
        </form>
    </div>
</div>


<p class="commentCount">
    @if ($comments)
        {{ count($comments) }} - {{ Str::plural('Comment', count($comments)) }}
    @else
        0 - Comment <p>No comment yet...</p>
    @endif
</p>
@if ($comments)
    @foreach ($comments as $comment)
        <div class="content">
            <div class="details">
                <div class="userInfos">
                    <span class="username">{{ Auth::user()->name }}</span>
                    @if (Auth::user()->id == $comment->user_id)
                        <span class="commentDelete">
                            Delete -
                        </span>
                        <span class="commentEdit">Edit</span>
                    @endif
                </div>
                <span class="commentText">{!! $comment->body !!}</span>
            </div>

            <div class="bottom">
                <span>
                    <img src="{{ asset('style/comments/icons/favorite.svg') }}" alt="Like">Like (10)
                </span>
                <span class="toggleButton" data-comment_id="{{ $comment->id }}">
                    <img src="{{ asset('style/comments/icons/chat_bubble.svg') }}" alt="Reply">Reply (5)
                </span>
                <span class="commentCreateAt">
                    {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}
                </span>
            </div>
        </div>


        {{-- #replies --}}
        <form id="replyComment-{{ $comment->id }}" action="#" method="POST" style="display: none">
            @csrf
            <div class="formReply">
                <div class="mb-3">
                    <textarea class="form-control" id="commentReply" name="body" placeholder="Reply here" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" name="submit" type="submit">Reply</button>
                </div>
            </div>
            <br><br>
        </form>
    @endforeach
@endif
