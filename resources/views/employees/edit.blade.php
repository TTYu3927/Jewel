@extends('layouts.index')
@section('title', 'Create Employee')
@section('content')
<link rel="stylesheet" href="{{ asset('css/emedit.css') }}">

<style>

</style>
<div class="room">
    <i class="fa-solid fa-greater-than"></i>
    <a href="{{ route('employees.index') }}"><h2>Employee</h2></a>
    <i class="fa-solid fa-greater-than"></i>
    <h2>Edit</h2>
</div>

<form action="{{ route('employees.update', $employee->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="formleft">

    <input type="file" name="image" id="file" style="display: none;">
    <img src="{{ $employee->image ? asset('storage/' . $employee->image) : '/images/camera.png' }}" alt="preview" class="img" id="preview">
    <label for="file">UPLOAD PHOTO</label>
    @error('image') <div style="color:red;">{{ $message }}</div> @enderror

    <label>Employee Name:</label>
    <input type="text" name="name" value="{{ old('name', $employee->name) }}" placeholder="Enter Employee Name">

    <label>Email:</label>
    <input type="email" name="email" value="{{ old('email', $employee->email) }}" placeholder="Enter Email">

    <label>Password:</label>
    <input type="password" name="password" value="{{ old('password') }}" placeholder="Enter  New Password">

    <label>Confirm Password:</label>
    <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password">

    <a href="#" class="delete-link" onclick="openDeleteModal(event)">
    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="none" viewBox="0 0 40 40">
                    <path
                        d="M11.6665 35C10.7498 35 9.9654 34.6739 9.31318 34.0217C8.66095 33.3694 8.33429 32.5844 8.33318 31.6667V10C7.86095 10 7.4654 9.84 7.14651 9.52C6.82762 9.2 6.66762 8.80444 6.66651 8.33333C6.6654 7.86222 6.8254 7.46667 7.14651 7.14667C7.46762 6.82667 7.86318 6.66667 8.33318 6.66667H14.9998C14.9998 6.19444 15.1598 5.79889 15.4798 5.48C15.7998 5.16111 16.1954 5.00111 16.6665 5H23.3332C23.8054 5 24.2015 5.16 24.5215 5.48C24.8415 5.8 25.001 6.19556 24.9998 6.66667H31.6665C32.1387 6.66667 32.5348 6.82667 32.8548 7.14667C33.1748 7.46667 33.3343 7.86222 33.3332 8.33333C33.3321 8.80444 33.1721 9.20056 32.8532 9.52167C32.5343 9.84278 32.1387 10.0022 31.6665 10V31.6667C31.6665 32.5833 31.3404 33.3683 30.6882 34.0217C30.036 34.675 29.251 35.0011 28.3332 35H11.6665ZM28.3332 10H11.6665V31.6667H28.3332V10ZM16.6665 28.3333C17.1387 28.3333 17.5348 28.1733 17.8548 27.8533C18.1748 27.5333 18.3343 27.1378 18.3332 26.6667V15C18.3332 14.5278 18.1732 14.1322 17.8532 13.8133C17.5332 13.4944 17.1376 13.3344 16.6665 13.3333C16.1954 13.3322 15.7998 13.4922 15.4798 13.8133C15.1598 14.1344 14.9998 14.53 14.9998 15V26.6667C14.9998 27.1389 15.1598 27.535 15.4798 27.855C15.7998 28.175 16.1954 28.3344 16.6665 28.3333ZM23.3332 28.3333C23.8054 28.3333 24.2015 28.1733 24.5215 27.8533C24.8415 27.5333 25.001 27.1378 24.9998 26.6667V15C24.9998 14.5278 24.8398 14.1322 24.5198 13.8133C24.1998 13.4944 23.8043 13.3344 23.3332 13.3333C22.8621 13.3322 22.4665 13.4922 22.1465 13.8133C21.8265 14.1344 21.6665 14.53 21.6665 15V26.6667C21.6665 27.1389 21.8265 27.535 22.1465 27.855C22.4665 28.175 22.8621 28.3344 23.3332 28.3333Z"
                        fill="#9D0000" />
                </svg>
            </a>


    </div>

    <div class="formright">
    
    <label>Position:</label>
    <select name="position" class="position">
        <option value="">--Select Position--</option>
        <option value="Manager" {{ old('position', $employee->position) == 'Manager' ? 'selected' : '' }}>Manager</option>
        <option value="Staff" {{ old('position', $employee->position) == 'Staff' ? 'selected' : '' }}>Staff</option>
        <option value="Intern" {{ old('position', $employee->position) == 'Intern' ? 'selected' : '' }}>Intern</option>
        <option value="Other" {{ old('position', $employee->position) == 'Other' ? 'selected' : '' }}>Other</option>
    </select>

    <label>Phone Number:</label>
    <input type="text" name="phone_number" value="{{ old('phone_number', $employee->phone_number) }}" placeholder="Enter Phone Number">

    <label>Date of Birth:</label>
@php
            $dob = explode('-', $employee->date_of_birth ?? '0000-00-00');
        @endphp
        <div class="dob">
            <select name="dob_month">
                <option value="">Month</option>
                @foreach (range(1, 12) as $m)
                    <option value="{{ str_pad($m, 2, '0', STR_PAD_LEFT) }}"
                        {{ isset($dob[1]) && $dob[1] == str_pad($m, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                        {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                    </option>
                @endforeach
            </select>

            <select name="dob_day">
                <option value="">Day</option>
                @for ($d = 1; $d <= 31; $d++)
                    <option value="{{ str_pad($d, 2, '0', STR_PAD_LEFT) }}"
                        {{ isset($dob[2]) && $dob[2] == str_pad($d, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                        {{ $d }}
                    </option>
                @endfor
            </select>

            <select name="dob_year">
                <option value="">Year</option>
                @for ($y = date('Y'); $y >= 1900; $y--)
                    <option value="{{ $y }}" {{ isset($dob[0]) && $dob[0] == $y ? 'selected' : '' }}>
                        {{ $y }}
                    </option>
                @endfor
            </select>
        </div>

    <label>Address:</label>
    <textarea name="address" placeholder="Enter Address">{{ old('address', $employee->address) }}</textarea>

    <a href="{{ route('employees.index') }}" class="cxnl" style="padding: 10px 15px; background-color: #7C7C7C; color: #dfdeda; text-decoration: none; border-radius: 5px; font-size: 11px;">CANCEL</a>
    <button type="submit">UPDATE</button>

    </div>
    </form>


    <div id="deleteModal" style="display:none; position:fixed; z-index:9999; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.6);">
    <div style="background:#181818; color:white; margin:20% auto; padding:20px; width:300px; border-radius:10px; text-align:center;">
        <p>Are you sure you want to delete this employee?</p>
        <form id="deleteForm" method="POST" action="">
            @csrf
            @method('DELETE')
            <button type="button" onclick="closeDeleteModal()" style="margin-left:10px; padding:10px 20px; border:none; background:#7C7C7C; color:white; border-radius:5px;">Cancel</button>
            <button type="submit" style="background-color: #541c1c; color:white; padding:10px 20px; border:none; border-radius:5px;">Delete</button>
        </form>
    </div>
</div>


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

const deleteModal = document.getElementById('deleteModal');
    const deleteForm = document.getElementById('deleteForm');

    function openDeleteModal(event) {
        event.preventDefault();
        const action = event.currentTarget.getAttribute('data-action');
        deleteForm.setAttribute('action', action);
        deleteModal.style.display = 'block';
    }

    function closeDeleteModal() {
        deleteModal.style.display = 'none';
    }

    document.querySelectorAll('.delete-link').forEach(link => {
        link.addEventListener('click', openDeleteModal);
    });

    window.onclick = function(event) {
        if (event.target === deleteModal) {
            closeDeleteModal();
        }
    };
</script>

@endsection