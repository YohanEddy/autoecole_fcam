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
                            <li class="breadcrumb-item"><a href="#!">Caisse</a></li>
                            <li class="breadcrumb-item"><a href="#!">Dépences</a></li>
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
                        <h5>Nouvelle dépence</h5>
                        <hr>
                       
                            @if(!isset($depence))
                                <form action="{{ route('depence.store') }}" method="POST">
                            @else
                                <form action="{{ route('depence.update', $depence) }}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                            @endif
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect3"><strong>Date</strong></label>
                                                <input name='date_depence' type="date" class="form-control" id="validationCustom03" placeholder="Date"required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="validationCustom01"><strong>Montant</strong></label>
                                                <input name='montant' type="text" class="form-control" id="validationCustom02" placeholder="montant"required
                                                value="{{ isset($depence) ? $depence->montant : "" }}">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="validationCustom01"><strong>Libellé</strong></label>
                                                <input name='libelle' type="text" class="form-control" id="validationCustom02" placeholder="libellé"required
                                                value="{{ isset($depence) ? $depence->libelle : "" }}">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div>
                                                @if (isset($depence))
                                                <button type="submit" class="btn  btn-primary">{{ __('Modifier') }}</button>
                                                @else
                                                <button type="submit" class="btn  btn-primary">{{ __('Effectuer') }}</button>
                                                @endif
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
                </div>
            @endif        
        <!-- [ Main Content ] end -->
        <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Les Dépences</h5>
                        <!--span class="d-block m-t-5">use class <code>table-striped</code> inside table element</!--span-->
                        <div class="form-group">
                            <p></p>
                            <a href=" {{ route('etat_depense') }} " class="btn  btn-primary">Download List</a>
                        </div>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Libellé</th>
                                        <th>Montant</th>
                                        <th>Date</th>
                                        <th>Utilisateur</th>
                                        <th>SUPPRIMER</th>
                                        <th>MODIFIER</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($depences as $depence)
                                    <tr>
                                        <td>{{ $depence->id }}</td>
                                        <td>{{ $depence->libelle }}</td>
                                        <td>{{ $depence->montant }}</td>
                                        <td>{{ $depence->date_depence }}</td>
                                        <td>{{ $depence->user->name }}</td>
                                        <td>
                                            
                                            <button id="" type="submit" class="btn btn-danger" 
                                            data-role="delete" 
                                            data-url="{{ route('depence.delete', $depence) }}">
                                                Delete
                                            </button>
                                        </td>
                                        <td>
                                            <form action="{{ route('depence.edit', $depence) }}" method="GET">
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