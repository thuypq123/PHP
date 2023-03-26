const register = async (e) => {
    const fullname = document.getElementById('fullname').value;
    const email = document.getElementById('email').value;
    const SDT = document.getElementById('SDT').value;
    const password = document.getElementById('password').value;
    const password2 = document.getElementById('password2').value;
    // validate all data before sending to server
    if (
        fullname === '' ||
        email === '' ||
        password === '' ||
        password2 === ''
    ) {
        document.getElementById('error').innerHTML = 'Please fill all fields';
        return;
    }
    // regex validate email
    else if (!validateEmail(email)) {
        document.getElementById('email').classList.add('is-invalid');
        document.getElementById('email').focus();
        return;
    } else if (password !== password2) {
        document.getElementById('password2').classList.add('is-invalid');
        document.getElementById('password2').focus();
        return;
    } else {
        $.ajax({
            type: 'POST',
            url: '../../app/controllers/registerController.php',
            data: {
                action: 'register',
                fullname: fullname,
                email: email,
                SDT: SDT,
                password: password,
            },
            success: function (response) {
                // Xử lý phản hồi từ server
                console.log(response);
                if (response.data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Đăng ký thành công',
                        text: 'Bạn sẽ được đưa về trang đăng nhập!',
                        iconColor: '#4c505c',
                    }).then((result) => {
                        window.location.href = 'login';
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
const validateEmail = (email) => {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
};
