<h1>{{ $info->title }}</h1>
<p>{{ $info->description }}</p>
@if($info->image)
    <img src="{{ asset('storage/' . $info->image) }}" width="300">
@endif
<a href="{{ route('infos.index') }}">Назад</a>
