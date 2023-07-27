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
                                <li class="breadcrumb-item"><a href="{{ route('home')}}"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#!">Formulaires et Tableaux</a></li>
                                <li class="breadcrumb-item"><a href="#!">Moniteurs</a></li>
                                <li class="breadcrumb-item"><a href="#!">Nouveau moniteur</a></li>
                            </ul>
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
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- [ form-element ] start -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Nouveau Moniteur</h5>
                            <p class="text-danger mb-1">
                                (*) C'est pour désigner les champs obligatoires.
                            </p>
                            <hr>
                            @if (!isset($moniteur))
                                <form action="{{ route('moniteur.stores') }}" method="post">
                                @else
                                    <form action="{{ route('moniteur.update', $moniteur) }}" method="POST"
                                        enctype="multipart/form-data">
                                        <!--input type="hidden" name="_method" value="PUT"-->
                                        @method('PUT')
                            @endif
                            @csrf
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <p class="text-center text-danger">{{ $error }}</p>
                                @endforeach
                            @endif
                            <div class="row">
                                <div class="col-6">
                                    <!--div class="form-group">
                                        <label for="validationCustom01"><strong>Matricule</strong></label>
                                        <input type="text" name="matricule" class="form-control" id="validationCustom01"
                                            placeholder="Matricule" value="{{ isset($moniteur) ? $moniteur->matricule : '' }}">
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </!--div-->
                                    <div class="form-group">
                                        <label for="validationCustom01"><strong>Nom de Famille<span class="required">*</span></strong></label>
                                        <input type="text" name="nom_moniteur" class="form-control"
                                            id="validationCustom01" placeholder="Nom de Fammille"
                                            value="{{ isset($moniteur) ? $moniteur->nom_moniteur : '' }}">
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="validationCustom01"><strong>Prenoms<span class="required">*</span></strong></label>
                                        <input type="text" name="prenom_moniteur" class="form-control"
                                            id="validationCustom02" placeholder="Prenoms"
                                            value="{{ isset($moniteur) ? $moniteur->prenom_moniteur : '' }}">
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1"><strong>Sexe<span class="required">*</span></strong></label>
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
                                                naissance<span class="required">*</span></strong></label>
                                        <input type="date" name="date_naiss" class="form-control"
                                            value="{{ isset($moniteur) ? $moniteur->date_naiss : '' }}"
                                            id="validationCustom03" placeholder="Date de naissance"required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect4"><strong>Date d'arrivée <span class="required">*</span></strong></label>
                                        <input type="date" name="date_arrive" class="form-control"
                                            value="{{ isset($moniteur) ? $moniteur->date_arrive : '' }}"
                                            id="validationCustom04" placeholder="Date d'arrivée"required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="validationCustom06"><strong>Adresse du Domicile<span class="required">*</span></strong></label>
                                        <input type="text" name="domicile_moniteur" class="form-control"
                                            value="{{ isset($moniteur) ? $moniteur->domicile_moniteur : '' }}"
                                            id="validationCustom06" placeholder="Adresse du domicile"required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="validationCustom05"><strong>Nationalité<span class="required">*</span></strong></label>
                                        <input type="text" name="nationalite" class="form-control"
                                            value="{{ isset($moniteur) ? $moniteur->nationalite : '' }}"
                                            id="validationCustom05" placeholder="Nationalité"required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="validationCustom07"><strong>Téléphone<span class="required">*</span></strong></label>
                                        <input type="text" name="telephone" class="form-control"
                                            value="{{ isset($moniteur) ? $moniteur->telephone : '' }}"
                                            id="validationCustom07" placeholder="Téléphone"required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><strong>Adresse Mail</strong></label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ isset($moniteur) ? $moniteur->email : '' }}"
                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                            placeholder="Entrez l'email">
                                    </div>
                                    <div class="form-group">
                                        <label for="validationCustom04"><strong>Lieu de Naissance<span class="required">*</span></strong></label>
                                        <input type="text" name="lieunaiss" class="form-control"
                                            value="{{ isset($moniteur) ? $moniteur->lieunaiss : '' }}"
                                            id="validationCustom04" placeholder="Lieu de naissance"required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                                <p></p>
                                @if (!isset($moniteur))
                                    <button type="submit" class="btn  btn-primary">{{ __('Ajouter') }}</button>
                                @else
                                    <button type="submit" class="btn  btn-primary">{{ __('Modifier') }}</button>
                                @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                

            </div>
    </section>
@endsection
