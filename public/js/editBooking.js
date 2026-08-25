//metodo para cambiar el status de las reservas
function changeStatusB(id) {
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
                        url: url + 'bookingController/changeStatusB',
                        //datos a enviar
                        data: {'id':id}
                    }).done(function(answer) {
                        if (answer == 1) {
                            window.location = url + 'bookingController/viewBooking';
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


//metodo para editar
function dataBooking(id){
    // alert(id);
    $.ajax({
        url: url + 'bookingController/bookingId',
        type: 'POST',
        dataType: 'json',
        data: {'id':id}
    }).done(function(answer){
        //vamos a capturar un id del input oculto
        $('#txtCheckin').val(answer.Check_in);
        $('#txtCheckout').val(answer.Check_out);
        $('#txtLodging').val(answer.idLodging);
        $('#txtIdBooking').val(answer.idBooking);
        
    }).fail(function(error){
        console.log(error);
    })
}


