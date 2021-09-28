var base_url = document.getElementById('base_url').innerHTML;
function show_message($icon, $title, $message){
    Swal.fire({
        icon: $icon,
        html:
        '<div class="col-12">'+
        '<center>'+
        '<strong>'+$title+'</strong><br>'+
        '<small>'+$message+'</small>'+
        '</center>'+
        '</div>',
        showCloseButton: false,
        showCancelButton: false,
        showConfirmButton: true
    });
}
function login(){
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    // console.log('route : '+base_url);
    if(username != ''){
        if(password != ''){
            $('.loader').attr('hidden', false);
            $.ajax({
                url: base_url+"edit/login_process_admin",
                type: "post",
                data: {'username':username, 'password':password},
                success: function(result){
                    $('.loader').attr('hidden', true);
                    // console.log('data : '+result);
                    if(result == true){
                        show_message('success', 'Login berhasil', '');
                        location.reload();
                    }else{
                        show_message('error', 'Oops! sepertinya username atau password salah', 'masukan username dan password yang sesuai');
                    }
                },
                error: function (result, ajaxOptions, thrownError) {
                    $('.loader').attr('hidden', true);
                    // console.log('data : '+xhr.responseText);
                    show_message('error', 'Oops! sepertinya ada kesalahan', 'kesalahan tidak diketahui');
                }
            });
        }else{
            show_message('warning', 'Oops! sepertinya ada kesalahan', 'password kosong');
        }
    }else{
        show_message('warning', 'Oops! sepertinya ada kesalahan', 'username kosong');
    }
}