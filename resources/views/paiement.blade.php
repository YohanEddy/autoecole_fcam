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
                                                @foreach($apprenants as $apprenant)
                                                    <option value="{{$apprenant->id}}">{{ $apprenant->nameapp." ".$apprenant->prenomapp }}</option>
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
                                            <input name="datepaiement" type="datetime-local" class="form-control" id="validationCustom03"
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
            <!-- [ Main Content ] end -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Les paiements</h5>
                        <!--span class="d-block m-t-5">use class <code>table-striped</code> inside table element</!--span-->
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Client</th>
                                        <th>Date de paiement</th>
                                        <th>Montant</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($paiements as $paiement)

                                    <tr>
                                        <td>{{ $paiement->id }}</td>
                                        <td>{{ $paiement->apprenant->nameapp." ".$paiement->apprenant->prenomapp }}</td>
                                        <td>{{ $paiement->datepaiement }}</td>
                                        <td>{{ $paiement->montant }}</td>
                                        <td>
                                            <form action="{{ route('paiement.delete', $paiement) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ route('paiement.edit', $paiement) }}" method="GET">
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