@extends('../base/bases')
@section('content')
<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h3 class="m-b-10">FCAM </h3>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Menu</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7 col-md-12">
                <!-- support-section start -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card support-bar overflow-hidden">
                            <div class="card-body pb-0">
                                <h2 class="m-0">{{ $nombre_client }}</h2>
                                <span class="text-c-blue">Clients</span>
                                <p class="mb-3 mt-3">Nombre total de clients dans la base de données</p>
                            </div>
                            <div id="support-chart"></div>
                            <div class="card-footer bg-primary text-white">
                                <div class="row text-center">
                                    <div class="col">
                                        <h4 class="m-0 text-white">Nombre total de client</h4>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card support-bar overflow-hidden">
                            <div class="card-body pb-0">
                                <h2 class="m-0">{{ $nombre_moniteur }}</h2>
                                <span class="text-c-green">Moniteurs</span>
                                <p class="mb-3 mt-3">Nombre total de moniteur dans le centre</p>
                            </div>
                            <div id="support-chart1"></div>
                            <div class="card-footer bg-success text-white">
                                <div class="row text-center">
                                    <div class="col">
                                        <h4 class="m-0 text-white">Nombre total de moniteur</h4>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- support-section end -->
            </div>
            <div class="col-lg-5 col-md-12">
                <!-- page statustic card start -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h4 class="text-c-yellow">{{ $sommeMontants  }} FCFA</h4>
                                        <h6 class="text-muted m-b-0">Total des dépense du mois en cours</h6>
                                    </div>
                                    <div class="col-4 text-right">
                                        <i class="feather icon-bar-chart-2 f-28"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-c-yellow">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <p class="text-white m-b-0"></p>
                                    </div>
                                    <div class="col-3 text-right">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center"> 
                                    <div class="col-8">
                                        <h4 class="text-c-green">{{ $nombre_cour_auj }}</h4>
                                        <h6 class="text-muted m-b-0">Nombre de cours programmer aujourd'hui</h6>
                                    </div>
                                    <div class="col-4 text-right">
                                        <i class="feather icon-file-text f-28"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-c-green">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <p class="text-white m-b-0"></p>
                                    </div>
                                    <div class="col-3 text-right">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h4 class="text-c-red">{{ $dateDuJour }}</h4>
                                        <h6 class="text-muted m-b-0">Date du jour</h6>
                                    </div>
                                    <div class="col-4 text-right">
                                        <i class="feather icon-calendar f-28"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-c-red">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <p class="text-white m-b-0"></p>
                                    </div>
                                    <div class="col-3 text-right">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h4 class="text-c-blue">500</h4>
                                        <h6 class="text-muted m-b-0">Downloads</h6>
                                    </div>
                                    <div class="col-4 text-right">
                                        <i class="feather icon-thumbs-down f-28"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-c-blue">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <p class="text-white m-b-0"></p>
                                    </div>
                                    <div class="col-3 text-right">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- page statustic card end -->
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Liste des cours</h4>
                        <hr>
                        <div class="col-6">
                            <div class="form-group">
                                <a href=" {{ route('etat_pgrm_cour') }} " class="btn  btn-primary">Download List
                                    <span class="pcoded-micon"><i class="fa fa-download"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Client</th>
                                        <th>Session et type de permis</th>
                                        <th>Cour</th>
                                        <th>Date du cour</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($participers as $participer)
                                        <tr class="table-info">
                                            <td>{{ $participer->id }}</td>
                                            <td>{{ $participer->apprenant->nameapp." ".$participer->apprenant->prenomapp }}</td>
                                            <td>{{ $participer->session->intitule." - ".$participer->session->type_permis }}</td>
                                            <td>{{ $participer->cour->type_cour." - ".$participer->cour->lib_cour }}</td>
                                            <td>{{ $participer->date_cour }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--<img src="../images/user/fond.jpg" width="1150" height="1000"> -->
    </div>
</div>
    
@endsection