$(document).ready(loadAllMedicine);



var selected = false;



$("#btnsaveMedi").click(function () {
    var mediid=$("#mid").val();
    var mdes= $("#mdes").val();
    var mqty=$("#mqty").val();
    var approve=$("#txtapprove").val();
console.log("clicked");
    if(selected===true){
        var ajaxMedicine={

            method : "POST",
            url : "api/Medicine.php",
            data:{
                action:"update",
                mid:mediid,
                mdes:mdes,
                mqty:mqty,
                txtapprove:approve
            },
            async : true

        };

        $.ajax(ajaxMedicine).done(function () {
            $("#tblMedicine tbody tr").remove();
            loadAllMedicine();
            $("#mid").val("");
            $("#mdes").val("");
            $("#mqty").val("");
            $("#txtapprove:selected").text();
            $("#mid").focus();
            selected=false;

        });
    }else{

        var ajaxMedicine={

            method : "POST",
            url : "api/Medicine.php",
            data:{
                action:"save",
                mid:mediid,
                mdes:mdes,
                mqty:mqty,
                txtapprove:approve
            },
            async : true

        };

        $.ajax(ajaxMedicine).done(function () {
            $("#tblMedicine tbody tr").remove();
            loadAllMedicine();
            $("#mid").val("");
            $("#mdes").val("");
            $("#mqty").val("");
            $("#txtapprove:selected").text();
            $("#mid").focus();

        });
    }





});


function loadAllMedicine() {

    var ajaxConfig = {
        method: "GET",
        url: "api/Medicine.php?action=all",
        async: true
    };

    $.ajax(ajaxConfig).done(function (response) {
        response.forEach(function (medicine) {

            var html = "<tr>" +
                "<td>" + medicine.MID + "</td>" +
                "<td>" + medicine.Description + "</td>" +
                "<td>" + medicine.Qty + "</td>" +
                "<td>" + medicine.Approval + "</td>" +
                '<td class="recycle"><i class="fa fa-2x fa-trash"></i></td>' +
                "</tr>";

            $("#tblMedicine tbody").append(html);


            $(".recycle").off();
            $(".recycle").click(function () {

                var MedicineID = ($(this).parents("tr").find("td:first-child").text());

                if (confirm("Are you sure that you want to delete?")) {

                    $.ajax({
                        method: "DELETE",
                        url: "api/Medicine.php?MID=" + MedicineID,
                        async: true
                    }).done(function (response) {
                        if (response) {
                            alert("Medicine has been successfully deleted");
                            $("#tblMedicine tbody tr").remove();
                            loadAllMedicine();
                        } else {
                            alert("Failed to delete the Medicine");
                        }
                    });

                }

            });
        });
        $("#tblMedicine tbody tr").off();
        $("#tblMedicine tbody  tr").click(function (eventData) {


            $MedicineID = ($($(this).find("td").get(0)).text());
            $Description = ($($(this).find("td").get(1)).text());
            $Qty = ($($(this).find("td").get(2)).text());
            $Approval = ($($(this).find("td").get(3)).text());

            $("#mid").val($MedicineID);
            $("#mdes").val($Description);
            $("#mqty").val($Qty);
            $("#txtapprove :selected").text($Approval);


            selected = true;


        });
    });

}