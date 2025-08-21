@extends('layouts.index')
@section('title', 'Employees')
@section('content')
<link rel="stylesheet" href="{{ asset('css/emindex.css') }}">

<style>

</style>

<div class="admin-header">
    <i class="fa-solid fa-greater-than"></i>
    <h1 class="h1">Employees</h1>
    <a href="{{ route('employees.create') }}" class="btn-add"><i class="fa-solid fa-plus"></i> CREATE NEW</a>
    
    <form class="admin-search-bar" action="#" method="get">
        <input type="text" placeholder="Search" name="search"><i class="fas fa-search" style="color: #D4AF37;"></i>
    </form>
</div>



<table class="employee-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>IMAGE</th>
            <th>
                <select onchange="filterTable('name', this.value)">
                    <option value="">EMPLOYEE NAME</option>
                    @foreach ($employees->unique('name') as $emp)
                        <option value="{{ $emp->name }}">{{ $emp->name }}</option>
                    @endforeach
                </select>
            </th>
            <th>
                <select onchange="filterTable('position', this.value)">
                    <option value="">POSITION</option>
                    @foreach ($employees->unique('position') as $emp)
                        <option value="{{ $emp->position }}">{{ $emp->position }}</option>
                    @endforeach
                </select>
            </th>
            <th>
                <select onchange="filterTable('status', this.value)">
                    <option value="">STATUS</option>
                    <option value="Online">Online</option>
                    <option value="Offline">Offline</option>
                </select>
            </th>
        </tr>
    </thead>

    <tbody>
        @foreach ($employees as $employee)
        <tr onclick="window.location='{{ route('employees.edit', $employee->id) }}'">
            <td>{{ 'E' . str_pad($employee->id, 4, '0', STR_PAD_LEFT) }}</td>
            <td>
                @if($employee->image)
                    <img src="{{ asset('storage/' . $employee->image) }}" width="40" height="40" class="rounded-circle">
                @endif
            </td>
            <td data-column="name">{{ $employee->name }}</td>
            <td data-column="position">{{ $employee->position }}</td>
            <td data-column="status" class="{{ $employee->status == 'Online' ? 'status-online' : 'status-offline' }}">
                {{ $employee->status }}
            </td>
        </tr>
        @if ($employees->isEmpty())
    <tr>
        <td colspan="6" style="color: red; text-align: center;">No employees found</td>
    </tr>
@endif

        @endforeach
    </tbody>
</table>


<script>
    function filterTable(column, value) {
        const rows = document.querySelectorAll(".employee-table tbody tr");
        rows.forEach(row => {
            const text = row.querySelector(`[data-column="${column}"]`)?.textContent.trim() || "";
            row.style.display = (!value || text === value) ? "" : "none";
        });
    }
</script>

@endsection
