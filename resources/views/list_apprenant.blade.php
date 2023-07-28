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
                            <h5 class="m-b-10">FCAM</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Formulaires et Tableaux</a></li>
                            <li class="breadcrumb-item"><a href="#!">Listes</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->

            <!-- [ dark-table ] end -->
            <!-- [ stiped-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Liste des Apprenants</h5>
                        <div class="form-group">
                            <p></p>
                            <a href=" {{ route('etat_apprenant') }} " class="btn  btn-primary">Télécharger la liste <span class="pcoded-micon"><i class="fa fa-download"></i></span></a>
                        </div>
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
                                        <th>Profession</th>
                                        <th>Nationalité</th>
                                        <th>Téléphone</th>
                                        <th>Email</th>
                                        <th>Attentes</th>
                                        <th>Date d'inscription</th>
                                        <th>supprimer</th>
                                        <th>modifier</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($apprenants as $apprenant)
                                    <tr>

                                        <td>{{ $apprenant->id }}</td>
                                        <td>{{ $apprenant->nameapp }}</td>
                                        <td>{{ $apprenant->prenomapp }}</td>
                                        <td>{{ $apprenant->sexe }}</td>
                                        <td>{{ $apprenant->datenaiss }}</td>
                                        <td>{{ $apprenant->lieunaiss }}</td>
                                        <td>{{ $apprenant->domicile }}</td>
                                        <td>{{ $apprenant->profession }}</td>
                                        <td>{{ $apprenant->nationalite }}</td>
                                        <td>{{ $apprenant->telephone }}</td>
                                        <td>{{ $apprenant->email }}</td>
                                        <td>{{ $apprenant->attentes }}</td>
                                        <td>{{ $apprenant->date_inscrip }}</td>
                                        <td>
                                            <form action="{{ route('apprenant.delete', $apprenant) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete
                                                    <span class="pcoded-micon"><i class="fa fa-trash"></i></span>
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('apprenant.edit', $apprenant) }}" class="btn btn-success">Update</a>
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
        <!-- [ Main Content ] end -->
    </div>
</section>
@endsection
