
@extends('layouts.app')

@section('content')

    <?php if (isset($companies) && !empty($companies)): ?>
    <table id="id-companies" class="display" style="width:100%">
        <thead>
        <tr>
            <th>Name</th>
            <th>E-mail</th>
            <th>Logo</th>
            <th>Website</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($companies as $company): ?>
        <tr>
            <td><?=$company->name?></td>
            <td><?=$company->email?></td>
            <td><?=$company->logo?></td>
            <td><?=$company->website?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>

@endsection