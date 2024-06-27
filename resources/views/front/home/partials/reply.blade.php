<div class="mb-4">
  <div class="d-flex align-items-start">
      <img src="{{ asset('images/user.png') }}" alt="#" class="bulat rounded-circle" width="40">
      <div class="ms-3">
          <h6 class="text-dark m-0">
              {{ $comment->user->name }}
              @if($comment->parent)
                  <span class="badge"><i class="fa fa-caret-right me-2"></i>{{ $comment->parent->user->name }}</span>
              @endif
          </h6>
          <div class="mb-2">
              <small>{{ $comment->created_at->format('M d, Y') }} - <a href="#" class="text-primary reply-link" data-id="{{ $comment->id }}">Balas</a></small>
          </div>
          <div>{{ $comment->body }}</div>
      </div>
  </div>
</div>
<form action="{{ route('comment.store', $comment->konten_id) }}" method="POST" class="reply-form d-none" id="reply-form-{{ $comment->id }}">
  @csrf
  <input type="hidden" name="parent_id" value="{{ $comment->id }}">
  <div class="mb-3">
      <textarea class="form-control" name="body" placeholder="Tulis Balasan..." required></textarea>
  </div>
  <button class="btn btn-primary">Kirim Balasan</button>
</form>

<script>
  document.addEventListener('DOMContentLoaded', function () {
      document.querySelectorAll('.reply-link').forEach(function (link) {
          link.addEventListener('click', function (e) {
              e.preventDefault();
              var formId = 'reply-form-' + link.getAttribute('data-id');
              document.getElementById(formId).classList.toggle('d-none');
          });
      });
  });
</script>
