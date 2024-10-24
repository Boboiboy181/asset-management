<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Người Dùng</title>
</head>
<body>
    <h1>Sửa Người Dùng</h1>
    <form method="post" action="{{ route('users.update', $user->id) }}" >
        @csrf
        @method('put')
        <label for="name">Tên:</label>
        <input type="text" name="name" value="{{ $user->name }}"pattern="[A-Za-z\s]+" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $user->email }}" required>
        <br>
        <label for="role">Vai trò:</label>
        <input type="text" name="role" value="{{ $user->role }}" required>
        <br>
        <button type="submit">Cập Nhật</button>
    </form>
    <a href="{{ route('users.index') }}">Quay lại danh sách</a>
</body>
</html>
