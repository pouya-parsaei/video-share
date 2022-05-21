<div id="comments" class="post-comments">
    <h3 class="post-box-title"><span>{{ $video->comments->count() }}</span> نظرات</h3>
    <ul class="comments-list">
        @foreach( $video->comments as $comment )
            <x-video-comment-box :comment="$comment"/>
        @endforeach
    </ul>

  <x-create-comment-form :video="$video"/>
</div>
