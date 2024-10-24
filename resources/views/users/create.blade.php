<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Người Dùng</title>
</head>
<body>
    <h1>Thêm Người Dùng</h1>
    
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <label for="name">Tên:</label>
        <input type="text" name="name" pattern="[A-Za-z\s]+" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <label for="password">Pass:</label>
        <input type="text" name="password" required>
        <br>
        <label for="role">Vai trò:</label>
        <input type="text" name="role" required>
        <br>
        <button type="submit">Thêm</button>
    </form>
    <a href="{{ route('users.index') }}">Quay lại danh sách</a>
</body>
</html>
