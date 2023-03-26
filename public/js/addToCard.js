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
    } else {
        $.ajax({
            type: 'POST',
            url: '../../app/controllers/addToCardController.php',
            data: {
                action: 'addCard',
                MaSanPham: MaSanPham,
                MaHoaDon: MaHoaDon,
                soLuong: soLuong,
            },
            success: function (response) {
                if (response.data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Thêm vào giỏ hàng thành công',
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
