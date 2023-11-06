var VariationsJsonObj = [];
CKEDITOR.replace("description");
CKEDITOR.replace("small_description");

CKEDITOR.config = {
  autoUpdateElement: true,
}

CKEDITOR.on('instanceReady', function(){
  $.each( CKEDITOR.instances, function(instance) {
    CKEDITOR.instances[instance].on("change", function(e) {
      for ( instance in CKEDITOR.instances )
        CKEDITOR.instances[instance].updateElement();
    });
  });
});

$("#form").parsley();

$("#category_id").change(function (e) {
    e.preventDefault();
    $("#category_id").parsley().validate();
});
$("#sub_category_id").change(function (e) {
    e.preventDefault();
    $("#sub_category_id").parsley().validate();
});

$("#discount_pre").keyup(function (e) {
    calculate_discount();
});
$("#price").keyup(function (e) {
    calculate_discount();
});

function calculate_discount() {
    discount_pre = $("#discount_pre").val();
    price = $("#price").val();
    discount = price * (discount_pre / 100);
    $("#discount_price").val(discount.toFixed(2));
}


$("#addrow").click(function (e) {
    // console.log("working");
    var type = $("#type").val();
    var varies = $("#varies").val();
    if (varies && type) {
        $("#type").val(null), $("#varies").val(null);
        mainObj = {};

        mainObj["id"] = VariationsJsonObj.length + 1;
        mainObj["title"] = type;
        mainObj["varies"] = [];
        varies.forEach((el) => {
            SubObj = {};
            SubObj["type"] = el;
            SubObj["price"] = "";
            // SubObj["dis_price"] = null;
            // SubObj["dis_pre"] = null;
            SubObj["qty"] = "";
            mainObj["varies"].push(SubObj);
        });
        VariationsJsonObj.push(mainObj);
        // console.log(VariationsJsonObj);
        price_veri_div(mainObj);
        // $('#price_veri_div').append("<p>Test</p>");
    }
});

function edit_variations(arr) {
    VariationsJsonObj = JSON.parse(arr);
    var dataset = JSON.parse(arr);
    dataset.forEach((el) => {
        price_veri_div(el);
    });
}

function price_veri_div(item) {
    var html =
        "<div class='card' id='product_veri_card_" +
        item.id +
        "'>" +
        "<div class='card-header'>" +
        "<h5>" +
        item.title +
        "</h5>" +
        "<div class='card-header-right'>" +
        "<ul class='list-unstyled card-option'>" +
        "<li><i class='feather icon-trash-2 trash-card' onclick='deleteRow(" +
        item.id +
        ")'></i></li>" +
        "</ul>" +
        "</div>" +
        "</div>";
    item.varies.forEach((el) => {
        // console.log(el);
        html +=
            "<div class='card-block'>" +
            "<div class='form-group row' id='price_veri_div'>" +
            "<label class='col-sm-2 col-form-label'>" +
            el.type +
            " :</label>" +
            "<div class='col-sm-5'>" +
            "<input type='number' value='" +
            el.price +
            "' class='form-control' id='price_" +
            el.type +
            "' onkeyup=addValuestoArray('" +
            item.id +
            "','price','" +
            el.type +
            "') placeholder='Extra amount'>" +
            "</div>" +
            // "<div class='col-sm-3'>" +
            // "<input type='number' class='form-control' id='dis_price_"+ el.type +"' onkeyup=addValuestoArray('"+ item.id +"','dis_price','"+ el.type +"') placeholder='Dis. Price'>" +
            // "</div>" +
            // "<div class='col-sm-2'>" +
            // "<input type='number' class='form-control' id='dis_pre_"+ el.type +"' onkeyup=addValuestoArray('"+ item.id +"','dis_pre','"+ el.type +"') placeholder='Dis. Pre %'>" +
            // "</div>" +
            "<div class='col-sm-5'>" +
            "<input type='number' class='form-control' value='" + el.qty +"' id='qty_" + el.type +"' onkeyup=addValuestoArray('"+  item.id + "','qty','" +el.type +"') placeholder='Ava. Qty'>" +
            "</div>" +
            "</div>" +
            "</div>";
    });
    html += "</div>";

    $(".product_veri_section").append(html);
}

function addValuestoArray(arrIndex, fieldname, typename) {
    // console.log($(fieldname).val());
    VariationsJsonObj.forEach((el) => {
        if (el.id == arrIndex) {
            el.varies.forEach((elm) => {
                if (elm.type == typename) {
                    var field = "#" + fieldname + "_" + typename;
                    // console.log($(field).val());
                    elm[fieldname] = $(field).val();
                }
                return;
            });
            return;
        }
    });
    $("#variations").val(JSON.stringify(VariationsJsonObj));
    // console.log(VariationsJsonObj);
}

function deleteRow(id) {
    // var $this = $(this);
    $("#product_veri_card_1" + id).animate({
        opacity: "0",
        "-webkit-transform": "scale3d(.3, .3, .3)",
        transform: "scale3d(.3, .3, .3)",
    });

    setTimeout(function () {
        $("#product_veri_card_" + id).remove();
    }, 800);
    VariationsJsonObj.splice(
        VariationsJsonObj.findIndex((item) => item.id === id),
        1
    );
}
// $(".card-header-right .trash-card").on('click', function() {
//     var $this = $(this);
//     $this.parents('#product_veri_card').animate({
//         'opacity': '0',
//         '-webkit-transform': 'scale3d(.3, .3, .3)',
//         'transform': 'scale3d(.3, .3, .3)'
//     });

//     setTimeout(function() {
//         $this.parents('#product_veri_card').remove();
//     }, 800);
// });
