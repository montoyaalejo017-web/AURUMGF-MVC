//metodo para cambiar el status de los check in
function changeStatusCI(id) {
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
                        url: url + 'checkinController/changeStatusCI',
                        //datos a enviar
                        data: {'id':id}
                    }).done(function(answer) {
                        if (answer == 1) {
                            window.location = url + 'checkinController/viewCheckin';
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





