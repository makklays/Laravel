
@extends('layouts.app')

@section('content')

    <div style="margin:0 100px;" >

        <h2>Employees</h2>

        <div class="text-left">
            <button onclick="location.href='/employees/add'" class="btn btn-secondary" >Add a new employee</button>
        </div>

        <?php if (isset($employees) && !empty($employees)): ?>
            <table id="id-companies" class="table table-hover display" style="width:100%; margin: 20px 0;">
                <thead class="thead-light">
                    <tr>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Company</th>
                        <th>Phone</th>
                        <th>E-mail</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($employees as $employee): ?>
                        <tr>
                            <td><?=$employee->lastname?></td>
                            <td><?=$employee->firstname?></td>
                            <td><?=$employee->company?></td>
                            <td><?=(!empty($employee->phone) ? $employee->phone : '-')?></td>
                            <td><?=(!empty($employee->email) ? $employee->email : '-')?></td>
                            <td><a href="{{ url('/employees/edit?id='.$employee->id) }}">Edit</a></td>
                            <td><a href="{{ url('/employees/del?id='.$employee->id) }}">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <?php echo $employees->render(); ?>
        <?php else: ?>
            <i>Not employees</i>
        <?php endif; ?>
    </div>

@endsection