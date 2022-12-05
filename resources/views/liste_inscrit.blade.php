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
    <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Liste des inscrits</h5>
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
                                        <th>Profession</th>
                                        <th>Nationalité</th>
                                        <th>Téléphone</th>
                                        <th>Email</th>
                                        <th>Attentes</th>
                                        <th>Date d'inscription</th>
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
                                                <button type="submit" class="btn btn-outline-danger">Delete</button>
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
@endsection();