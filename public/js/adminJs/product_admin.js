const updateProduct = () => {
    const data = {
        TenSanPham: document.getElementById('TenSanPham').value,
        MaLoai: document.getElementById('MaLoai').value,
        MaSanPham: document.getElementById('MaSanPham').value,
        GiaSanPham: document.getElementById('GiaSanPham').value,
        SoLuongSanPham: document.getElementById('SoLuongSanPham').value,
        NgayCapNhat: document.getElementById('NgayCapNhat').value,
        AnhSanPham: document.getElementById('AnhSanPham').value,
        ChiTiet: document.getElementById('ChiTiet').value,
    };

    if (data.TenSanPham === '' || data.MaSanPham === '' || data.GiaSanPham === '' || data.SoLuongSanPham === ""
        || data.NgayCapNhat === '' || data.AnhSanPham === '' || data.ChiTiet === '' || data.MaLoai === '') {
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
            url: '../../../app/controllers/adminControllers/crudProduct_adminController.php',
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
                        window.location.href = '/product_admin';
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
const createProduct = () => {
    const data = {
        TenSanPham: document.getElementById('TenSanPham').value,
        MaLoai: document.getElementById('MaLoai').value,
        MaSanPham: document.getElementById('MaSanPham').value,
        GiaSanPham: document.getElementById('GiaSanPham').value,
        SoLuongSanPham: document.getElementById('SoLuongSanPham').value,
        NgayNhap: document.getElementById('NgayCapNhat').value,
        NgayCapNhat: document.getElementById('NgayCapNhat').value,
        AnhSanPham: document.getElementById('AnhSanPham').value,
        ChiTiet: document.getElementById('ChiTiet').value,
    };

    if (data.TenSanPham === '' || data.MaSanPham === '' || data.GiaSanPham === '' || data.SoLuongSanPham === ""
        || data.NgayCapNhat === '' || data.AnhSanPham === '' || data.ChiTiet === '' || data.MaLoai === '' || data.NgayNhap === '') {
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
            url: '../../../app/controllers/adminControllers/crudProduct_adminController.php',
            data: {
                action: 'create',
                ...data,
            },
            success: (res) => {
                console.log(res);
                if (res.data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Thành công!',
                        text: res.message,
                        iconColor: '#4c505c',
                    }).then(() => {
                        window.location.href = '/product_admin';
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
const deleteProduct = (MaSanPham) => {
    Swal.fire({
        title: 'Bạn có chắc chắn muốn xóa sản phẩm này?',
        text: "Bạn sẽ không thể hoàn tác lại quá trình này!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Đồng ý',
        cancelButtonText: 'Hủy',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'POST',
                url: '../../../app/controllers/adminControllers/crudProduct_adminController.php',
                data: {
                    action: 'delete',
                    MaSanPham,
                },
                success: (res) => {
                    if (res.data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Thành công!',
                            text: res.message,
                            iconColor: '#4c505c',
                        }).then(() => {
                            window.location.href = '/product_admin';
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
    });
}
