@extends('../base/bases')
@section('content')
    <!-- [ Main Content ] start -->
    <section class="pcoded-main-container">
        <div class="pcoded-content">

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Liste des moniteurs</h5>
                            <!--span class="d-block m-t-5">use class <code>table-striped</code> inside table element</!--span-->
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <p></p>
                                <a href=" {{ route('etat_moniteur') }} " class="btn  btn-primary">Download List</a>
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
                                            <th>Nationalité</th>
                                            <th>Téléphone</th>
                                            <th>Email</th>
                                            <th>supprimer</th>
                                            <th>modifier</th>
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
                                                    <form action="{{ route('moniteur.delete', $moniteur) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="{{ route('moniteur.edit', $moniteur) }}"
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
