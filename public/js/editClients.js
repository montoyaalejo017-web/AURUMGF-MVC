//metodo para cambiar el status de los huespedes
function changeStatusC(id) {
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
                        url: url + 'clientController/changeStatusC',
                        //datos a enviar
                        data: {'id':id}
                    }).done(function(answer) {
                        if (answer == 1) {
                            window.location = url + 'clientController/viewClients';
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

//metodo para editar huespedes
function dataClient(id){
    // alert(id);
    $.ajax({
        url: url + 'clientController/clientsId',
        type: 'POST',
        dataType: 'json',
        data: {'id':id}
    }).done(function(answer){
        //vamos a capturar un id del input oculto
        $('#txtNames').val(answer.Names);
        $('#txtLastNames').val(answer.Lastnames);
        $('#txtEmail').val(answer.Email);
        $('#txtPhone').val(answer.Phone);
        $('#selAdults').val(answer.Adults);
        $('#selMinors').val(answer.Minors);
        $('#txtIdClient').val(answer.idClient);
        
    }).fail(function(error){
        console.log(error);
    })
}


