const login = () => {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    // validate email and password
    if (email === '' || password === '') {
        Swal.fire({
            icon: 'error',
            title: 'Không được để trống!',
            text: 'vui lòng nhập đầy đủ thông tin!',
            iconColor: '#4c505c',
        });
    }
    // regex validate email
    else if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
        Swal.fire({
            icon: 'error',
            title: 'Email không hợp lệ!',
            text: 'vui lòng nhập lại!',
            iconColor: '#4c505c',
        });
    } else {
        $.ajax({
            type: 'POST',
            url: '../../app/controllers/loginController.php',
            data: {
                action: 'login',
                email: email,
                password: password,
            },
            success: function (response) {
                if (response.data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Đăng Nhập thành công',
                        text: response.message,
                        iconColor: '#4c505c',
                    }).then((result) => {
                        window.location.href = '/';
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
