
@extends('layouts.app')

@section('content')

    <div class="" style="margin:0 100px;">

        <h2>Companies (<?=$companies->total()?>)</h2>

        <div class="text-left">
            <button onclick="location.href='/companies/add'" class="btn btn-secondary" >Add a new company</button>
        </div>

        @include('partials.flash')

        <?php if (isset($companies) && !empty($companies) && $companies->total()): ?>
            <table id="id-companies" class="table table-bordered table-hover display" style="width:100%; margin:20px 0; box-shadow: 0 0 6px;">
                <thead class="">
                    <tr>
                        <th class="text-center">ID</th>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Logo</th>
                        <th>Website</th>
                        <th class="text-center">Count employees</th>
                        <th colspan="2" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($companies as $company): ?>
                        <tr>
                            <td class="text-center"><?=$company->id?></td>
                            <td style="width:300px;"><a href="{{ url('/companies/view/'.$company->id) }}"><?=$company->name?></a></td>
                            <td><?=(!empty($company->email) ? '<a href="mailto:'.$company->email.'">'.$company->email.'</a>' : '-')?></td>
                            <td><?=(!empty($company->logo) ? '<img src="'.asset('storage/'.$company->logo.'').'" alt="not image" title="Image '.$company->name.'" style="width:100px;" />' : '-')?></td>
                            <td><?=(!empty($company->website) ? '<a href="'.$company->website.'" target="_blank" >'.$company->website.'</a>' : '-')?></td>
                            <td class="text-center"><?=(!empty($company->count_employees) ? $company->count_employees : 0)?></td>
                            <td class="text-center"><a href="{{ url('/companies/edit/'.$company->id) }}"><img src="/img/icons/edit.png" width="32" alt="edit" /></a></td>
                            <td class="text-center"><a href="{{ url('/companies/del/'.$company->id) }}" onclick="return confirm('Delete this company?');"><img src="/img/icons/delete.png" width="32" alt="edit" /></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <?php echo $companies->render(); ?>

        <?php else: ?>
            <div style="margin-top:50px;">
                <i>Not companies</i>
            </div>
        <?php endif; ?>
    </div>

@endsection
