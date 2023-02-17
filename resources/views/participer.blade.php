@extends('../base/bases')
@section('content')
<section class="pcoded-main-container">
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
                            <li class="breadcrumb-item"><a href="#!">Programmer un cour</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    <div class="row">
    <!-- [ form-element ] start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5>Programmer un cour</h5>
                <hr>
                    @if(!isset($participer))
                        <form action="{{ route('participer.store') }}" method="post">
                    @else
                        <form action="{{ route('participer.update', $participer) }}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                    @endif
                            @csrf
                            <div class="row">
                                
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1"><strong>Client</strong></label>
                                        <select name='apprenant_id'class="form-control" id="exampleFormControlSelect1">
                                            @foreach($apprenants as $apprenant)
                                            <option value="{{$apprenant->id}}">{{ $apprenant->nameapp." ".$apprenant->prenomapp }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1"><strong>Session</strong></label>
                                        <select name='session_id'class="form-control" id="exampleFormControlSelect1">
                                            @foreach($sessions as $session)
                                            <option value="{{$session->id}}">{{ $session->intitule." - ".$session->type_permis }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1"><strong>Cour</strong></label>
                                        <select name='cour_id'class="form-control" id="exampleFormControlSelect1">
                                            @foreach($cours as $cour)
                                            <option value="{{$cour->id}}">{{$cour->type_cour." - ".$cour->lib_cour }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                             
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect3"><strong>Date du cour</strong></label>
                                        <input name="date_cour" type="datetime-local" class="form-control" id="validationCustom03"
                                            placeholder="Date de paiement"required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p>


                                    </p>
                                    @if(!isset($participer))
                                    <button type="submit" class="btn  btn-primary">{{ __('Ajouter') }}</button>
                                    @else
                                    <button type="submit" class="btn  btn-primary">{{ __('Modifier') }}</button>
                                    @endif
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
            <h5>Les cours</h5>
            <!--span class="d-block m-t-5">use class <code>table-striped</code> inside table element</!--span-->
        </div>
        <div class="card-body table-border-style">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Client</th>
                            <th>Session</th>
                            <th>Cour</th>
                            <th>Date du cour</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($participers as $participer)
                            <tr>
                                <td>{{ $participer->id }}</td>
                                <td>{{ $participer->apprenant->nameapp." ".$participer->apprenant->prenomapp }}</td>
                                <td>{{ $participer->session->intitule." - ".$participer->session->type_permis }}</td>
                                <td>{{ $participer->cour->type_cour." - ".$participer->cour->lib_cour }}</td>
                                <td>{{ $participer->date_cour }}</td>
                                <td>
                                    <form action="{{ route('participer.delete', $participer) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('participer.edit', $participer) }}" method="GET">
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
