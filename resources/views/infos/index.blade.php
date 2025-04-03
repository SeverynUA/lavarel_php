@extends('layouts.app')

@section('content')
    <form method="GET" action="{{ route('infos.index') }}">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Пошук...">
        <button type="submit">Шукати</button>
    </form>
    <table>
    @foreach ($infos as $info)
        <tr>
            <td>{{ $info->title }}</td>
            <td>{{ $info->description }}</td>
            <td>
                @if($info->image)
                    <img src="{{ asset('storage/' . $info->image) }}" width="100">
                @endif
            </td>
            <td><a href="{{ route('infos.show', $info) }}">Детальніше</a></td>
            <td><a href="{{ route('infos.edit', $info) }}">Редагувати</a></td>
            <td>
                <form method="POST" action="{{ route('infos.destroy', $info) }}">
                    @csrf @method('DELETE')
                    <button type="submit">Видалити</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

    {{ $infos->links() }}
@endsection
