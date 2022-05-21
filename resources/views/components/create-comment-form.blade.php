@auth
<div>
    <h3 class="post-box-title">ارسال نظرات</h3>
    <form action="{{ route('videos.comments.store',$video) }}" method="POST">
        @csrf
        <textarea name="body" class="form-control" rows="8" id="Message" placeholder="پیام"></textarea>
        <button type="submit" id="contact_submit" class="btn btn-dm">ارسال پیام</button>
    </form>
</div>
@endauth
