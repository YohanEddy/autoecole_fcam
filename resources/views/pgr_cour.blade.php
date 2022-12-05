@extends('../base/bases')
@section('content')
<section class="pcoded-main-container">
<div class="pcoded-content">

        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h3 class="m-b-10">FCAM </h3>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Cours</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    <div class="row">
    <!-- [ form-element ] start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5>Cour</h5>
                <hr>
                        <form action="{{ route('pgr_cour.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1"><strong>Type de cour</strong></label>
                                        <select name='type_cour'class="form-control" id="exampleFormControlSelect1">
                                            <option value ="code">Code</option>
                                            <option value ="conduite">Conduite</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="validationCustom01"><strong>Libellé</strong></label>
                                        <input name='lib_cour' type="text" class="form-control"
                                            id="validationCustom02" placeholder="intitulé"required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                            
                                <div>
                                    <p>


                                    </p>
                                    <button type="submit" class="btn  btn-primary">{{ __('Enregistrer') }}</button>
                                </div>
                            </div>
                        </form>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->
<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h5>Les cours</h5>
            <!--span class="d-block m-t-5">use class <code>table-striped</code> inside table element</!--span-->
        </div>
        <div class="card-body table-border-style">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Libellé</th>
                            <th>Type de cour</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cours as $cour)
                            <tr>
                                <td>{{ $cour->id }}</td>
                                <td>{{ $cour->lib_cour }}</td>
                                <td>{{ $cour->type_cour }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</section>
@endsection
