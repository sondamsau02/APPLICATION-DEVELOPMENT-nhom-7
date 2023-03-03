<form method="POST" action="{{ route('admin.staff.update', $staff->id) }}">


    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Họ tên</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $staff->name) }}" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $staff->email) }}" required>
    </div>

    <div class="form-group">
        <label for="password">Mật khẩu</label>
        <input type="password" name="password" id="password" class="form-control">
       
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>