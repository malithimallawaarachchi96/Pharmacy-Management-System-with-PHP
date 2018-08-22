$(document).ready(loadAllPatients);

var selected = false;

$("#savebtn").click(function () {
    var patientid= $("#txtpid").val();
    var address= $("#txtpaddress").val();
    var name= $("#txtpname").val();
    if(selected===true){

       // console.log("update ekata aava.");
        var ajaxPatient= {

            method: "POST",
            url: "api/Patient.php",
            data: {
                action:"update",
                txtpid:patientid,
                txtpaddress:address,
                txtpname:name

            },
            async: true

        };
        $.ajax(ajaxPatient).done(function (response) {
            $("#tblPatient tbody tr").remove();
            loadAllPatients();
            $("#txtpid").val("");
            $("#txtpaddress").val("");
            $("#txtpname").val("");
            $("#txtpid").focus();
            selected = false;
        })

    }else{

        var ajaxPatient={

            method : "POST",
            url : "api/Patient.php",
            data: {
                action:"save",
                txtpid:patientid,
                txtpaddress:address,
                txtpname:name

            },
            async : true

        }

        $.ajax(ajaxPatient).done(function (response) {

            console.log(response);

            $("#tblPatient tbody tr").remove();
            loadAllPatients();
            $("#txtpid").val("");
            $("#txtpaddress").val("");
            $("#txtpname").val("");
            $("#txtpid").focus();

        })
    }



});

function loadAllPatients() {

    var ajaxConfig={
        method: "GET",
        url:"api/Patient.php?action=all",
        async: true
    };
    $.ajax(ajaxConfig).done(function (response) {
        response.forEach(function (patient) {

            var html="<tr>"+
                "<td>"+patient.PatientID+"</td>"+
                "<td>"+patient.Address+"</td>"+
                "<td>"+patient.Name+"</td>"+
                '<td class="recycle"><i class="fa fa-2x fa-trash"></i></td>' +
                "</tr>";
            $("#tblPatient tbody").append(html);


            $(".recycle").off();
            $(".recycle").click(function () {
                var PatientID = ($(this).parents("tr").find("td:first-child").text());

                if (confirm("Are you sure that you want to delete?")) {
                $.ajax({
                    method:"DELETE",
                    url:"api/Patient.php?PatientID="+PatientID,
                    async:true
                }).done(function(response){
                    if (response){
                        alert("Patient has been successfully deleted");
                        $("#tblPatient tbody tr").remove();
                        loadAllPatients();
                    } else{
                        alert("Failed to delete the Patient");
                    }
                });
                }
                
            });

        });
        $("#tblPatient tbody tr").off();
        $("#tblPatient tbody  tr").click(function (eventData) {
            $PatientID = ($($(this).find("td").get(0)).text());
            $Address = ($($(this).find("td").get(1)).text());
            $Name = ($($(this).find("td").get(2)).text());

            $("#txtpid").val($PatientID);
            $("#txtpaddress").val($Address);
            $("#txtpname").val($Name);

           selected = true;

        });
    });
}