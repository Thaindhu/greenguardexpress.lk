var cart = {};
var cart_data = {
    single_add: function (product_id, image_url, product_name, type, dev_type) { 
      
        $(".error").empty();
        var isValid = true;
        var selected_varies_obj = [];
        if (!$("#quantity").val()) {
            show_err("Enter a valid quantity");
            isValid = false;
        }
        if (window.varies) {
            window.varies.forEach((el) => {
                var val = $("input[name=" + el.title + "]:checked").val();
                // console.log($("input[name=" + el.title + "]:checked").val());
                mainObj = {};
                if (!val) {
                    show_err("Select all options");
                    isValid = false;
                }
                mainObj["type"] = el.title;
                mainObj["value"] = $(
                    "input[name=" + el.title + "]:checked"
                ).val();
                selected_varies_obj.push(mainObj);
            });
        }
        if (isValid) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            $.ajax({
                url: "/cart/add",
                type: "POST",
                beforeSend: function () {
                    $("#button-cart").prop("disabled", true);
                    $("#btn-cart-mobile").addClass("disable-click");
                    $("#btn-buynow-mobile").addClass("disable-click");
                    if (dev_type == "mob" && type != "buynow") {
                        $(".buy-now-mob").prop("disabled", true);
                        $(".cart-mob-icon")
                            .removeClass("fa fa-shopping-cart")
                            .addClass("fas fa-circle-notch fa-spin");
                    }
                    if (dev_type == "mob" && type == "buynow") {
                        $(".buy-mob-icon")
                            .addClass("fas fa-circle-notch fa-spin");
                    }
                },
                data: {
                    product_id: product_id,
                    qty: $("#quantity").val(),
                    varies: selected_varies_obj,
                    price: $("#product_price").val(),
                },
                success: function (response) {
                    // console.log(dev_type);
                    if (response.status) {
                        calculate_top_bar_cart(response.cart);
                        if (dev_type == "mob") {
                            iziToast.show({
                                timeout: 2000,
                                theme: "dark",
                                // icon: 'fa fa-shopping-cart',
                                close: true,
                                position: "bottomCenter",
                                message:
                                    "<span>Added to cart successfully</span>  <a href='/cart' class='m-l-10'> <b>  View cart</b></a>",
                            });
                        } else {
                            addProductNotice(
                                "Product added to Cart",
                                '<img src="' +
                                    response.added_product.image1_path +
                                    '" alt="">',
                                '<h3><a href="#">' +
                                    response.added_product.product_name +
                                    '"</a> added to <a href="/cart">shopping cart</a>!</h3>',
                                "success"
                            );
                        }

                        if (type == "buynow") {
                            window.location.href = "/cart";
                        }
                        $("#button-cart").prop("disabled", false);
                        $("#btn-cart-mobile").removeClass("disable-click");
                        $("#btn-buynow-mobile").removeClass("disable-click");
                    }
                    if (dev_type == "mob") {
                        $(".buy-now-mob").prop("disabled", false);
                        $(".cart-mob-icon")
                            .removeClass("fas fa-circle-notch fa-spin")
                            .addClass("fa fa-shopping-cart");
                    }
                },
                error: function (res) {
                    console.log(res);
                    $("#button-cart").prop("disabled", false);
                    addProductNotice(
                        "Product addding failed to Cart",
                        '<h3><a href="#">"</a> Product adding failed <a href="/cart">shopping cart</a>!</h3>',
                        "success"
                    );
                    // console.log(res);
                },
            });
        }
    },
    remove: function (array_index) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: "/cart/remove/" + array_index,
            type: "GET",
            beforeSend: function () {},
            success: function (response) {
                // console.log(response);
                if (response.status) {
                    calculate_top_bar_cart(response.cart);
                }
            },
            error: function (res) {},
        });
    },
    remove_cart: function (array_index) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: "/cart/remove/" + array_index,
            type: "GET",
            beforeSend: function () {},
            success: function (response) {
                // console.log(response);
                if (response.status) {
                    calculate_top_bar_cart(response.cart);
                }
                location.reload();
            },
            error: function (res) {},
        });
    },
    check: function (price, qty) {
        var product_price =
            window.product.price - window.product.discount_price + price;
        var product_oldprice = window.product.price + price;
        $("#product_price").val(product_price);
        $("#price").text(product_price.toFixed(2));
        $("#price-old").text(product_oldprice.toFixed(2));
        $('#koko-installment').text((product_price/3).toFixed(2));
        // console.log('here');
    },
    update_cart: function (arr_index, type) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: "/cart/update/" + arr_index + "/" + type,
            type: "GET",
            beforeSend: function () {},
            success: function (response) {
                // console.log(response);
                if (response.status) {
                    calculate_top_bar_cart(response.cart);
                }
            },
            error: function (res) {},
        });
    },
};
var wishlist = {
    add: function (product_id, image_url, product_name) {
        var prev_class = $("#icon_" + product_id).attr("class");
        if (!window.userID) {
            addProductNotice(
                "Please login to save products",
                '<img src="' + image_url + '" alt="">',
                '<h3>You must <a href="/login">login</a> to save <a href="#">' +
                    product_name +
                    '"</a> to your <a href="/wishlist">wish list</a>!</h3>',
                "success"
            );
            return;
        }
        // $("#icon_" + product_id)
        //     .removeClass("fa fa-heart-o")
        //     .addClass("fa fa-heart");
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: "/wishlist/add/" + product_id,
            type: "GET",
            beforeSend: function () {
                $(".icon_" + product_id)
                    .removeClass("fa fa-heart-o")
                    .addClass("fas fa-circle-notch fa-spin");
            },
            success: function (response) {
                if (response.status && response.type == "removed") {
                    $(".icon_" + product_id)
                        .removeClass("fas fa-circle-notch fa-spin")
                        .addClass("fa fa-heart-o");
                    addProductNotice(
                        "Product removed from your wishlist",
                        '<img src="' + image_url + '" alt="">',
                        "<h3>" +
                            product_name +
                            ' removed from <a href="/wishlist"> wish list</a>!</h3>',
                        "success"
                    );
                    return;
                }
                if (response.status && response.type == "added") {
                    $(".icon_" + product_id)
                        .removeClass("fas fa-circle-notch fa-spin")
                        .addClass("fa fa-heart");
                    addProductNotice(
                        "Product added to Wishlist",
                        '<img src="' + image_url + '" alt="">',
                        '<h3><a href="#">' +
                            product_name +
                            'added to "</a> to your <a href="/wishlist"> wish list</a>!</h3>',
                        "success"
                    );
                    return;
                }
                $(".icon_" + product_id)
                    .removeClass("fas fa-circle-notch fa-spin")
                    .addClass(prev_class);
            },
            error: function (res) {
                // console.log(res);
                $(".icon_" + product_id)
                    .removeClass("fas fa-circle-notch fa-spin")
                    .addClass("fa fa-heart-o");
            },
        });

        // addProductNotice(
        //     "Product added to Wishlist",
        //     '<img src="image/demo/shop/product/e11.jpg" alt="">',
        //     '<h3>You must <a href="#">login</a>  to save <a href="#">Apple Cinema 30"</a> to your <a href="#">wish list</a>!</h3>',
        //     "success"
        // );
    },
    remove: function (product_id, image_url, product_name) {
        $.ajax({
            url: "/wishlist/add/" + product_id,
            type: "GET",
            beforeSend: function () {
                $(".icon_" + product_id)
                    .removeClass("fa fa-times")
                    .addClass("fas fa-circle-notch fa-spin");
            },
            success: function (response) {
                if (response.status && response.type == "removed") {
                    $("#tr_" + product_id).remove();
                    addProductNotice(
                        "Product removed from your wishlist",
                        '<img src="' + image_url + '" alt="">',
                        "<h3>" +
                            product_name +
                            ' removed from <a href="/wishlist"> wish list</a>!</h3>',
                        "success"
                    );
                    return;
                }
            },
            error: function (res) {},
        });

        // addProductNotice(
        //     "Product added to Wishlist",
        //     '<img src="image/demo/shop/product/e11.jpg" alt="">',
        //     '<h3>You must <a href="#">login</a>  to save <a href="#">Apple Cinema 30"</a> to your <a href="#">wish list</a>!</h3>',
        //     "success"
        // );
    },
};
var compare = {
    add: function (product_id) {
        addProductNotice(
            "Product added to compare",
            '<img src="image/demo/shop/product/e11.jpg" alt="">',
            '<h3>Success: You have added <a href="#">Apple Cinema 30"</a> to your <a href="#">product comparison</a>!</h3>',
            "success"
        );
    },
};

/* ---------------------------------------------------
		jGrowl – jQuery alerts and message box
	-------------------------------------------------- */
function addProductNotice(title, thumb, text, type) {
    $.jGrowl.defaults.closer = false;
    //Stop jGrowl
    //$.jGrowl.defaults.sticky = true;
    var tpl = thumb + "<h3>" + text + "</h3>";
    $.jGrowl(tpl, {
        life: 4000,
        header: title,
        speed: "slow",
        theme: type,
    });
}

function show_err(msg) {
    $(".error").append(
        "<div class='alert alert-danger icons-alert'>" +
            "<p><strong>Sorry!</strong> " +
            msg +
            "</p>" +
            "</div>"
    );
}

function calculate_top_bar_cart(dataarr) {
    // console.log(dataarr);
    $(".top-cart-tbl tr").remove();
    var cart_total = 0;
    dataarr.forEach((el) => {
        cart_total += el.price * el.qty;
        $(".top-cart-tbl").append(
            "<tr>" +
                "<td class='text-center' style='width:70px'>" +
                "<a href='/product/view/" +
                el.product_id +
                "/" +
                el.metaname +
                "'> <img src='" +
                el.image1_path +
                "' style='width:70px' alt='Filet Mign' title='Filet Mign' class='preview'> </a>" +
                "</td>" +
                "<td class='text-left'> " +
                "<a class='cart_product_name' href='/product/view/" +
                el.product_id +
                "/" +
                el.metaname +
                "'>" +
                el.product_name.substring(0, 8) +
                "</a> " +
                "</td>" +
                "<td class='text-center'> x" +
                el.qty +
                " </td>" +
                "<td class='text-center'> Rs." +
                (el.price * el.qty).toFixed(2) +
                " </td>" +
                "<td class='text-right'>" +
                "<a href='/product/view/" +
                el.product_id +
                "/" +
                el.metaname +
                "' class='fa fa-edit'></a>" +
                "</td>" +
                "<td class='text-right'>" +
                "<a onclick='cart_data.remove(" +
                dataarr.indexOf(el) +
                ")' class='fa fa-times fa-delete'></a>" +
                "</td>" +
                "</tr>"
        );
    });

    $(".cart-count").text(dataarr.length);
    $(".cart_total").text(cart_total.toFixed(2));

    // $('#myTable tr:last').after('<tr>...</tr><tr>...</tr>');
}

function agelimit() {
    iziToast.question({
        timeout: false,
        drag: false,
        close: false,
        overlay: true,
        // title: 'Hey',
        message: "How old are you?",
        position: "center",
        inputs: [
            // ['<input type="text">', 'keyup', function (instance, toast, input, e) {
            //     console.info(input.value);
            // }, true], // true to focus
            [
                '<select><option value="">Select Option</option><option value="1017">10 ~ 17</option><option value="1830">18 ~ 30</option><option value="3140">31 ~ 40</option><option value="40">40+</option></select>',
                "change",
                function (instance, toast, select, e) {
                    console.info(select.options[select.selectedIndex].value);
                },
            ],
        ],
        buttons: [
            [
                "<button><b>Confirm</b></button>",
                function (instance, toast, button, e, inputs) {
                    switch (inputs[0].value) {
                        case "1017":
                            window.location.href = "/products/all/all";
                            break;
                        case "1830":
                            instance.hide(
                                {
                                    transitionOut: "fadeOut",
                                },
                                toast,
                                "button"
                            );
                            break;
                        case "3140":
                            instance.hide(
                                {
                                    transitionOut: "fadeOut",
                                },
                                toast,
                                "button"
                            );
                            break;
                        case "40":
                            instance.hide(
                                {
                                    transitionOut: "fadeOut",
                                },
                                toast,
                                "button"
                            );
                            break;

                        default:
                            break;
                    }
                },
                false,
            ], // true to focus
        ],
    });
}
