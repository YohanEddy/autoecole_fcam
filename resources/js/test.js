import Swal from 'sweetalert2';
// const Swal = require('sweetalert2');

$(document).ready(()=>{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    const allDeleteBtn = document.querySelectorAll('[data-role="delete"]');

    allDeleteBtn.forEach((deleteBtn) => {
        deleteBtn.addEventListener('click', () => {
            var url = deleteBtn.getAttribute('data-url');

            Swal.fire({
                title: 'Confirmation de suppression',
                text: 'Ah ouais ? Tu veux vraiment supprimer ça ? Tu es sur ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Putain, carrément !',
                cancelButtonText: 'Non je préfère pas !'
    
            }).then((choice) => {
                if(choice.isConfirmed){
                    $.ajax({
                        url: url ,
                        type: "post",
                        dataType: 'json',
                        success: function (response) {
                            if(response.status == 200 && response.message == "success"){
                                Swal.fire({
                                    title: 'Suppression réussi putain !',
                                    text: 'Supprimer avec succès. J\'espère que tu sais ce que tu fais',
                                    icon: 'success'
                                })
                                location.reload(true);
                            }else{
                                Swal.fire({
                                    title: 'Echec',
                                    text: 'La suppression à échouer',
                                    icon: 'error'
                                })
                                location.reload(true);
                            }
                        },
                        error: function (e) {
                            Swal.fire({
                                title: 'Echec',
                                text: 'La suppression à échouer',
                                icon: 'error'
                            })
                            location.reload(true);
                        }
                    }); 
                }
            });       
        });
    });
});

