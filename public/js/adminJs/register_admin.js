const register = async (e) => {
    const tk = document.getElementById('tk').value;
    const mk = document.getElementById('mk').value;
    const mk2 = document.getElementById('mk2').value;
    // validate all data before sending to server
    if (
        tk === '' ||
        mk === '' ||
        mk2 === ''
    ) {
        console.log(tk + ' ' + mk + ' ' + mk2)
        Swal.fire({
            icon: 'error',
            title: 'Không được để trống!',
            text: 'vui lòng nhập đầy đủ thông tin!',
            iconColor: '#4c505c',
        });
        return;
    } else if (mk !== mk2) {
        document.getElementById('mk2').classList.add('is-invalid');
        document.getElementById('mk2').focus();
        return;
    } else {
        $.ajax({
            type: 'POST',
            url: '../../../app/controllers/adminControllers/register_adminController.php',
            data: {
                action: 'register',
                tk: tk,
                mk: mk,
            },
            success: function (response) {
                // Xử lý phản hồi từ server
                console.log(response.data);
                if (response.data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Đăng ký thành công',
                        text: 'Bạn sẽ được đưa về trang đăng nhập!',
                        iconColor: '#4c505c',
                    }).then((result) => {
                        window.location.href = '/login_admin';
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Đăng ký thất bại',
                        text: response.message,
                        iconColor: '#4c505c',
                    });
                }
            },
            error: function (error) {
                console.log(error);
            },
        });
    }
};
// validate full email with regex not use anothe function
// const validateEmail = (email) => {
//     var re = /\S+@\S+\.\S+/;
//     return re.test(email);
// };
