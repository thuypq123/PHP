const getPaymentList = () => {
    $.ajax({
        url: '../../app/controllers/paymentUserController.php',
        type: 'POST',
        data: {
            action: 'getPaymentList',
        },
    }).done((response) => {
        response.map((payment, index) => {
            document.getElementById('renderList').innerHTML += `
            <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOneX-${index}">
                        <button class="accordion-button collapsed" 
                        type="button" 
                        data-mdb-toggle="collapse" 
                        data-mdb-target="#flush-collapseOneX-${index}" 
                        aria-expanded="false" 
                        aria-controls="flush-collapseOneX-${index}">
                            Đơn Hàng #${index}
                        </button>
                    </h2>
                    <div id="flush-collapseOneX-${index}" class="accordion-collapse collapse" aria-labelledby="flush-headingOneX-2" data-mdb-parent="#accordionFlushExampleX">
                        <table class="table align-middle mb-0 bg-white ">
                            <thead class="bg-light border border-white">
                                <tr>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Số Lượng</th>
                                    <th>Giá</th>
                                    <th>Tổng</th>
                                    <th>Vận chuyển</th>
                                    <th>Thanh Toán</th>
                                </tr>
                            </thead>
                            ${payment.ChiTietHoaDon.map((item) => {
                                return `<tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="${
                                                item.HinhAnh
                                            }" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                                            <div class="ms-3">
                                                <p class="fw-bold mb-1">${
                                                    item.TenSanPham
                                                }</p>
                                                <p class="text-muted mb-0">Địa Chỉ: ${
                                                    payment.DiaChi
                                                }</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">${
                                            item.SoLuong
                                        }</p>
                                    </td>
                                    <td>
                                        <span class="rounded-pill d-inline">${
                                            item.Gia
                                        }</span>
                                    </td>
                                    <td>
                                        <span class="rounded-pill d-inline">${
                                            item.TongTien
                                        }</span>
                                    </td>
                                    <td>
                                    <span class="rounded-pill d-inline">${
                                        item.VanChuyen
                                            ? '<button type="button" class="btn btn-primary"><i class="bi bi-check-lg"></i></button>'
                                            : '<button type="button" class="btn btn-danger"><i class="bi bi-x-square"></i></i></button>'
                                    }</span>
                                    </td>
                                    <td>
                                    <span class="rounded-pill d-inline">${
                                        payment.ThanhToan == '1'
                                            ? '<button type="button" class="btn btn-primary"><i class="bi bi-check-lg"></i></button>'
                                            : '<button type="button" class="btn btn-danger"><i class="bi bi-x-square"></i></i></button>'
                                    }</span>
                                    </td>
                                </tr>
                            </tbody>`;
                            })}
                        </table>
                        <!--Total Price-->
                    <div class="container text-muted d-flex justify-content-end" style="margin: 20px 0">
                        <h5 style="margin: 0 20px">Tổng Cộng:</h5>
                        <h5>${payment.TongTien}</h5>
                    </div>
                    <hr>
                </div>
            </div>`;
        });
    });
};
getPaymentList();
