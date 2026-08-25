//metodo para cambiar el status
function changeStatus(id) {
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
                        url: url + 'userController/changeStatus',
                        //datos a enviar
                        data: {'id':id}
                    }).done(function(answer) {
                        if (answer == 1) {
                            window.location = url + 'userController/viewUsers';
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
function dataUser(id){
    $.ajax({
        url: url + 'userController/userId',
        type: 'POST',
        dataType: 'json',
        data: {'id':id}
    }).done(function(answer){
        //vamos a capturar un id del input oculto
        $('#id').val(answer.idUser);
        $('#txtNames').val(answer.Names);
        $('#txtLastNames').val(answer.Lastnames);
        $('#txtEmail').val(answer.Email);
        $('#txtPhone').val(answer.Phone);
        $('#txtAddres').val(answer.Address);
        $('#txtUsername').val(answer.Username);
        
    }).fail(function(error){
        console.log(error);
    })
}
