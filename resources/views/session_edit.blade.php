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
                                <li class="breadcrumb-item"><a href="#!">Sssion.Edit</a></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">k
                <!-- [ form-element ] start -->
                <div class="col-sm-12">
                    <div class="card">
                        <di class="card-body">
                            <h5>Session.Edit</h5>
                            <hr>
                                    <form action="{{ route('session.edit') }}" method="GET">
                                        @csrf
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1"><strong>Type de permis</strong></label>
                                                    <select name='type_permis' class="form-control" id="exampleFormControlSelect1">
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="C">C</option>
                                                        <option value="D">D</option>
                                                        <option value="E">E</option>
                                                        <option value="F">F</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="validationCustom01"><strong>Intitulé</strong></label>
                                                    <input name='intitule' type="text" class="form-control"
                                                        id="validationCustom02" placeholder="intitulé"required
                                                        value="{{ isset($session) ? $session->intitule : "" }}"required ">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>


                                            <div>
                                                <p>


                                                </p>
                                                <button type="submit" class="btn  btn-primary">{{ __('Enregistrer') }}</button>
                                            </div>
                                        </div>
                                    </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
@endsection
