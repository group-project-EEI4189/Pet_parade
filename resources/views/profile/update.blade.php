<form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- This will use PUT method for updating the profile -->
    <label for="image">Profile Picture:</label>
    <input type="file" name="image" accept="image/*">
    <button type="submit">Update Profile Picture</button>
</form>
