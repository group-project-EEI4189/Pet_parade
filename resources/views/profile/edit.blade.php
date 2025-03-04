 <html>
    <style>
         .inputbox {
            padding-left: 20%;
            margin-top: 10px;
        }
        .inputbox label {
            width: 60%;  
            outline: none;  
            padding: 10px; 
        }
        .inputbox input {
        width: 60%;
        background: transparent;
        border: 1px solid black;
        outline: none;
        border-radius: 10px;
        font-size: 14px;
        color: black;
        padding: 10px;
        transform: all 0.4s;
    }
    .btn {
        width: 30%;
        height: 40px;
        background-color: #F2968F;
        cursor: pointer;
        font-size: 18px;
        font-weight: 600;
        color: white;
        border-radius: 40px;
        margin-left: 10%;
        margin-top: 10%;
        transition: all 0.2s;
        transform: translateY(-5px);
    }

    .btn:hover {
        background: white;
        color: black;
    }

    .btn:active {
        transform: translateY(0px);
    }
    </style>

 <body style="background-color:#FFDDD2;">
<div class="container">
    <h2 style="padding-left: 50%;">Edit Profile</h2><br><br>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="inputbox">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div><br><br>

         <div class="inputbox">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div><br><br>

        <div class="inputbox">
            <label for="profile_photo">Profile Photo</label>
            @if($user->profile_photo)
                <div>
                    <img src="{{ Storage::url($user->profile_photo) }}" alt="Profile Photo" width="100">
                </div>
            @endif
            <input type="file" name="profile_photo" class="form-control">
        </div>
        
<div class="inputbox">
        <button type="submit" class="btn">Update Profile</button></div>
    </form>
</div> 
</body></html>