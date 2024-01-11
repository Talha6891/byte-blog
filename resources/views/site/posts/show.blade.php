@extends('site.layouts.app')

@section('title', $post->title)

@section('content')

    <section class="section">
        <div class="container">

            <div class="row blog-entries element-animate">

                <div class="col-md-12 col-lg-8 main-content">
                    <div class="posts-entry-title">
                        {{-- title --}}
                        <h1>{{ $post->title }}</h1>
                    </div>
                    {{-- content --}}
                    <div class="post-content-body">
                        {!! nl2br($post->content) !!}
                    </div>

                    {{-- post comments --}}
                    <div class="pt-5 comment-wrap">
                        <h3 class="mb-5 heading">{{ $post->comments->count() .' '. __('Comments') }}</h3>
                        <ul class="comment-list">

                            <li class="comment">
                                <div class="vcard">
                                    <img src="{{ Avatar::create('Talha Manzoor')->toBase64() }}" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>Talha Manzoor</h3>
                                    <div class="meta">January 9, 2018 at 2:21pm</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                        necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim
                                        sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                    <a href="#" data-bs-toggle="collapse" data-bs-target="#replyBox1" class="reply rounded">Reply</a>
                                    <div class="collapse reply-box mt-2" id="replyBox1">
                                        <textarea class="form-control" placeholder="Write your reply..."></textarea>
                                        <button class="btn btn-primary mt-2 reply-submit">Submit Reply</button>
                                    </div>
                                </div>
                            </li>

                        </ul>
                        {{-- End comment-list --}}

                        <div class="comment-form-wrap pt-3">
                            <h3 class="mb-5">Leave a comment</h3>
                            <form action="#" class="p-5 bg-light">

                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="" id="message" cols="30" rows="4" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Post Comment" class="btn btn-primary">
                                </div>

                            </form>
                        </div>
                    </div>

                </div>

                <!-- END main-content -->

                <div class="col-md-12 col-lg-4 sidebar">

                    <!-- END sidebar-box -->
                    {{-- post category --}}
                    <div class="sidebar-box">
                        <h3 class="heading">{{ __('Category') }}</h3>
                        <ul class="categories">
                            <li><a href="#">{{ strtoupper($post->category->name) }}<span>({{ $post->category->posts->count() }})</span></a>
                            </li>
                        </ul>
                    </div>
                    <!-- END sidebar-box -->
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

                    <div class="sidebar-box">
                        <h3 class="heading">{{ __('Popular Posts') }}</h3>
                        <div class="post-entry-sidebar">
                            <ul>
                                <li>
                                    <a href="">
                                        <img src="images/img_3_sq.jpg" alt="Image placeholder" class="me-4 rounded">
                                        <div class="text">
                                            <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                                            <div class="post-meta">
                                                <span class="mr-2">March 15, 2018 </span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
                <!-- END sidebar -->

            </div>
        </div>
    </section>

@endsection

{{-- scripts--}}
@push('scripts')
    <script>

        document.addEventListener('DOMContentLoaded', function () {
            var replySubmitButtons = document.querySelectorAll('.reply-submit');

            replySubmitButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    // Perform the logic to submit the reply

                    // Hide the "Reply" button after submitting the reply
                    var commentBody = button.closest('.comment-body');
                    var replyButton = commentBody.querySelector('.reply');
                    replyButton.style.display = 'none';
                });
            });
        });
    </script>
@endpush
