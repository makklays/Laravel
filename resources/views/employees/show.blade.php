
@extends('layouts.app')

@section('content')

    <?php if (isset($employees) && !empty($employees)): ?>
    <table id="id-companies" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Company</th>
                <th>Phone</th>
                <th>E-mail</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($employees as $employee): ?>
            <tr>
                <td><?=$employee->lastname?></td>
                <td><?=$employee->firstname?></td>
                <td><?=$employee->company_id?></td>
                <td><?=$employee->phone?></td>
                <td><?=$employee->email?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>

@endsection