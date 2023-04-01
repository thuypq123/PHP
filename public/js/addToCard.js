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
const getCard = async () => {
    console.log('get card');
    $.ajax({
        type: 'POST',
        url: '../../app/controllers/addToCardController.php',
        data: {
            action: 'getCard',
        },
        success: function (response) {
            const card = document.getElementById('inner_card');
            const data = JSON.parse(response);

            // format currency
            const formatter = new Intl.NumberFormat('it-IT', {
                style: 'currency',
                currency: 'VND',
            });
            // sum total
            const sum = JSON.parse(response).reduce(
                (partialSum, item) => partialSum + Number(item.TongTien),
                0
            );
            document.getElementById('total').innerHTML = formatter.format(sum);

            // inner card to html
            data.map((item) => {
                card.innerHTML += `
                <div class="d-flex align-items-center mb-5">
                    <div class="flex-shrink-0">
                      <img src="${item.AnhSanPham}"
                        class="img-fluid" style="width: 150px;" alt="Generic placeholder image">
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <a href="#!" class="float-end text-black"><i class="fas fa-times"></i></a>
                      <h5 class="text-secondary">${item.TenSanPham}</h5>
                      <h6 style="color: #9e9e9e;">Color: white</h6>
                      <div class="d-flex align-items-center">
                        <p class="fw-bold mb-0 me-5 pe-3">${formatter.format(
                            item.GiaSanPham
                        )}</p>
                        <div class="def-number-input number-input safari_only">
                          <button type="button p-1" class="btn btn-dark w-10 p-2"
                            onclick="this.parentNode.querySelector('input[type=number]').stepDown(); processChanges('${
                                item.MaSanPham
                            }', '${item.MaHoaDon}')"
                            class="minus">-</button>
                          <input id = "soLuong_${
                              item.MaSanPham
                          }" onchange = "processChanges('${item.MaSanPham}', '${
                    item.MaHoaDon
                }')"" class="w-50 p-1" min="1" name="quantity" 
                          value="${item.SoLuong}" type="number">
                          <button type="button" class="btn btn-dark w-10 p-2"
                            onclick="this.parentNode.querySelector('input[type=number]').stepUp(); processChanges('${
                                item.MaSanPham
                            }', '${item.MaHoaDon}')"
                            class="plus">+</button>
                            <button onclick="processChanges('${
                                item.MaSanPham
                            }', '${
                    item.MaHoaDon
                }', 0)" type="button" class="btn btn-danger w-10 p-2">x</button>
                        </div>
                      </div>
                    </div>
                  </div>
                `;
            });
        },
        error: function (error) {
            console.log(error);
        },
    });
};
getCard();

function debounce(func, timeout = 300) {
    let timer;
    return (...args) => {
        clearTimeout(timer);
        timer = setTimeout(() => {
            func.apply(this, args);
        }, timeout);
    };
}

function updateCard(MaSanPham, MaHoaDon, getSoluong) {
    const soLuong =
        getSoluong == 0
            ? getSoluong
            : document.getElementById('soLuong_' + MaSanPham).value;
    console.log(getSoluong);
    if (!/^[0-9]+$/.test(soLuong)) {
        Swal.fire({
            icon: 'warning',
            title: 'Không thành công!',
            text: 'Số lượng phải là số nguyên!',
            iconColor: '#4c505c',
        });
    } else if (soLuong == 0) {
        // notify to user confirm delete?
        Swal.fire({
            title: 'Bạn có chắc chắn muốn xóa sản phẩm này?',
            showDenyButton: true,
            confirmButtonText: `Xóa`,
            denyButtonText: `Hủy`,
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire('Saved!', '', 'success');
                document.getElementById('inner_card').innerHTML = '';
                $.ajax({
                    type: 'POST',
                    url: '../../app/controllers/addToCardController.php',
                    data: {
                        action: 'updateCard',
                        MaSanPham: MaSanPham,
                        MaHoaDon: MaHoaDon,
                        SoLuong: soLuong,
                    },
                    success: function (response) {
                        // notify to user
                        Swal.fire({
                            icon: 'success',
                            title: 'Thành công!',
                            text: response.message,
                        }).then(() => {
                            card.innerHTML = '';
                        });
                    },
                    error: function (error) {},
                });
                getCard();
            }
        });
    } else {
        document.getElementById('inner_card').innerHTML = '';
        $.ajax({
            type: 'POST',
            url: '../../app/controllers/addToCardController.php',
            data: {
                action: 'updateCard',
                MaSanPham: MaSanPham,
                MaHoaDon: MaHoaDon,
                SoLuong: soLuong,
            },
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Thành công!',
                    text: response.message,
                }).then(() => {
                    card.innerHTML = '';
                    getCard();
                });
            },
            error: function (error) {},
        });
        getCard();
    }
}

const processChanges = debounce((MaSanPham, MaHoaDon, getSoluong) =>
    updateCard(MaSanPham, MaHoaDon, getSoluong)
);
