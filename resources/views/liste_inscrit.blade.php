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
                    <li class="breadcrumb-item"><a href=" {{ route('inscription') }}">Inscription</a></li>
                    <li class="breadcrumb-item"><a href="#!">Liste des inscrits</a></li>
                </ul>

            </div>
        </div>
    </div>
</div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                    <div class="card-header">
                        <h5>Liste des inscrits</h5>
                    </div>
                        <div class="col-6">
                            <div class="form-group">
                                <p></p>
                                <a href=" {{ route('etat_inscrit') }} " class="btn  btn-primary">Download List <span class="pcoded-micon"><i class="fa fa-download"></i></span></a>
                            </div>
                        </div>
                        <!--span class="d-block m-t-5">use class <code>table-striped</code> inside table element</!--span-->
                    
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Nom de famille</th>
                                        <th>Prénoms</th>
                                        <th>Sexe</th>
                                        <th>lieu de naissance</th>
                                        <th>date de naissance</th>
                                        <th>Add du domicile</th>
                                        <th>profession</th>
                                        <th>nationalité</th>
                                        <th>Téléphone</th>
                                        <th>Email</th>
                                        <th>Attentes</th>
                                        <th>Date d'inscription</th>
                                        <th>periode</th>
                                        <th>modalite de paiement</th>
                                        <th>type de permis</th>
                                        <th>supprimer</th>
                                        <th>modifier</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inscrires as $inscrire)
                                    <tr>

                                        <td>{{ $inscrire->apprenant->id }}</td>
                                        <td>{{ $inscrire->apprenant->nameapp }}</td>
                                        <td>{{ $inscrire->apprenant->prenomapp }}</td>
                                        <td>{{ $inscrire->apprenant->sexe }}</td>
                                        <td>{{ $inscrire->apprenant->lieunaiss }}</td>
                                        <td>{{ $inscrire->apprenant->datenaiss }}</td>
                                        <td>{{ $inscrire->apprenant->domicile }}</td>
                                        <td>{{ $inscrire->apprenant->profession }}</td>
                                        <td>{{ $inscrire->apprenant->nationalite }}</td>
                                        <td>{{ $inscrire->apprenant->telephone }}</td>
                                        <td>{{ $inscrire->apprenant->email }}</td>
                                        <td>{{ $inscrire->apprenant->attentes }}</td>
                                        <td>{{ $inscrire->apprenant->date_inscrip }}</td>
                                        <td>{{ $inscrire->periode }}</td>
                                        <td>{{ $inscrire->modalite }}</td>
                                        <td>{{ $inscrire->type_formation }}</td>
                                        <td>
                                            <form action="{{ route('apprenant.delete', $inscrire) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete <span class="pcoded-micon"><i class="fa fa-trash"></i></span></button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('apprenant.edit', $inscrire) }}" class="btn btn-success">Update</a>
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
@endsection
