const getPaymentList = () => {
    $.ajax({
        url: '../../app/controllers/paymentUserController.php',
        type: 'POST',
        data: {
            action: 'getPaymentList',
        },
    }).then((res) => {
        console.log(res);
    });
};
getPaymentList();
