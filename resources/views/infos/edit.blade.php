<form method="POST" action="{{ route('infos.store') }}" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title" placeholder="Заголовок" required>
    <textarea name="description" placeholder="Опис" required></textarea>
    <input type="file" name="image">
    <button type="submit">Створити</button>
</form>
