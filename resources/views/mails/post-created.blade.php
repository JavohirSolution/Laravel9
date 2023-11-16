<div>
    <h1>Hurmatli {{ $post->user->name }}!</h1>
    <h5>Siz {{ $post->created_at }} da post yaratdingiz</h5>
    <p>Postning id: {{ $post->id }}</p>
    <div>{{ $post->title }}</div>
    <div>{{ $post->short_content }}</div>
    <div>{{ $post->content }}</div>
    <strong>Rahmat</strong>
</div>
