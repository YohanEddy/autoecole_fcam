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
            
            <!-- [ Main Content ] end -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Les paiements</h5>
                        <div class="col-6">
                            <div class="form-group">
                                <p></p>
                                <a href=" {{ route('etat_paiement') }} " class="btn  btn-primary">Download List</a>
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
                                        <th>Date de paiement</th>
                                        <th>Montant Du</th>
                                        <th>Montant payé</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($paiements as $paiement)

                                    <tr>
                                        <td>{{ $paiement->id }}</td>
                                        <td>{{ $paiement->apprenant->nameapp." ".$paiement->apprenant->prenomapp }}</td>
                                        <td>{{ $paiement->datepaiement }}</td>
                                        <td>{{ $paiement->montant_du }}</td>
                                        <td>{{ $paiement->montant }}</td>
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