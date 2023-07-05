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
                                <li class="breadcrumb-item"><a href="#!">Session</a></li>
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
                            <h5>Nouvelle Session</h5>
                            <hr>
                                    @if(!isset($session))
                                        <form action="{{ route('session.store') }}" method="POST">
                                    @else
                                        <form action="{{ route('session.update', $session) }}" method= "POST" enctype="multipart/form-data">
                                        <!--input type="hidden" name="_method" value="PUT"-->
                                            @method('PUT')
                                    @endif
                                        @csrf
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1"><strong>Type de permis</strong></label>
                                                    <select name='type_permis'class="form-control" id="exampleFormControlSelect1">
                                                        <option value="A" {{ (isset($session) && ($session->type_permis =="A")) ? 'selected' : '' }}>A</option>
                                                        <option value="B" {{ (isset($session) && ($session->type_permis =="B")) ? 'selected' : '' }}>B</option>
                                                        <option value="C" {{ (isset($session) && ($session->type_permis =="C")) ? 'selected' : '' }}>C</option>
                                                        <option value="D" {{ (isset($session) && ($session->type_permis =="D")) ? 'selected' : '' }}>D</option>
                                                        <option value="E" {{ (isset($session) && ($session->type_permis =="E")) ? 'selected' : '' }}>E</option>
                                                        <option value="F" {{ (isset($session) && ($session->type_permis =="F")) ? 'selected' : '' }}>F</option>
                                                        <option value="G" {{ (isset($session) && ($session->type_permis =="G")) ? 'selected' : '' }}>Sans passer l'examen</option>
                                                    </select>    
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="validationCustom01"><strong>Intitulé</strong></label>
                                                    <input name='intitule' type="text" class="form-control"
                                                    value="{{ isset($session) ? $session->intitule : "" }}"
                                                        id="validationCustom02"
                                                        placeholder="intitulé">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>


                                            <div>
                                                
                                                @if(!isset($session))
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
            @if(session('success'))
                <div class="alert alert-info" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            

            <!-- [ Main Content ] end -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Les Sessions</h5>
                        <!--span class="d-block m-t-5">use class <code>table-striped</code> inside table element</!--span-->
                    </div>

                    <div class="form-group">
                        <p></p>
                        <a href=" {{ route('etat_session') }} " class="btn  btn-primary">Download List</a>
                    </div>
                    
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            
                            <table class="table table-striped"">
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">TYPE DE PERMIS</th>
                                        <th scope="col">INTITULE</th>
                                        <th scope="col">supprimer</th>
                                        <th scope="col">modifier</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sessions as $session)
                                    <tr>
                                        <th scope="row">{{ $session->id }}</th>
                                        <td>{{ $session->type_permis }}</td>
                                        <td>{{ $session->intitule }}</td>
                                        <td>
                                            {{-- <form id="session-delete-form"  > --}}
                                                {{-- @csrf action="{{ route('session.delete', $session) }}" method="POST" --}}
                                                {{-- @method('delete') --}}
                                                <button id="" type="submit" class="btn btn-danger" 
                                                data-role="delete" 
                                                data-url="{{ route('session.delete', $session) }}">
                                                    Delete
                                                </button>
                                            {{-- </form> --}}
                                        </td>
                                        <td>
                                            <form action="{{ route('session.edit', $session) }}" method="GET">
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
    <script>
        // const btn = document.getElementById('btn-sw');

        // btn.addEventListener('click', () => {
        //     swal("Test");
        // });
    </script>
@endsection
