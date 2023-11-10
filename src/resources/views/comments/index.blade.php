@extends('comments::layouts.app')


@section('content')
    <div class="row">
        <div class="col-md-8 formComment">

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <span>
                            <li>
                                {{ $error }}
                            </li>
                        </span>
                    @endforeach
                </div>
            @endif

            @if (\Session::has('success'))
                <div id="successMsg" class="alert alert-success">
                    {!! \Session::get('success') !!}
                </div>
            @endif

            {{-- @include('partials.errorAlert') --}}
            {{-- @include('partials.successAlert') --}}
            <form action="{{ route('addComment') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="comment" class="form-label">Comment</label>
                    <br><br>
                    <textarea class="form-control" id="comment" name="body" placeholder="body" rows="3"></textarea>
                </div>
                <br>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" name="submit" type="submit">Comment</button>
                </div>
            </form>
            <br><br>
        </div>
    </div>

    <p class="commentCount">
        @if ($data)
            {{ $data->count() }} - {{ Str::plural('Comment', $data->count()) }}
        @else
            0 - Comment
            <p>No comment yet...</p>
        @endif
    </p>
    @if ($data)
        @foreach ($data as $comment)
            <div class="mainContentComment">
                <span class="username">Fabienlk</span>
                <span class="commentText">{!! $comment->body !!}</span>
                <span class="commentDate">{{ $comment->created_at->diffForHumans() }}</span>
            </div>
        @endforeach
    @endif
@endsection
