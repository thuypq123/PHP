const login = () => {
    const tk = document.getElementById('tk1').value;
    const mk = document.getElementById('mk1').value;
    // validate email and password
    if (tk === '' || mk === '') {
        Swal.fire({
            icon: 'error',
            title: 'Không được để trống!',
            text: 'vui lòng nhập đầy đủ thông tin!',
            iconColor: '#4c505c',
        });
    }
    else {
        $.ajax({
            type: 'POST',
            url: '../../../app/controllers/adminControllers/login_adminController.php',
            data: {
                action: 'login',
                tk: tk,
                mk: mk,
            },
            success: function (response) {
                if (response.data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Đăng Nhập thành công',
                        text: response.message,
                        iconColor: '#4c505c',
                    }).then((result) => {
                        window.location.href = '/admin';
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Đăng nhập thất bại',
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
