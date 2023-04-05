const updateBill = () => {
    const data = {
        MaHoaDon: document.getElementById('MaHoaDon').value,
        VanChuyen: document.getElementById('VanChuyen').value,
        ThanhToan: document.getElementById('ThanhToan').value,
    };

    if (data.VanChuyen === '' || data.ThanhToan === '', data.MaHoaDon === '') {
        Swal.fire({
            icon: 'warning',
            title: 'Không thành công!',
            text: 'Vui lòng nhập đầy đủ thông tin!',
            iconColor: '#4c505c',
        });
        return;
    } else {
        // if they are not empty, then add them to the database
        $.ajax({
            type: 'POST',
            url: '../../../app/controllers/adminControllers/updateBill_adminController.php',
            data: {
                action: 'update',
                ...data,
            },
            success: (res) => {
                console.log(res.data);
                if (res.data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Thành công!',
                        text:   res.message,
                        iconColor: '#4c505c',
                    }).then(() => {
                        window.location.href = '/bill_admin';
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Không thành công!',
                        text: res.message,
                        iconColor: '#4c505c',
                    });
                }
            },
        });
    }
}