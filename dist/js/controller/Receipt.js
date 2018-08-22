$(document).ready(function () {
    selected=false;
    var Total;
    loadAllReceipt();
    var patientajaxconfig={
        method:"GET",
        url:"api/Patient.php?action=all",
        async:true
    };
    $.ajax(patientajaxconfig).done(function (response) {
        console.log(response);
        response.forEach(function (patientId) {
            var patient="<option>"+patientId.PatientID+"</option>"
            $("#droppaid").append(patient);
        })
    })

    var medicineajaxconfig={
        method:"GET",
        url:"api/Medicine.php?action=all",
        async:true
    }
    $.ajax(medicineajaxconfig).done(function (response) {
        response.forEach(function (MedicineId) {
            var medicine="<option>"+MedicineId.MID+"</option>"
            $("#dropmid").append(medicine);
        })

    })

     var presajaxconfig={
        method:"GET",
         url:"api/Prescription.php?action=all",
         async:true
     }
    $.ajax(presajaxconfig).done(function (response) {
        response.forEach(function (PrescriptionId) {
            var prescription="<option>"+PrescriptionId.PID+"</option>"
            $("#droppid").append(prescription);
        })

    })
});


$("#btnsaveres").click(function () {

    var resid = $("#rid").val();
    var unitprice = $("#txtUnitprice").val();
    var qty = $("#rqty").val();
    var date = $("#txtdate").val();
    var patientid = $("#droppaid").val();
    var presid = $("#droppid").val();
    var mediid = $("#dropmid").val();
    // if (selected===true) {
    //
    //     var ajaxconfig = {
    //         method: "POST",
    //         url: "api/Receipt.php",
    //         data: {
    //             action: "update",
    //             rid: resid,
    //             droppaid: patientid,
    //             droppid: presid,
    //             dropmid: mediid,
    //             txtUnitprice: unitprice,
    //             rqty: qty,
    //             txtdate: date
    //         },
    //         async: true
    //
    //     };
    //     $.ajax(ajaxconfig).done(function (response) {
    //         $("#tblReceipt tbody tr").remove();
    //         loadAllReceipt();
    //         $("#rid").val("");
    //         $("#txtUnitprice").val("");
    //         $("#rqty").val("");
    //         $("#txtdate").val("");
    //         $("#droppaid").val("");
    //         $("#droppid").val("");
    //         $("#dropmid").val("");
    //         $("#rid").focus();
    //         selected = false;
    //     })
    //
    // }else{


        var ajaxconfig = {
            method: "POST",
            url: "api/Receipt.php",
            data: {
                action: "save",
                rid: resid,
                droppaid: patientid,
                droppid: presid,
                dropmid: mediid,
                txtUnitprice: unitprice,
                rqty: qty,
                txtdate: date
            },
            async: true

        }
        $.ajax(ajaxconfig).done(function (response) {
            $("#tblReceipt tbody tr").remove();
            loadAllReceipt();
            $("#rid").val("");
            $("#txtUnitprice").val("");
            $("#rqty").val("");
            $("#txtdate").val("");
            $("#droppaid").val("");
            $("#droppid").val("");
            $("#dropmid").val("");
            $("#rid").focus();

        })
    //}
});


function loadAllReceipt() {


    var ajaxconfig = {
        method: "GET",
        url: "api/Receipt.php?action=all",
        async: true
    };

    $.ajax(ajaxconfig).done(function (response) {
        response.forEach(function (receipt) {
            // Total=(receipt.Qty*receipt.Unitprice);

            var html = "<tr>" +
                "<td>" + receipt.ReceiptID + "</td>" +
                "<td>" + receipt.PatientID + "</td>" +
                "<td>" + receipt.PID + "</td>" +
                "<td>" + receipt.MID + "</td>" +
                "<td>" + receipt.Unitprice + "</td>" +
                "<td>" + receipt.Qty + "</td>" +
                "<td>" + receipt.Date + "</td>" +
                "<td>" + (receipt.Qty* receipt.Unitprice) +"</td>"+
                '<td class="recycle"><i class="fa fa-2x fa-trash"></i></td>' +
                "</tr>";
            $("#tblReceipt tbody").append(html);

            $(".recycle").off();
            $(".recycle").click(function () {

                var Receiptid = ($(this).parents("tr").find("td:first-child").text());
                if (confirm("Are you sure that you want to delete?")) {
                    $.ajax({
                        method: "DELETE",
                        url: "api/Receipt.php?ReceiptID=" + Receiptid,
                        async: true
                    }).done(function (response) {
                        if (response) {
                            alert("Receipt has been successfully deleted");
                            $("#tblReceipt tbody tr").remove();
                            loadAllReceipt();
                        } else {
                            alert("Failed to delete the receipt");
                        }
                    });
                }

            });
        });
        $("#tblReceipt tbody tr").off();
        $("#tblReceipt tbody  tr").click(function (eventData) {
            $Receiptid = ($($(this).find("td").get(0)).text());
            $PatientID = ($($(this).find("td").get(1)).text());
            $Pid = ($($(this).find("td").get(2)).text());
            $Mid = ($($(this).find("td").get(3)).text());
            $Unitprice = ($($(this).find("td").get(4)).text());
            $Qty = ($($(this).find("td").get(5)).text());
            $date = ($($(this).find("td").get(6)).text());

            $("#rid").val($Receiptid);
            $("#droppaid").val($PatientID);
            $("#droppid").val($Pid);
            $("#dropmid").val($Mid);
            $("#txtUnitprice").val($Unitprice);
            $("#rqty").val($Qty);
            $("#txtdate").val($date);

            selected = true;
        });

    })
}
