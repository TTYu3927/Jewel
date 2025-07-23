@extends('layouts.index')
@section('title', 'Create Employee')
@section('content')

<style>
    form {
    display: flex;
    max-width: 900px;
    margin: auto;
    padding: 20px;
    border: none;
    border-radius: 5px;
    background-color: #181818;
    gap: 65px;
    
}
.formleft,
.formright {
    flex: 1;
    padding: 30px;
    background-color: #181818;
    border-radius: 5px;
}
.formright{
    margin-top: 90px;
}

label {
    display: block;
    margin-bottom: 8px;
    color: #dfdeda;
}

input[type="text"],
input[type="email"],
input[type="password"],
textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #7C7C7C;
    border-radius: 4px;
    background-color: transparent;
    color: #dfdeda;
    font-size: 14px;
}
.position{
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #7C7C7C;
    border-radius: 4px;
    background-color: transparent;
    color: #dfdeda;
    font-size: 14px;

}
.dob {
    display: flex;
    gap: 10px;
    justify-content: space-between;
    margin-bottom: 10px;
    color: #dfdeda;
    font-size: 12px;
    

  }
  
  .dob select {
    flex: 1;
    color: #dfdeda;
    background-color: transparent;
    border: 1px solid #7C7C7C;
    padding: 8px;
  }


button {
    background-color: #541c1c;
    color: white;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
    font-size: 11px;
}

button:hover {
    background-color:#6a2525;
}
.cxnl a {
    color: #dfdeda;
    text-decoration: none; 
}
.cxnl{
    background-color: #7C7C7C;
    font-size: 11px;
}
.img {
    object-fit: cover;
}
.img + label {
    display: block;
    cursor: pointer;
    color: #dfdeda;
    background-color: #541c1c;
    padding: 7px;
    font-size: 12px;
    width: calc(100% - 60%);
    margin-top: 10px;
    text-align: center;
}
.room{
    display: flex;
    align-items: center;
    gap: 10px;
    margin: 0;
    margin-bottom: 20px;
    color: #7C7C7C;
    margin-right: 30px;
}
h2{
    font-size: 16px;
    margin-top: 10px;  
}
.room a {
    color: #7C7C7C;
    text-decoration: none;
}
.room i {
    color: #7C7C7C;
    font-size: 16px;
    margin-right: 10px;
    margin-top: 10px;
    margin-left: 10px;
}


@media screen and (max-width: 768px) {
    form {
        flex-direction: column;
        padding: 10px;
    }
    .formleft, .formright {
        width: 100%;
        margin-bottom: 20px;
    }
    .formright {
        margin-left: 0;
    }
    .room {
        flex-direction: column;
        align-items: flex-start;
    }
    
}

</style>
<div class="room">
    <i class="fa-solid fa-greater-than"></i>
    <a href="{{ route('employees.index') }}"><h2>Employee</h2></a>
    <i class="fa-solid fa-greater-than"></i>
    <h2>Create New</h2>
</div>

<form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="formleft">

    <input type="file" name="image" id="file" style="display: none;">
    <img src="/images/camera.png" alt="preview" class="img" id="preview">
    <label for="file">UPLOAD PHOTO</label>
    @error('image') <div style="color:red;">{{ $message }}</div> @enderror

    <label>Employee Name:</label>
    <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter Employee Name">

    <label>Email:</label>
    <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter Email">

    <label>Password:</label>
    <input type="password" name="password" value="{{ old('password') }}" placeholder="Enter Password">

    <label>Confirm Password:</label>
    <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password">

    </div>

    <div class="formright">
    
    <label>Position:</label>
    <select name="position" class="position">
        <option value="">--Select Position--</option>
        <option value="Manager" {{ old('position') == 'Manager' ? 'selected' : '' }}>Manager</option>
        <option value="Staff" {{ old('position') == 'Staff' ? 'selected' : '' }}>Staff</option>
        <option value="Intern" {{ old('position') == 'Intern' ? 'selected' : '' }}>Intern</option>
        <option value="Other" {{ old('position') == 'Other' ? 'selected' : '' }}>Other</option>
    </select>

    <label>Phone Number:</label>
    <input type="text" name="phone_number" value="{{ old('phone_number') }}" placeholder="Enter Phone Number">

    <label>Date of Birth:</label>
    <div class="dob">
      <select name="dob_month">
        <option value="">Month</option>
        <option value="01">January</option>
        <option value="02">February</option>
        <option value="03">March</option>
        <option value="04">April</option>
        <option value="05">May</option>
        <option value="06">June</option>
        <option value="07">July</option>
        <option value="08">August</option>
        <option value="09">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
      </select>
      <select name="dob_day">
        <option value="">Day</option>
        @for ($day = 1; $day <= 31; $day++)
          <option value="{{ str_pad($day, 2, '0', STR_PAD_LEFT) }}">{{ $day }}</option>
        @endfor
      </select>
      <select name="dob_year">
        <option value="">Year</option>
        @for ($year = date('Y'); $year >= 1900; $year--)
          <option value="{{ $year }}">{{ $year }}</option>
        @endfor
      </select>
    </div>

    <label>Address:</label>
    <textarea name="address" placeholder="Enter Address">{{ old('address') }}</textarea>

    <button type="submit" class="cxnl"><a href="{{ route('employees.index') }}">CANCEL</a></button>
    <button type="submit">CREATE</button>

    </div>
</form>

<script>
document.getElementById('file').addEventListener('change', function (event) {
    const image = document.querySelector('.img');
    const file = event.target.files[0];

    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();

        reader.onload = function (e) {
            image.src = e.target.result;
            image.style.display = 'block';
            image.style.width = '100px'; 
            image.style.height = '100px';
            image.style.objectFit = 'cover';
        };

        reader.readAsDataURL(file);
    } else {
        image.src = '';
        alert('Please upload a valid image file.');
    }
});

</script>

@endsection