$(document).ready(function () {
    loadAllPres();
    var patientajaxconfig={
        method:"GET",
        url:"api/Patient.php?action=all",
        async:true
    };
    $.ajax(patientajaxconfig).done(function (response) {
        console.log(response);
        response.forEach(function (patientId) {
            var patient="<option>"+patientId.PatientID+"</option>"
            $("#droppatientid").append(patient);
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
});
var selected = false;



$("#savepres").click(function () {
    var presid=$("#txtpresid").val();
    var patientid=$("#droppatientid").val();
    var date=$("#presdate").val();
    var docname=$("#txtdocname").val();
    var presid=$("#txtpresid").val();
    var mid=$("#dropmid").val();
    var ajaxconfig={
       method:"POST",
       url:"api/Prescription.php",
        data:{
            action:"save",
            txtpresid:presid,
            droppatientid:patientid,
            presdate:date
        },
        async : true

    };
    $.ajax(ajaxconfig).done(function (response) {




        var ajaxconfig={
            method:"POST",
            url:"api/PrescriptionDetail.php",
            data:{
                action:"save",
                txtdocname:docname,
                droppatientid:presid,
                dropmid:mid
            },
            async : true
        }
        $.ajax(ajaxconfig).done(function (response) {
            $("#tblPrescription tbody tr").remove();
            loadAllPres();
            $("#txtpresid").val("");
            $("#droppatientid").val("");
            $("#txtpresid").focus();
            $("#presdate").val("");
            $("#txtdocname").val("");
            $("#dropmid").val("");


        });


    });

});

$("#droppatientid").change(function () {

});

$("#dropmid").change(function () {

});

function loadAllPres() {
    var ajaxconfig = {
        method: "GET",
        url: "api/Prescription.php?action=all",
        async: true
    };

    $.ajax(ajaxconfig).done(function (response) {
        response.forEach(function (pres) {
            console.log(response);
            var html = "<tr>" +
                "<td>" + pres.PID + "</td>" +
                "<td>" + pres.PatientID + "</td>" +
                "<td>" + pres.Date + "</td>" +
                '<td class="recycle"><i class="fa fa-2x fa-trash"></i></td>' +
                "</tr>";
            $("#tblPrescription tbody").append(html);

            $(".recycle").off();
            $(".recycle").click(function () {
                var Pid = ($(this).parents("tr").find("td:first-child").text());
                var MID = $("#dropmid").val();
                if (confirm("Are you sure that you want to delete?")) {
                    $.ajax({
                        method: "DELETE",
                        url: "api/Prescription.php?PID=" + Pid,
                        async: true
                    }).done(function (response) {
                        if (response) {
                            alert("Prescription has been successfully deleted");
                            $("#tblPrescription tbody tr").remove();
                            loadAllPres();
                        } else {
                            alert("Failed to delete the Prescription");
                        }
                    });
                }
                if (confirm("Are you sure that you want to delete?")) {
                    $.ajax({
                        method: "DELETE",
                        url: "api/PrescriptionDetail.php?PID=" + Pid + "&MID=" + MID,
                        async: true
                    }).done(function (response) {
                        if (response) {
                            alert("PrescriptionDetail has been successfully deleted");
                        } else {
                            alert("Failed to delete the PrescriptionDetail");
                        }
                    });
                }

            });
        });
        $("#tblPrescription tbody tr").off();
        $("#tblPrescription tbody  tr").click(function (eventData) {
            $Presid = ($($(this).find("td").get(0)).text());
            $PatientID = ($($(this).find("td").get(1)).text());
            $Date = ($($(this).find("td").get(2)).text());

            $("#txtpresid").val($Presid);
            $("#droppatientid").val($PatientID);
            $("#presdate").val($Date);

            selected = true;
        });

    })
}
