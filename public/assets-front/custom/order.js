// $('#form').parsley();
$(".upload-file").hide();
console.log(order);

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

// console.log('working')
function payment_method_change() {
    var payment_method = $('input[name="payment_method"]:checked').val();
    if (payment_method == "cod") {
        $("#slip").prop("required", false);
        $(".upload-file").hide();
    } else if (payment_method == "online") {
        $("#slip").prop("required", false);
        $(".upload-file").hide();
        let online_data1 = $("#online").attr("data-value1");
        let online_data2 = $("#online").attr("data-value2");
        proceedPayhere(online_data1, online_data2);
    } else {
        $("#slip").prop("required", true);
        $(".upload-file").show();
    }
}

$("#form").submit(function (e) {
    // console.log("came");
    e.preventDefault();
    let formData = new FormData(this);
    if ($("#slip").parsley().validate() !== true) {
        iziToast.error({
            title: "Error",
            message: "Please upload the payment confirmation.",
            position: "bottomLeft",
            timeout: 3500,
        });
        return;
    }
    update(formData);
});

function update(formData) {
    $.ajax({
        type: "POST",
        url: "/order/update/payment-method",
        data: formData,
        beforeSend: function () {
            $("#loading-overlay").show();
            $("#btn-order").prop("disabled", true);
            // $("#btn-order").hide();
        },
        contentType: false,
        processData: false,
        success: (response) => {
            // console.log(response);
            if (response.status) {
                if (response.payment_type == "online") {
                    // $("#loading-overlay").show();
                    bank_pay();
                    return;
                } else if (response.payment_type == "koko") {
                } else {
                    window.location.href =
                        "/checkout/complete/" + response.order_id;
                    $("#btn-order").hide();
                }
            } else {
                if (response.message == "reload") {
                    location.reload();
                    return;
                }
                iziToast.error({
                    title: "Error",
                    message: response.message,
                    position: "bottomLeft",
                    timeout: 3500,
                });
                // $("#loading-overlay").show();
            }
        },
        error: function (response) {
            // $("#loading-overlay").show();
            $("#btn-order").prop("disabled", false);
            $("#btn-order").show();
            iziToast.error({
                title: "Error",
                message: "Something went wrong. Please try again later",
                position: "bottomLeft",
                timeout: 3500,
            });
        },
    });
}

function bank_pay() {
    var total_amount =
        parseFloat(order.total_amount) + parseFloat(order.delivery_amount);
    // Put the payment variables here
    var payment = {
        sandbox: false,
        merchant_id: "223120", // Replace your Merchant ID
        return_url: "https://myproduct.lk/", // Important
        cancel_url:
            "https://myproduct.lk/order/" + order.invoice_number + "/payment", // Important
        notify_url: "https://myproduct.lk/api/payhere/payment/status",
        order_id: order.invoice_number,
        items: order.invoice_number,
        amount: parseFloat(total_amount),
        currency: "LKR",
        first_name: order.first_name,
        last_name: order.last_name,
        email: "info@myproduct.lk",
        phone: order.mobile_number,
        address: order.address_1,
        city: order.city_name,
        country: "Sri Lanka",
        delivery_address: order.address_1,
        delivery_city: order.city_name,
        delivery_country: "Sri Lanka",
        custom_1: "",
        custom_2: "",
    };
    // console.log(payment);
    payhere.startPayment(payment);
    // Payment completed. It can be a successful failure.
    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);
        location.replace("/checkout/complete/" + orderId);
        // Note: validate the payment and show success or failure page to the customer
    };

    // Payment window closed
    payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
        $("#btn-order").prop("disabled", false);
        $("#btn-order").show();
    };

    // Error occurred
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:" + error);
        $("#btn-order").prop("disabled", false);
        $("#btn-order").show();
    };
}

function proceedPayhere(orderid, invoiceNumber) {
    $.ajax({
        type: "POST",
        url: "/order/payment/payhere",
        dataType: "json",
        data: { orderId: orderid, invoiceNumber: invoiceNumber },
        beforeSend: function () {},
        success: (response) => {
            let payment = {
                sandbox: false,
                merchant_id: "223120", // Replace your Merchant ID
                return_url: "https://myproduct.lk/",
                cancel_url:
                    "https://myproduct.lk/order/" + invoiceNumber + "/payment",
                notify_url: "https://myproduct.lk/api/payhere/payment/status",
                order_id: parseFloat(response.orderDetils["invoice_number"]),
                items: response.orderItemDetils["title"],
                amount: (
                    parseFloat(response.orderDetils["total_amount"]) +
                    parseFloat(response.orderDetils["delivery_amount"])
                ).toFixed(2),
                currency: "LKR",
                hash: response.hash, // *Replace with generated hash retrieved from backend
                first_name: response.userDetils["first_name"],
                last_name: response.userDetils["last_name"],
                email: "info@myproduct.lk",
                phone: response.userDetils["mobile_number"],
                address: response.userDetils["address_1"],
                city: response.userDetils["address_2"],
                country: "Sri Lanka",
                delivery_address: response.userDetils["address_1"],
                delivery_city: response.userDetils["address_2"],
                delivery_country: "Sri Lanka",
            };

            payhere.startPayment(payment);
            payhere.onCompleted = function onCompleted(orderId) {
                iziToast.success({
                    title: "All Good",
                    message: "Payment completed for order number" + orderId,
                    position: "bottomLeft",
                    timeout: 3500,
                });
            };

            // Payment window closed
            payhere.onDismissed = function onDismissed() {
                iziToast.error({
                    title: "Oops!!",
                    message: "Payment Dismissed",
                    position: "bottomLeft",
                    timeout: 3500,
                });
            };

            // Error occurred
            payhere.onError = function onError(error) {
                iziToast.error({
                    title: "Error",
                    message: error,
                    position: "bottomLeft",
                    timeout: 3500,
                });
            };
        },
        error: function (response) {
            iziToast.error({
                title: "Error",
                message: "Something went wrong. Please try again later",
                position: "bottomLeft",
                timeout: 3500,
            });
        },
    });
}
