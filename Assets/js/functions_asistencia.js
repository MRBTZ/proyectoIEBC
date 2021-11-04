let tableAsistencia;
let divLoading = document.querySelector("#divLoading");


$(document).ready(function() {
    $('#tableAsistencia').DataTable( {
    	"aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
		},
        "ajax":{
            "url": " "+base_url+"/Asistencia/getAsistencia",/*:P*/
            "dataSrc":""
		},
        "columns": [
            {"data":"nombres"},
			{"data":"apellidos"},
			{"data":"codigoid"},
			{"data":"entrada"},
			{"data":"salida"},
			{"data":"fecha"},
			{"data":"status"}
        ],
								'dom': 'lBfrtip',
								'buttons': [
									{
										"extend": "excelHtml5",
										"text": "<i class='fas fa-file-excel'></i> Excel",
										"titleAttr":"Esportar a Excel",
										"className": "btn btn-success"
										},{
										"extend": "pdfHtml5",
										"text": "<i class='fas fa-file-pdf'></i> PDF",
										"titleAttr":"Esportar a PDF",
										"className": "btn btn-danger"
									}
								],
								"resonsieve":"true",
								"bDestroy": true,
								"iDisplayLength": 10,
								"order":[[0,"asc"]]  
    } );
} );
							