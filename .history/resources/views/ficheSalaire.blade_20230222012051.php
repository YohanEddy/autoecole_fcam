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
                                            <label for="validationCustom01"><strong>Nom et Prénoms</strong></label>
                                            <input name='client' type="text" class="form-control"
                                                id="validationCustom02" placeholder="client" value="{{ old('client') }}">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="validationCustom01"><strong>Catégorie
                                                    Professionelle</strong></label>
                                            <input name='categorie' type="text" class="form-control"
                                                id="validationCustom02" placeholder="categorie"
                                                value="{{ old('categorie') }}">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="validationCustom01"><strong>N° Matricule du
                                                    Moniteur</strong></label>
                                            <input name='matricule' type="text" class="form-control"
                                                id="validationCustom02" placeholder="matricule"required
                                                value="{{ old('matricule') }}">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="validationCustom01"><strong>Adresse</strong></label>
                                            <input name='adresse' type="text" class="form-control"
                                                id="validationCustom02" placeholder="adresse" value="{{ old('adresse') }}">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="validationCustom01"><strong>Emploi occupé</strong></label>
                                            <input name='emploi_occupe' type="text" class="form-control"
                                                id="validationCustom02" placeholder="" value="{{ old('emploi_occupe') }}">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-6 d-flex">
                                                <div class="d-block">
                                                    <label><strong>Salaire de base</strong></label>
                                                    <input type="text" name='SB' class="form-control" id="validationCustom03"
                                                    placeholder="salaire de base"required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="d-block p-4"> </div>
                                                <div class="d-block">
                                                    <label><strong>Heures Supplementaires</strong></label>
                                                    <input type="text" name='heur_sup' class="form-control" id="validationCustom04"
                                                    placeholder="heures supplementaires"required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 d-flex">
                                                <div class="d-block">
                                                    <label><strong>Primes d'ancienneté</strong></label>
                                                    <input type="text" name='prime_anc' class="form-control" id="validationCustom03"
                                                    placeholder="Prime d'ancienneté"required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="d-block p-4"> </div>
                                                <div class="d-block">
                                                    <label><strong>Primes de rendemment</strong></label>
                                                    <input type="text" name='prime_rdm' class="form-control" id="validationCustom04"
                                                    placeholder="Prime de rendement"required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="validationCustom01"><strong>Gratification</strong></label>
                                                    <input name='gratification' type="text" class="form-control"
                                                        id="validationCustom02" placeholder="gratification"required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div> --}}
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

                                </div>
                                <hr>
                                <h5>Les Retenus</h5>
                                <hr>
                                <div class="row">
                                    {{-- <div class="col-6 d-flex">
                                                <div class="d-block">
                                                    <label><strong>CNSS</strong></label>
                                                    <input type="text" name='CNSS' class="form-control" id="validationCustom03"
                                                    placeholder="CNSS"required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="d-block p-4"> </div>
                                                <div class="d-block">
                                                    <label><strong>INS</strong></label>
                                                    <input type="text" name='INS' class="form-control" id="validationCustom04"
                                                    placeholder="INS"required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div> --}}
                                    {{-- <div class="col-6 d-flex">
                                                <div class="d-block">
                                                    <label><strong>IRPP</strong></label>
                                                    <input type="text" name='IRPP' class="form-control" id="validationCustom03"
                                                    placeholder="IRPP"required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="d-block p-4"> </div>
                                                <div class="d-block">
                                                    <label><strong>TCS</strong></label>
                                                    <input type="text" name='TCS' class="form-control" id="validationCustom04"
                                                    placeholder="TCS"required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div> --}}
                                    {{-- <div class="col-6 d-flex">
                                                <div class="d-block">
                                                    <label><strong>Facture</strong></label>
                                                    <input type="text" name='facture' class="form-control" id="validationCustom03"
                                                    placeholder="facture"required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="d-block p-4"> </div>
                                                <div class="d-block">
                                                    <label><strong>Soins</strong></label>
                                                    <input type="text" name='soins' class="form-control" id="validationCustom04"
                                                    placeholder="soins"required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 d-flex">
                                                <div class="d-block">
                                                    <label><strong>Avance</strong></label>
                                                    <input type="text" name='avance' class="form-control" id="validationCustom03"
                                                    placeholder="avance"required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="d-block p-4"> </div>
                                                <div class="d-block">
                                                    <label><strong>Crédit</strong></label>
                                                    <input type="text" name='credit' class="form-control" id="validationCustom04"
                                                    placeholder="crédit"required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="validationCustom01"><strong>Acompte</strong></label>
                                                    <input name='acompte' type="text" class="form-control"
                                                        id="validationCustom02" placeholder="acompte"required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div> --}}
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="validationCustom01"><strong>TOTAL DES RETENUES</strong></label>
                                            <input name='tot_retenues' type="text" class="form-control"
                                                id="validationCustom02" placeholder="total des retenues"required
                                                value="{{ old('tot_retenues') }}">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h5>Net à payer</h5>
                                <hr>
                                {{-- <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="validationCustom01"><strong>1er Net </strong></label>
                                                    <input name='first_net' type="text" class="form-control"
                                                        id="validationCustom02" placeholder=""required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="validationCustom01"><strong>Transport</strong></label>
                                                    <input name='transport' type="text" class="form-control"
                                                        id="validationCustom02" placeholder=""required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="validationCustom01"><strong>NET A PAYER</strong></label>
                                                    <input name='net' type="text" class="form-control"
                                                        id="validationCustom02" placeholder=""required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect3"><strong>Date de Paiement</strong></label>
                                                    <input name="date_paiement" type="datetime-local" class="form-control" id="validationCustom03"
                                                        placeholder="Date de paiement"required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                <hr>
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
            <!-- [ Main Content ] end -->

        </div>
    </section>
@endsection
