@extends('../base/bases')
@section('content')
    <!-- [ Main Content ] start -->
    <section class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h3 class="m-b-10">FCAM</h3>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#!">Caisse</a></li>
                                <li class="breadcrumb-item"><a href="#!">Paiement des moniteurs</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- [ form-element ] start -->
                <div class="col-sm-12">
                    <div class="card">
                        <di class="card-body">
                            <h5>Nouvelle Fiche de paye</h5>
                            <hr>
                                    <form action="{{ route('fiche_paye.store') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect3"><strong>Période</strong></label>
                                                    <input type="date" name='periode_debut' class="form-control" id="validationCustom03">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                    <p>Au</p>
                                                    <input type="date" name='periode_fin' class="form-control" id="validationCustom04">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1"><strong>Type de permis</strong></label>
                                                    <select name='type_permis'class="form-control" id="exampleFormControlSelect1">
                                                        <option>A</option>
                                                        <option>B</option>
                                                        <option>C</option>
                                                        <option>D</option>
                                                        <option>E</option>
                                                        <option>F</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="validationCustom01"><strong>Intitulé</strong></label>
                                                    <input name='intitule' type="text" class="form-control"
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
                        <h5>Les Sessions</h5>
                        <!--span class="d-block m-t-5">use class <code>table-striped</code> inside table element</!--span-->
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Type de Permis</th>
                                        <th>Intitulé</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
