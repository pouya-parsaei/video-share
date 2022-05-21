<div>
    <ul class="like">
        <li><a class="deslike dislike-button" href="#">{{ $video->dis_likes_count}} <i
                    class="fa fa-thumbs-down"></i></a>
        </li>
        <li><a class="like like-button" href="#">{{ $video->likes_count}} <i
                    class="fa fa-thumbs-up"></i></a>
        </li>
        <x-likeable-form :likeableModel="$video"/>

    </ul>
</div>
