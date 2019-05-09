

@extends('layouts.app')

@section('content')

    <div class="form-group row" style="margin:5px 0 10px 0;">
        <div class="col-md-4"></div>
        <div class="col-md-6">
            <h2>Сompany "<?=$company->name?>"</h2>
        </div>
    </div>

    <div class="form-group row" style="margin:5px 0 10px 0;">
        <div class="col-md-4 text-md-right"><b>ID:</b> </div>
        <div class="col-md-6">
            <?=$company->id?>
        </div>
    </div>

    <div class="form-group row" style="margin:5px 0 10px 0;">
        <div class="col-md-4 text-md-right"><b>Name:</b> </div>
        <div class="col-md-6">
            <?=$company->name?>
        </div>
    </div>

    <div class="form-group row" style="margin:5px 0 10px 0;">
        <div class="col-md-4 text-md-right"><b>E-mail:</b> </div>
        <div class="col-md-6">
            <?=(!empty($company->email) ? $company->email : '')?>
        </div>
    </div>

    <div class="input-group row " style="margin:5px 0 10px 0;">
        <div class="col-md-4 text-md-right"><b>Logo:</b> </div>
        <div class="col-md-6 text-left">
            <img src="<?=asset('storage/'.$company->logo.'')?>" style="width:100px;" title="Logo <?=$company->name?>" alt="not image" />
        </div>
    </div>

    <div class="form-group row" style="margin:5px 0 10px 0;">
        <div class="col-md-4 text-md-right"><b>Website:</b> </div>
        <div class="col-md-6">
            <?=(!empty($company->website) ? $company->website : '')?>
        </div>
    </div>

@endsection