
<!DOCTYPE html>
<html lang="en">

<head>
    <title>FCAM</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon">

    <!-- vendor css -->
	<link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}"> 
    <link rel="stylesheet" href="{{ URL::asset('datatable/DataTables/datatables.min.css') }}">   
	<script src="{{ URL::asset('datatable/DataTables/jQuery-3.6.0/jquery-3.6.0.min.js') }}"></script>   
</head>
<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill">A</div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ navigation menu ] start -->


	<div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5>Liste des Paiements</h5>
                <!--span class="d-block m-t-5">use class <code>table-striped</code> inside table element</!--span-->
            </div>
            <hr>
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table id="paiement" class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">N°</th>
                                <th scope="col">Date de paiement</th>
                                <th scope="col">client</th>
                                <th scope="col">Montant payé</th>
                                <th scope="col">Montant DU</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paiements as $paiement)
                            <tr>
                                <td scope="row">{{ $paiement->id }}</td>
                                <td>{{ $paiement->datepaiement }}</td>
                                <td>{{ $paiement->apprenant->nameapp." ".$paiement->apprenant->prenomapp }}</td>
                                <td>{{ $paiement->montant }}</td>
                                <td>{{ $paiement->montant_du }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
        
    </div>
    <script>
        $(document).ready(function() {
            $('#paiement').DataTable({
                dom: 'Blfrtip',
                "language": {
                    "search": "Recherche :",
                    "lengthMenu": "Afficher _MENU_ lignes",
                    "info": "Affichage de _START_ à _END_ des _TOTAL_ lignes",
                    "zeroRecords": "Aucune ligne trouvées.",
                    "paginate": {
                        "first": "Début",
                        "last": "Fin",
                        "next": "Suivant",
                        "previous": "Précédent"
                    },
                },
                "lengthMenu": [
                    [3, 5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],
                buttons: [
                    {
                        extend: 'excel',
                        text: 'Exporter en Excel',
                        title: 'Liste des Paiements',
                    },
                    {
                        extend: 'pdfHtml5',
                        download: 'open',
                        text: 'Exporter en PDF',
                        title: 'Liste des Paiements',
                    },
                    {
                        extend: 'print',
                        text: 'Imprimer',
                        customize: function(win) {
                            $(win.document.body)
                                .css('font-size', '10pt')
                                .prepend(
                                    '<img src="{{ URL::asset('img/logo-pal.png') }}" style="position:absolute; top:25%; left:38%; opacity:0.5;" />'
                                );

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]
            });
        });
    </script>
    <script src="../assets/js/vendor-all.min.js"></script>
    <script src="../assets/js/plugins/bootstrap.min.js"></script>
    <script src="../assets/js/ripple.js"></script>
    <script src="../assets/js/pcoded.min.js"></script>
    <script src="{{ URL::asset('datatable/DataTables/datatables.min.js') }}"></script>

<!-- Apex Chart -->
<script src="../js/plugins/apexcharts.min.js"></script>


<!-- custom-chart js -->
<script src="../js/pages/dashboard-main.js"></script>
</body>

</html>


