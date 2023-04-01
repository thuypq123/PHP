const addToHoaDon = () => {
    const SDT = document.getElementById('SDT').value;
    const DiaChi = document.getElementById('DiaChi').value;
    // check the value of SDT, DiaChi, TenKhachHang and notify if they are empty
    if (SDT === '' || DiaChi === '') {
        Swal.fire({
            icon: 'warning',
            title: 'Không thành công!',
            text: 'Vui lòng nhập đầy đủ thông tin!',
            iconColor: '#4c505c',
        });
    } else {
        // if they are not empty, then add them to the database
        $.ajax({
            url: '../../app/controllers/paymentUserController.php',
            type: 'POST',
            data: {
                action: 'addPayMent',
                SDT,
                DiaChi,
            },
            success: (res) => {
                if (res.data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Thành công!',
                        text: 'Đặt hàng thành công!',
                        iconColor: '#4c505c',
                    }).then(() => {
                        window.location.href = '/';
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Không thành công!',
                        text: 'Đặt hàng thất bại!',
                        iconColor: '#4c505c',
                    });
                }
            },
        });
    }
};
