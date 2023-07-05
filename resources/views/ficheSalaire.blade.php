@if ($errors->any())

@endif
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
                        <div class="card-body">

                            <form action="{{ route('fiche_paye.store') }}" method="post">
                                @csrf
                                <h5>Nouvelle Fiche de paye</h5>
                                <hr>
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <p class="text-center text-danger">{{ $error }}</p>
                                    @endforeach
                                @endif
                                <div class="row">
                                    <div class="col-6 d-flex">
                                        <div class="d-block">
                                            <input type="date" name='periode_debut' class="form-control"
                                                id="validationCustom03" value="{{ old('periode_debut') }}">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="d-block p-4">AU</div>
                                        <div class="d-block">
                                            <input type="date" name='periode_fin' class="form-control"
                                                id="validationCustom04" value="{{ old('periode_fin') }}">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-6">
                                        
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1"><strong>Nom et Prénom</strong></label>
                                            <select name='matricule'class="form-control" id="validationCustom02">
                                                @foreach($moniteurs as $moniteur)
                                                <option value="{{$moniteur->matricule}}">{{ $moniteur->nom_moniteur." ".$moniteur->prenom_moniteur }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="validationCustom01"><strong>TOTAL DES RETENUES</strong></label>
                                            <input name='tot_retenues' type="text" class="form-control"
                                                id="validationCustom02" placeholder=""required
                                                value="{{ old('tot_retenues') }}">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="validationCustom01"><strong>TOTAL BRUT</strong></label>
                                            <input name='salaire_brut' type="text" class="form-control"
                                                id="validationCustom02" placeholder=""required
                                                value="{{ old('tot_brut') }}">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                            
                                @if (!isset($fichesalaire))
                                    <button type="submit" class="btn  btn-primary">{{ __('Ajouter') }}</button>
                                @else
                                    <button type="submit" class="btn  btn-primary">{{ __('Modifier') }}</button>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @if(session('success'))
                <div class="alert alert-info" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <!-- [ Main Content ] end -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Liste des payes</h5>
                        <!--span class="d-block m-t-5">use class <code>table-striped</code> inside table element</!--span-->
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <p></p>
                            <a href=" {{ route('etat_salaire') }} " class="btn  btn-primary">Download List</a>
                        </div>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>matricule</th>
                                        <th>Nom et prénom</th>
                                        <th>Période</th>
                                        <th>total brut</th>
                                        <th>salaire net</th>
                                        <th>date de paiement</th>
                                        <th>supprimer</th>
                                        <th>modifier</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($salaires as $salaire)
                                        <tr>
                                            <td>{{ $salaire->id }}</td>
                                            <td>{{ $salaire->matricule }}</td>
                                            <td>{{ $salaire->moniteur->nom_moniteur. " " .$salaire->moniteur->prenom_moniteur}} </td>
                                            <td>{{ $salaire->periode_debut. " Au " .$salaire->periode_fin}}
                                            <td>{{ $salaire->salaire_brut }}</td>
                                            <td>{{ $salaire->sal_net }}</td>
                                            <td>{{ $salaire->date_paiement }}</td>
                                            <td>
                                                <form action="{{ route('fiche_paye.delete', $salaire) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{ route('fiche_paye.edit', $salaire) }}"
                                                    method="GET">
                                                    <button type="submit" class="btn btn-success">Update</button>
                                                </form>
                                            </td>
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
