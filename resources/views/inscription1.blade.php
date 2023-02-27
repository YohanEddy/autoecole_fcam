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
                                <li class="breadcrumb-item"><a href="#!">Inscription</a></li>
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
                            <h5><strong>Formulaire d'inscription</strong></h5>
                            <hr>
                            @if(!isset($inscrire))
                                <form action="{{ route('apprenant.store') }}" method="POST">
                            @else
                                <form action="{{ route('apprenant.update', $inscrire) }}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                            @endif
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect8"><strong>Date
                                                    d'inscription</strong></label>
                                            <input type="date" name='date_inscrip' class="form-control"
                                                value="{{ isset($inscrire) ? $inscrire->apprenant->date_inscrip : "" }}"
                                                id="validationCustom08" placeholder="">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom01"><strong>Nom de Famille</strong></label>
                                            <input type="text" name='nameapp' class="form-control" id="validationCustom01"
                                                value="{{ isset($inscrire) ? $inscrire->apprenant->nameapp : "" }}"
                                                placeholder="Nom de Fammille">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom01"><strong>Prenoms</strong></label>
                                            <input type="text" name='prenomapp' class="form-control" id="validationCustom02"
                                                value="{{ isset($inscrire) ? $inscrire->apprenant->prenomapp : "" }}"
                                                placeholder="Prenoms"required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1"><strong>Sexe</strong></label>
                                            <select class="form-control" id="exampleFormControlSelect1" name='sexe'>
                                                <option>Masculin</option>
                                                <option>Feminin</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect3"><strong>Date de
                                                    naissance</strong></label>
                                            <input type="date" name='datenaiss' class="form-control" id="validationCustom03"
                                            value="{{ isset($inscrire) ? $inscrire->apprenant->datenaiss : "" }}"
                                                placeholder="Date de naissance"required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom04"><strong>Lieu de Naissance</strong></label>
                                            <input type="text" name='lieunaiss' class="form-control" id="validationCustom04"
                                            value="{{ isset($inscrire) ? $inscrire->apprenant->lieunaiss : "" }}"
                                                placeholder="Lieu de naissance"required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom03"><strong>Profession</strong></label>
                                            <input type="text" name='profession' class="form-control" id="validationCustom03"
                                            value="{{ isset($inscrire) ? $inscrire->apprenant->profession : "" }}"
                                                placeholder="Profession"required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom05"><strong>Nationalité</strong></label>
                                            <input type="text" name='nationalite' class="form-control"
                                            value="{{ isset($inscrire) ? $inscrire->apprenant->nationalite : "" }}"
                                                id="validationCustom05" placeholder="Nationalité"required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="validationCustom05"><strong>Type de Formation</strong></label>
                                           
                                            <select class="form-control" id="exampleFormControlSelect1" name='type_formation'>
                                                <option value="A">20 leçons de conduite</option>
                                                <option value="B">10 leçons de conduite</option>
                                                <option value="C">PACK pour toute demande de nombre important</option>
                                            </select>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom05"><strong>Période</strong></label>
                                            <input type="text" name='periode' class="form-control"
                                            value="{{ isset($inscrire) ? $inscrire->periode : "" }}"
                                                id="validationCustom05" placeholder="Période"required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom05"><strong>Modalité</strong></label>
                                            <input type="text" name='modalite' class="form-control"
                                            value="{{ isset($inscrire) ? $inscrire->modalite : "" }}"
                                                id="validationCustom05" placeholder="Modalité"required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom05"><strong>Session</strong></label>
                                            <select class="form-control" id="exampleFormControlSelect1" name='session'>
                                                @foreach($sessions as $session)
                                                    <option value="{{$session->id}}">{{ $session->intitule }}</option>
                                                @endforeach
                                            </select>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom07"><strong>Téléphone</strong></label>
                                            <input type="text" name='telephone' class="form-control" id="validationCustom07"
                                            value="{{ isset($inscrire) ? $inscrire->apprenant->telephone : "" }}"
                                                placeholder="Téléphone"required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom06"><strong>Adresse du Domicile</strong></label>
                                            <input type="text" name='domicile' class="form-control"
                                            value="{{ isset($inscrire) ? $inscrire->apprenant->domicile : "" }}"
                                                id="validationCustom06" placeholder="Adresse du domicile"required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><strong>Adresse Mail</strong></label>
                                            <input type="email" name='email' class="form-control"
                                            value="{{ isset($inscrire) ? $inscrire->apprenant->email : "" }}"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                placeholder="Entrez l'email">
                                        </div>
                                        <div class="form-group">
                                            <label for="attente"><strong>Vos attentes pour la formation de code et
                                                    conduite</strong></label>
                                            <input type="text" name='attentes' class="form-control" id="attente"
                                            value="{{ isset($inscrire) ? $inscrire->apprenant->attentes : "" }}"
                                                placeholder="Vos attentes"required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="attente"><strong>Comment avez vous eu connaissance de notre centre
                                                    de formation ?</strong></label>
                                            <input type="text" name='cnxance_centre' class="form-control" id="attente"
                                            value="{{ isset($inscrire) ? $inscrire->apprenant->cnxance_centre : "" }}"
                                                placeholder=""required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <p></p>
                                                @if(!isset($inscrire))
                                                <button type="submit" class="btn  btn-primary">{{ __('Ajouter') }}</button>
                                                @else
                                                <button type="submit" class="btn  btn-primary">{{ __('Modifier') }}</button>
                                                @endif
                                            </div>   
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <p></p>
                                                <a href=" {{ route('list_ins') }} " class="btn  btn-primary">Liste des
                                                    inscrits</a>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <p></p>
                                                <a href=" {{ route('list_app') }} " class="btn  btn-primary">Liste des
                                                    apprenants</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->

        </div>
    </section>
@endsection