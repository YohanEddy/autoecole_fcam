@extends('../base/bases')
@section('content')
<style>
    #InscriptionForm fieldset:not(:first-of-type) {
    display: none;
}

#InscriptionForm .action-button {
    background-color: #3D5EE1;
    color: #fff;
    text-transform: uppercase;
    font-size: 12px;
    line-height: 16px;
    width: 280px;
    font-weight: bold;
    border: 0 none;
    cursor: pointer;
    padding: 15px 5px;
    margin: 10px 0px 5px 5px;
    float: right;
}

#InscriptionForm .action-button:hover,
#InscriptionForm .action-button:focus {
    background-color: #4CAF50;
    outline: none;
}

#InscriptionForm .action-button-previous {
    width: 280px;
    background: #616161;
    text-transform: uppercase;
    font-size: 12px;
    line-height: 16px;
    font-weight: bold;
    color: white;
    border: 0 none;
    cursor: pointer;
    padding: 15px 5px;
    margin: 10px 5px 10px 0px;
    float: right
}
.required {
    color: red;
    margin-left: 5px;
}

#InscriptionForm .action-button-previous:hover,
#InscriptionForm .action-button-previous:focus {
    background-color: #000000;
    outline: none;
}
</style>
@dump($errors)
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
                            <div>
                                <h5><span class="badge badge-light-primary">Progression</span></h5>
                            </div>
                            <div class="text-right">
                                <span class="text-xs font-semibold inline-block text-green-600" id="step-indicator">
                                    1 / 3
                                </span>
                            </div>
                            <div class="progress mb-4">
                                <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%"></div>
                            </div>
                            <p class="text-danger mb-1">
                                (*) C'est pour désigner les champs obligatoires.
                            </p>
                            <hr>

                            <form id="InscriptionForm" action="{{ isset($apprenant) ? route('apprenant.update', $inscrire) : route('apprenant.store') }}" method="POST">
                                @if (isset($apprenant))
                                @method('PUT')
                                @endif
                                @csrf
                            @if(session('success'))
                                <div class="alert alert-info" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Fermer">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Fermer</span>
                                    </button>
                                </div>
                            @endif
                            <fieldset class="row step-fieldset step-1 w-full relative m-0">

                                <div class="col-6" id="step-1">
                                    <x-input-field
                                      name="nameapp"
                                      placeholder="Nom de Fammille"
                                      label="Nom de Fammille"
                                      isRequire=true
                                      :value="isset($apprenant) ? $apprenant->nameapp : null"
                                    />
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1"><strong>Sexe<span class="required">*</span></strong></label>
                                        <select class="form-control" id="exampleFormControlSelect1" name='sexe'>
                                            <option @selected(old('sexe') == 'Masculin' || (isset($apprenant) ? $apprenant->sexe == 'Masculin' : false )) >Masculin</option>
                                            <option @selected(old('sexe') == 'Feminin' || (isset($apprenant) ? $apprenant->sexe == 'Feminin' : false ))>Feminin</option>
                                        </select>
                                    </div>

                                    <x-input-field
                                      name="lieunaiss"
                                      placeholder="Lieu de naissance"
                                      label="Lieu de Naissance"
                                      isRequire=true
                                      :value="isset($apprenant) ? $apprenant->lieunaiss : null"
                                    />
                                </div>
                                <div class="col-6">
                                    <x-input-field
                                      name="prenomapp"
                                      placeholder="Prenoms"
                                      label="Prenoms"
                                      isRequire=true
                                      :value="isset($apprenant) ? $apprenant->prenomapp : null"
                                    />
                                    <x-input-field
                                      name="datenaiss"
                                      placeholder="Date de naissance"
                                      label="Date de naissance"
                                      isRequire=true
                                      :value="isset($apprenant) ? $apprenant->datenaiss : null"
                                      type="date"
                                    />

                                    <x-input-field
                                      name="nationalite"
                                      placeholder="Nationalité"
                                      label="Nationalité"
                                      isRequire=true
                                      :value="isset($apprenant) ? $apprenant->nationalite : null"
                                    />
                                </div>
                                <input type="button" name="next" class="next btn btn-primary" value="Suivant" />

                            </fieldset>
                            <fieldset class="row step-fieldset step-2 w-full relative m-0 ">

                                <div class="row d-flex">
                                    <div class="col-6" id="step-3">

                                        <x-input-field
                                          label="Téléphone"
                                          name="telephone"
                                          :value="isset($apprenant) ? $apprenant->telephone : null"
                                          placeholder="Téléphone"
                                          isRequire=true
                                          type="tel"
                                        />

                                        <x-input-field
                                          label="Adresse Mail"
                                          name="email"
                                          :value="isset($apprenant) ? $apprenant->email : null"
                                          placeholder="Entrez l'email"
                                        />
                                    </div>
                                    <div class="col-6">

                                        <x-input-field
                                          label="Adresse du Domicile"
                                          name="domicile"
                                          :value="isset($apprenant) ? $apprenant->domicile : null"
                                          placeholder="Adresse du Domicile"
                                          isRequire=true
                                        />

                                        <x-input-field
                                          label="Profession"
                                          name="profession"
                                          :value="isset($apprenant) ? $apprenant->profession : null"
                                          placeholder="Profession"
                                          isRequire=true
                                        />
                                    </div>
                                </div>
                                <input type="button" name="previous" class=" previous btn btn-primary"value="Précédent" />
                                <input type="button" name="next" class=" next btn btn-primary" value="Suivant" />

                            </fieldset>
                            <fieldset class="row step-fieldset step-3 w-full relative m-0">
                                <div class="row d-flex">
                                    <div class="col-md-6" id="step-2">
                                        <x-input-field
                                          label="Date d'inscription"
                                          name="date_inscrip"
                                          :value="isset($apprenant) ? $apprenant->date_inscrip : null"
                                          placeholder="Date d'inscription"
                                          isRequire=true
                                          type="date"
                                        />

                                        <x-input-field
                                          label="Période"
                                          name="periode"
                                          :value="isset($apprenant) ? $inscrire->periode : null"
                                          placeholder="Période"
                                          isRequire=true
                                        />
                                        <div class="form-group">
                                            <label for="validationCustom05"><strong>Session<span class="required">*</span></strong></label>
                                            <select class="form-control" id="exampleFormControlSelect1" name='session_id'>
                                                @foreach ($sessions as $session)
                                                    <option value="{{ $session->id }}">{{ $session->intitule }}</option>
                                                @endforeach
                                            </select>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <x-input-field
                                          label="Comment avez vous eu connaissance de notre centre de formation ?"
                                          name="cnxance_centre"
                                          :value="isset($apprenant) ? $apprenant->cnxance_centre : null"
                                          placeholder="Comment avez vous eu connaissance de notre centre ?"
                                          isRequire=true
                                        />
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="validationCustom05"><strong>Type de Formation<span class="required">*</span></strong></label>
                                            <select class="form-control" id="exampleFormControlSelect1"
                                                name='type_formation'>
                                                <option value="A">20 leçons de conduite</option>
                                                <option value="B">15 leçons de conduite</option>
                                                <option value="C">10 leçons de conduite</option>
                                                <option value="D">Juste le Code</option>
                                            </select>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <x-input-field
                                          label="Modalité"
                                          name="modalite"
                                          :value="isset($apprenant) ? $inscrire->modalite : null"
                                          placeholder="Modalité"
                                          isRequire=true
                                        />

                                        <x-input-field
                                          label="Vos attentes pour la formation de code et de conduite"
                                          name="attentes"
                                          :value="isset($apprenant) ? $apprenant->attentes : null"
                                          placeholder="Vos attentes"
                                          isRequire=true
                                        />

                                    </div>
                                </div>

                                <input type="button" name="previous" class=" previous btn btn-primary"value="Précédent" />


                                    @if (!isset($apprenant))
                                        <button type="submit" class="btn  btn-primary">{{ __('Ajouter') }}</button>
                                    @else
                                        <button type="submit" class="btn  btn-primary">{{ __('Modifier') }}</button>
                                    @endif


                            </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->

        </div>
    </section>
    <script>
        $(document).ready(function() {
            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;
            var current = 1;
            var steps = $(".step-fieldset").length;

            setProgressBar(current);

            $(".next").click(function() {
                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            display: "none",
                            position: "relative",
                        });
                        next_fs.css({
                            opacity: opacity
                        });
                    },
                    duration: 500,
                });
                setProgressBar(++current);
            });

            $(".previous").click(function() {
                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                //show the previous fieldset
                previous_fs.show();

                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            display: "none",
                            position: "relative",
                        });
                        previous_fs.css({
                            opacity: opacity
                        });
                    },
                    duration: 500,
                });
                setProgressBar(--current);
            });

            function setProgressBar(curStep) {
                var percent = parseFloat(100 / steps) * curStep;
                percent = percent.toFixed();
                $(".progress-bar").css("width", percent + "%");
                $("#step-indicator").empty();
                $("#step-indicator").append(curStep + " / " + steps);
            }

            $(".submit").click(function() {
                return false;
            });
        });
    </script>
@endsection
