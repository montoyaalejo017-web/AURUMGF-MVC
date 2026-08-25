//metodo para cambiar el status de las cabañas
function changeStatusL(id) {
    //alert(id);
    Swal.fire({
        title: 'Do you wanna change Status?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Change It',
        cancelButtonColor: '#D33',
        confirmButtonColor: '#3085D6'
    }). then((result)=>{
        if(result.isConfirmed){
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Status change',
                confirmButtonText: 'OK'
            }).then((result)=>{
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'post',
                        url: url + 'lodgingController/changeStatusL',
                        //datos a enviar
                        data: {'id':id}
                    }).done(function(answer) {
                        if (answer == 1) {
                            window.location = url + 'lodgingController/viewLodging';
                            window.reload();
                        }else{
                            Swal.fire( 'Error', '', 'error')
                        }
                    }).fail(function(error){
                        console.log(error);
                    })
                }
            })
        }
    })
}



