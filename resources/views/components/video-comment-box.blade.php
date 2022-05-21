<li>
    <div class="post_author">
        <div class="img_in">
            <a href="#"><img src="{{ $comment->owner_gravatar }}" alt=""></a>
        </div>
        <a href="#" class="author-name">{{ $comment->owner_name }}</a>
        <time datetime="2017-03-24T18:18">{{ $comment->created_at_in_human }}</time>
        <a class='deslike mr-5 dislike-button' style="color: #aaaaaa"
           href="">{{ $comment->dislikes_count }}<i class="fa fa-thumbs-down"></i></a>
        <a class='like mr-5 like-button' style="color: #66c0c2" href="#">{{ $comment->likes_count }}<i
                class="fa fa-thumbs-up"></i></a>
    </div>
    <x-likeable-form :likeableModel="$comment"/>

    <p>{{ $comment->body }}</p>
</li>

