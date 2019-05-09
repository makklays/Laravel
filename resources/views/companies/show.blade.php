
@extends('layouts.app')

@section('content')

    <div class="" style="margin:0 100px;">

        <h2>Companies</h2>

        <div class="text-left">
            <button onclick="location.href='/companies/add'" class="btn btn-secondary" >Add a new company</button>
        </div>

        <?php if (isset($companies) && !empty($companies)): ?>

            <table id="id-companies" class="table table-hover display" style="width:100%; margin:20px 0;">
                <thead class="thead-light">
                    <tr>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Logo</th>
                        <th>Website</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($companies as $company): ?>
                        <tr>
                            <td><?=$company->name?></td>
                            <td><?=(!empty($company->email) ? $company->email : '-')?></td>
                            <td><?=(!empty($company->logo) ? $company->logo : '-')?></td>
                            <td><?=(!empty($company->website) ? $company->website : '-')?></td>
                            <td><a href="{{ url('/employees/edit?id='.$company->id) }}">Edit</a></td>
                            <td><a href="{{ url('/employees/del?id='.$company->id) }}">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <?php echo $companies->render(); ?>

        <?php else: ?>
            <i>Not companies</i>
        <?php endif; ?>
    </div>

@endsection