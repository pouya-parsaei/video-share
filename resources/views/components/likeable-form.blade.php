<form class="hidden like-form"
      action="{{ route('likes.store',['likeable_type'=> get_class($likeableModel),'likeable_id' => $likeableModel]) }}"
      method="post">
    @csrf
</form>

<form class="hidden dislike-form"
      action="{{ route('dislikes.store',['likeable_type'=> get_class($likeableModel),'likeable_id' => $likeableModel]) }}"
      method="post">
    @csrf
</form>
