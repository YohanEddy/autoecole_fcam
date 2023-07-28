@if ($errors->any())

@endif
@extends('../base/bases')
@section('content')
<style>
    .required {
    color: red;
    margin-left: 5px;
}
    </style>
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
                            @if(!isset($fichesalaire))
                                <form action="{{ route('fiche_paye.store') }}" method="post">
                            @else
                                <form action="{{ route('fiche_paye.update', $salaires) }}" method="POST">
                                    @method('PUT')
                            @endif 
                                @csrf
                                <h5>Nouvelle Fiche de paye</h5>
                                <hr>
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <p class="text-center text-danger">{{ $error }}</p>
                                    @endforeach
                                @endif
                                <p class="text-danger mb-1">
                                    (*) C'est pour désigner les champs obligatoires.
                                </p>
                                <hr>
                                <div class="row">
                                    <div class="col-6 d-flex">
                                        <div class="d-block">
                                            <label for="exampleFormControlSelect3"><strong>Date début<span class="required">*</span></strong></label>
                                            <input type="date" name='periode_debut' class="form-control"
                                                id="validationCustom03" value="">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="d-block p-4">AU</div>
                                        <div class="d-block">
                                            <label for="exampleFormControlSelect3"><strong>Date fin<span class="required">*</span></strong></label>
                                            <input type="date" name='periode_fin' class="form-control"
                                                id="validationCustom04" value="">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="col-6">
                                        
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1"><strong>Nom et Prénom<span class="required">*</span></strong></label>
                                            <select name='matricule' class="form-control" id="validationCustom02">
                                                @if($moniteurs->count() > 0)
                                                    @foreach($moniteurs as $moniteur)
                                                        <option value="{{ $moniteur->matricule }}" {{ isset($fichesalaire) && $moniteur->matricule == $fichesalaire->matricule ? 'selected' : '' }}>
                                                            {{ $moniteur->nom_moniteur." ".$moniteur->prenom_moniteur }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <option value="" disabled>Aucun moniteur disponible</option>
                                                @endif
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="validationCustom01"><strong>TOTAL DES RETENUES<span class="required">*</span></strong></label>
                                            <input name='tot_retenues' type="text" class="form-control"
                                                id="validationCustom02" placeholder=" Total des retenues"required
                                                value="">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="validationCustom01"><strong>TOTAL BRUT<span class="required">*</span></strong></label>
                                            <input name='salaire_brut' type="text" class="form-control" id="validationCustom02" placeholder="Total brut" 
                                                required value="{{ isset($fichesalaire) ? $fichesalaire->salaire_brut : '' }}">

                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                <div class="col-6">
                                    @if (!isset($fichesalaire))
                                        <button type="submit" class="btn  btn-primary">{{ __('Ajouter') }}</button>
                                    @else
                                        <button type="submit" class="btn  btn-primary">{{ __('Modifier') }}</button>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @if(session('success'))
                <div class="alert alert-info" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Fermer">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Fermer</span>
                    </button>
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
                            <a href=" {{ route('etat_salaire') }} " class="btn  btn-primary">Télécharger la liste <span class="pcoded-micon"><i class="fa fa-download"></i></span></a>
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
                                    @forelse ($salaires as $salaire)
                                        <tr>
                                            <td>{{ $salaire->id }}</td>
                                            <td>{{ $salaire->moniteur->matricule }}</td>
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
                                                    <button type="submit" class="btn btn-danger">Delete
                                                        <span class="pcoded-micon"><i class="fa fa-trash"></i></span>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{ route('fiche_paye.edit', $salaire) }}"
                                                    method="GET">
                                                    <button type="submit" class="btn btn-success">Update 
                                                        
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9">Aucune fiche de salaire trouvée.</td>
                                            </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
