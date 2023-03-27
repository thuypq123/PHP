const addCard = async (MaSanPham, MaHoaDon) => {
    console.log(MaSanPham + ' ' + MaHoaDon);
    const soLuong = document.getElementById('soLuong').value;
    if (soLuong === '') {
        Swal.fire({
            icon: 'warning',
            title: 'Không thành công!',
            text: 'Vui lòng nhập số lượng!',
            iconColor: '#4c505c',
        });
    } else if (soLuong < 1) {
        Swal.fire({
            icon: 'warning',
            title: 'Không thành công!',
            text: 'Số lượng phải lớn hơn 0!',
            iconColor: '#4c505c',
        });
    } // regex validate number only
    else if (!/^[0-9]+$/.test(soLuong)) {
        Swal.fire({
            icon: 'warning',
            title: 'Không thành công!',
            text: 'Số lượng phải là số nguyên!',
            iconColor: '#4c505c',
        });
    } else {
        $.ajax({
            type: 'POST',
            url: '../../app/controllers/addToCardController.php',
            data: {
                action: 'addCard',
                MaSanPham: MaSanPham,
                MaHoaDon: MaHoaDon,
                SoLuong: soLuong,
            },
            success: function (response) {
                if (response.data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Thành công!',
                        text: response.message,
                        iconColor: '#4c505c',
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Thêm vào giỏ hàng thất bại',
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
