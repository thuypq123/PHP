const createCategory = () => {
    const data = {
        MaLoai: document.getElementById('MaLoai').value,
        TenLoai: document.getElementById('TenLoai').value,
    };

    if (data.MaLoai === '' || data.TenLoai === '') {
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
            url: '../../../app/controllers/adminControllers/crudCategory_adminController.php',
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
                        window.location.href = '/category_admin';
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
const updateCategory = () => {
    const data = {
        MaLoai: document.getElementById('MaLoai').value,
        TenLoai: document.getElementById('TenLoai').value,
    };

    if (data.MaLoai === '' || data.TenLoai === '') {
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
            url: '../../../app/controllers/adminControllers/crudCategory_adminController.php',
            data: {
                action: 'update',
                ...data,
            },
            success: (res) => {
                if (res.data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Thành công!',
                        text: res.message,
                        iconColor: '#4c505c',
                    }).then(() => {
                        window.location.href = '/category_admin';
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
const deleteCategory = (MaLoai) => {
    // const MaSanPham = document.getElementById('MaSanPham');
    console.log('MaLoai: ', MaLoai);
    Swal.fire({
        title: 'Bạn có chắc chắn muốn xóa loại sản phẩm này?',
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
                url: '../../../app/controllers/adminControllers/crudCategory_adminController.php',
                data: {
                    action: 'delete',
                    MaLoai,
                },
                success: (res) => {
                    if (res.data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Thành công!',
                            text: res.message,
                            iconColor: '#4c505c',
                        }).then(() => {
                            window.location.href = '/category_admin';
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