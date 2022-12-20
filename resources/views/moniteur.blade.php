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
                                <li class="breadcrumb-item"><a href="#!">Formulaires et Tableaux</a></li>
                                <li class="breadcrumb-item"><a href="#!">Moniteurs</a></li>
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
                            <h5>Nouveau Moniteur</h5>
                            <hr>
                            @if(!isset($moniteur))
                                <form action="{{ route('moniteur.stores') }}" method="post">
                            @else
                                <form action="{{ route('moniteur.update', $moniteur) }}" method="POST" enctype="multipart/form-data">
                                    <!--input type="hidden" name="_method" value="PUT"-->
                                    @method('PUT')
                            @endif
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="validationCustom01"><strong>Nom de Famille</strong></label>
                                            <input type="text" name="nom_moniteur" class="form-control"
                                                id="validationCustom01" placeholder="Nom de Fammille" 
                                                value="{{ isset($moniteur) ? $moniteur->nom_moniteur : "" }}">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom01"><strong>Prenoms</strong></label>
                                            <input type="text" name="prenom_moniteur" class="form-control"
                                                id="validationCustom02" placeholder="Prenoms"
                                                value="{{ isset($moniteur) ? $moniteur->prenom_moniteur : "" }}">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1"><strong>Sexe</strong></label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="sexe">
                                                <option>Masculin</option>
                                                <option>Feminin</option>
                                            </select>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect3"><strong>Date de
                                                    naissance</strong></label>
                                            <input type="date" name="date_naiss" class="form-control"
                                            value="{{ isset($moniteur) ? $moniteur->date_naiss : "" }}"
                                                id="validationCustom03" placeholder="Date de naissance"required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom04"><strong>Lieu de Naissance</strong></label>
                                            <input type="text" name="lieunaiss" class="form-control"
                                            value="{{ isset($moniteur) ? $moniteur->lieunaiss : "" }}"
                                                id="validationCustom04" placeholder="Lieu de naissance"required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="validationCustom06"><strong>Adresse du Domicile</strong></label>
                                            <input type="text" name="domicile_moniteur" class="form-control"
                                            value="{{ isset($moniteur) ? $moniteur->domicile_moniteur : "" }}"
                                                id="validationCustom06" placeholder="Adresse du domicile"required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="validationCustom05"><strong>Nationalité</strong></label>
                                            <input type="text" name="nationalite" class="form-control"
                                            value="{{ isset($moniteur) ? $moniteur->nationalite : "" }}"
                                                id="validationCustom05" placeholder="Nationalité"required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom07"><strong>Téléphone</strong></label>
                                            <input type="text" name="telephone" class="form-control"
                                            value="{{ isset($moniteur) ? $moniteur->telephone : "" }}"
                                                id="validationCustom07" placeholder="Téléphone"required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><strong>Adresse Mail</strong></label>
                                            <input type="email" name="email" class="form-control"
                                            value="{{ isset($moniteur) ? $moniteur->email : "" }}"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                placeholder="Entrez l'email">
                                        </div>
                                    </div>
                                    <p></p>
                                    @if(!isset($moniteur))
                                    <button type="submit" class="btn  btn-primary">{{ __('Ajouter') }}</button>
                                    @else
                                    <button type="submit" class="btn  btn-primary">{{ __('Modifier') }}</button>
                                    @endif;
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
                        <h5>Liste des moniteurs</h5>
                        <!--span class="d-block m-t-5">use class <code>table-striped</code> inside table element</!--span-->
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Nom de famille</th>
                                        <th>Prénoms</th>
                                        <th>Sexe</th>
                                        <th>Date de naissance</th>
                                        <th>Lieu de naissance</th>
                                        <th>Add du domicile</th>
                                        <th>Nationalité</th>
                                        <th>Téléphone</th>
                                        <th>Email</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($moniteurs as $moniteur)
                                    <tr>
                                        <td>{{ $moniteur->id }}</td>
                                        <td>{{ $moniteur->nom_moniteur }}</td>
                                        <td>{{ $moniteur->prenom_moniteur }}</td>
                                        <td>{{ $moniteur->sexe }}</td>
                                        <td>{{ $moniteur->date_naiss }}</td>
                                        <td>{{ $moniteur->lieunaiss }}</td>
                                        <td>{{ $moniteur->domicile_moniteur }}</td>
                                        <td>{{ $moniteur->nationalite }}</td>
                                        <td>{{ $moniteur->telephone }}</td>
                                        <td>{{ $moniteur->email }}</td>
                                        <td>
                                            <form action="{{ route('moniteur.delete', $moniteur) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ route('moniteur.edit', $moniteur) }}" method="GET">
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