@extends('site.layouts.app')

@section('title', $post->title)

@section('content')

    <section class="section">
        <div class="container">

            <div class="row blog-entries element-animate">

                <div class="col-md-12 col-lg-8 main-content">
                    <div class="posts-entry-title mb-4">
                        {{-- title --}}
                        <h1>{{ $post->title }}</h1>
                    </div>

                    {{-- post image --}}
                    @if($post->hasMedia('post'))
                        <div class="mb-4">
                            <img src="{{ $post->getFirstMediaUrl('post') }}" class="img-fluid rounded" alt="Post Image"
                                 style="max-width: 800px; max-height: 500px;">
                        </div>
                    @endif

                    {{-- content --}}
                    <div class="post-content-body mb-4">
                        {!! nl2br($post->content) !!}
                    </div>


                    {{-- post comments --}}
                    <div class="pt-5 comment-wrap">
                        @if(count($post->comments) > 0)
                            <h3 class="mb-4 heading">{{ count($post->comments) .' '. __('Comments') }}</h3>
                            <ul class="comment-list">
                                @foreach($post->comments as $comment)
                                    <li class="comment">
                                        <div class="vcard">
                                            {{-- Display user's avatar --}}
                                            <img
                                                src="{{ Avatar::create($comment->user->name)->toBase64() }}"
                                                alt="User Avatar">
                                        </div>
                                        <div class="comment-body">

                                            {{-- Display the user's name  --}}
                                            <h3>{{ $comment->user->name }}</h3>

                                            <div
                                                class="meta">{{ $comment->created_at->format('F j, Y \a\t g:ia') }}</div>
                                            <p>{{ $comment->comment }}</p>

                                            {{-- comment reply --}}
                                            <a href="#" class="reply rounded toggle-reply"
                                               data-target="replyBox{{ $comment->id }}">
                                               {{ __(' Reply') }}
                                            </a>
                                            <div class="collapse reply-box mt-2" id="replyBox{{ $comment->id }}">

                                                <form method="POST" action="{{ route('comments.reply', ['id' => $comment->id]) }}">
                                                    @csrf
                                                    @if (!auth()->check())
                                                        <p class="text-danger">{{ __('Please login to comment.') }}</p>
                                                    @endif
                                                    <textarea class="form-control"
                                                             name="comment_reply" placeholder="Write your reply..." @disabled(!auth()->check())></textarea>
                                                    <button
                                                        class="btn btn-primary mt-2 reply-submit" @disabled(!auth()->check())>
                                                        {{ __('Submit Reply') }}
                                                    </button>

                                                    <button type="submit" class="btn btn-secondary mt-2 cancel-reply"
                                                            style="display: none;"
                                                            data-target="replyBox{{ $comment->id }}"> {{ __('Cancel') }}
                                                    </button>
                                                </form>
                                            </div>

                                            {{-- Display comment replies --}}
                                            @if(count($comment->comments_replies) > 0)
                                                <ul class="comment-list">
                                                    @foreach($comment->comments_replies as $reply)
                                                        <li class="comment mt-2">
                                                            <div class="vcard">
                                                                {{-- Display user's avatar for the reply --}}
                                                                <img src="{{ Avatar::create($reply->user->name)->toBase64() }}" alt="User Avatar">
                                                            </div>
                                                            <div class="comment-body">
                                                                {{-- Display the user's name for the reply --}}
                                                                <h3>{{ $reply->user->name }}</h3>
                                                                <div class="meta">{{ $reply->created_at->format('F j, Y \a\t g:ia') }}</div>
                                                                <p>{{ $reply->comment }}</p>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <h3 class="mb-4 heading">{{ __('No Comments available') }}</h3>
                        @endif

                        {{-- Leave a comment on post --}}
                        <div class="comment-form-wrap pt-3">
                            <h3 class="mb-4">{{ __('Leave a comment') }}</h3>
                            <form method="POST" action="{{ route('comments.create', $post->id) }}"
                                  class="p-5 bg-light">
                                @csrf
                                <div class="form-group">
                                    <label for="comment">{{ __('Comment') }}</label>
                                    @if (!auth()->check())
                                        <p class="text-danger">{{ __('Please login to comment.') }}</p>
                                    @endif
                                    <textarea name="comment" id="comment" cols="20" rows="4" class="form-control"
                                              placeholder="Write comment here..." @disabled(!auth()->check())>

                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Post Comment"
                                           class="btn btn-primary" @disabled(!auth()->check())>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

                <!-- END main-content -->

                <div class="col-md-12 col-lg-4 sidebar">

                    {{-- post category --}}
                    <div class="sidebar-box">
                        <h3 class="heading">{{ __('Category') }}</h3>
                        <ul class="categories">
                            <li>
                                <a href="#">
                                    {{ strtoupper($post->category->name) }}
                                    <span>({{ $post->category->posts->count() }})</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    {{-- post tags --}}
                    <div class="sidebar-box">
                        <h3 class="heading">{{ __('Tags') }}</h3>
                        <ul class="tags">
                            @forelse($post->tags as $tag)
                                <li><a href="#">{{ $tag->name }}</a></li>
                            @empty
                                <li><a href="#">{{ __('No tag available') }}</a></li>
                            @endforelse
                        </ul>
                    </div>

{{-- sidebar --}}
                    <div class="sidebar-box">
                        <h3 class="heading">{{ __('Latest Posts') }}</h3>
                        <div class="post-entry-sidebar">
                            <ul>
                                @forelse($latest_posts as $latest)
                                <li>
                                    <a href="{{ route('post.show', $latest->slug) }}">
{{--                                        @if($latest->hasMedia())--}}
                                            <img src="{{ $latest->getFirstMediaUrl('post') }}" alt="Image placeholder" class="me-4 rounded">
                                            <p>{{ $latest->getMediaFirstUrl('post') }}</p>
{{--                                        @endif--}}
                                        <div class="text">
                                            <h4>{{ Str::title(Str::limit($latest->title,100)) }}</h4>
                                            <div class="post-meta">
                                                <span class="mr-2">{{ $latest->created_at->format('F j, Y') }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @empty
                                    <li></li>
                                @endforelse
                            </ul>
                        </div>
                    </div>

                </div>
                <!-- END sidebar -->

            </div>
        </div>
    </section>


    {{-- scripts--}}
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var toggleReplyButtons = document.querySelectorAll('.toggle-reply');
                var cancelReplyButtons = document.querySelectorAll('.cancel-reply');

                toggleReplyButtons.forEach(function (button) {
                    button.addEventListener('click', function (event) {
                        event.preventDefault();

                        var targetId = button.getAttribute('data-target');
                        var replyBox = document.getElementById(targetId);
                        var cancelReplyButton = document.querySelector('.cancel-reply[data-target="' + targetId + '"]');

                        // Hide the "Reply" button and show the "Cancel" button
                        button.style.display = 'none';
                        cancelReplyButton.style.display = 'inline-block';

                        // Toggle the visibility of the reply box
                        if (replyBox) {
                            replyBox.classList.toggle('show');
                        }
                    });
                });

                cancelReplyButtons.forEach(function (button) {
                    button.addEventListener('click', function (event) {
                        event.preventDefault();

                        var targetId = button.getAttribute('data-target');
                        var replyBox = document.getElementById(targetId);
                        var toggleReplyButton = document.querySelector('.toggle-reply[data-target="' + targetId + '"]');

                        // Show the "Reply" button and hide the "Cancel" button
                        toggleReplyButton.style.display = 'inline-block';
                        button.style.display = 'none';

                        // Toggle the visibility of the reply box
                        if (replyBox) {
                            replyBox.classList.toggle('show');
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
