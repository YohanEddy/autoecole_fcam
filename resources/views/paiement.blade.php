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
                                <li class="breadcrumb-item"><a href="#!">Paiement</a></li>
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
                            <h5>Effectuer un paiement</h5>
                            <hr>
                            @if (!isset($paiement)) 
                            <form action="{{ route('paiement.store') }}" method="post">
                            @else
                            <form action="{{ route('paiement.update', $paiement) }}" method="post" enctype="multipart/form-data">
                                @method('PUT')
                            @endif
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1"><strong>Client</strong></label>
                                            <select name="apprenant_id" class="form-control" id="exampleFormControlSelect1">
                                                @foreach($inscrires as $inscrire)
                                                    <option value="{{$inscrire->apprenant->id}}">
                                                        {{ $inscrire->apprenant->nameapp." ".$inscrire->apprenant->prenomapp }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom01"><strong>Montant</strong></label>
                                            <input name="montant" type="text" class="form-control" id="validationCustom02"
                                                placeholder="Montant"required
                                                value="{{ isset($paiement) ? $paiement->montant : "" }}">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        
                                        <div>
                                            <p></p>
                                            @if(!isset($paiement))
                                            <button type="submit" class="btn  btn-primary">{{ __('Effectuer') }}</button>
                                            @else
                                            <button type="submit" class="btn  btn-primary">{{ __('Modifier') }}</button>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect3"><strong>Date de Paiement</strong></label>
                                            <input name="datepaiement" type="date" class="form-control text-uppercase" id="validationCustom03"
                                                placeholder="Date de paiement"required
                                                value="{{ isset($paiement) ? $paiement->datepaiement : "" }}">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
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
                        <h5>Les paiements</h5>
                        <div class="col-6">
                            <div class="form-group">
                                <p></p>
                                <a href=" {{ route('etat_paiement') }} " class="btn  btn-primary">Télécharger la liste <span class="pcoded-micon"><i class="fa fa-download"></i></span></a>
                            </div>
                        </div>
                        <!--span class="d-block m-t-5">use class <code>table-striped</code> inside table element</!--span-->
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Client</th>
                                        {{-- <th>Date de paiement</th> --}}
                                        <th>Montant Du</th>
                                        <th>Montant payé</th>
                                        <th>Reste à payer</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($result as $row)
                                        <tr>
                                            <td>{{ $row->id }}</td>
                                            <td>{{ $row->nameapp." ".$row->prenomapp }}</td>
                                            <td>{{ $row->montant_du }}</td>
                                            <td>{{ $row->totalPaye }}</td>
                                            <td class="font-weight-bold {{($row->montant_du-$row->totalPaye)==0 ? "text-success" : "text-danger"}}">
                                                {{ ($row->montant_du-$row->totalPaye)==0 ? "Soldé" : ($row->montant_du-$row->totalPaye) }}
                                            </td>
                                            <td>
                                                <a href="{{ route('paiement.show', $row->id) }}" class="btn btn-success px-3 py-2">Détail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{-- @foreach($paiements as $paiement)

                                    <tr>
                                        <td>{{ $paiement->id }}</td>
                                        <td>{{ $paiement->apprenant->nameapp." ".$paiement->apprenant->prenomapp }}</td>
                                        <td>{{ $paiement->datepaiement }}</td>
                                        <td>{{ $paiement->montant_du }}</td>
                                        <td>{{ $paiement->montant }}</td>
                                        <td>
                                            
                                        </td>
                                        <td class="d-flex">
                                            <form action="{{ route('paiement.delete', $paiement) }}" method="POST" class="px-2">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                            <form action="{{ route('paiement.edit', $paiement) }}" method="GET" class="px-2">
                                                <button type="submit" class="btn btn-success">Update</button>
                                            </form>
                                        </td>
                                    </tr>

                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection