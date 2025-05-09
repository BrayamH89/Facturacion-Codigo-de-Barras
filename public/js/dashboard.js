// $(document).ready(function () {
//     if ($.fn.DataTable.isDataTable('#tb_archivos')) {
//         $('#tb_archivos').DataTable().destroy();
//     }

//     $('#tb_archivos').DataTable({
//         scrollX: true,
//         language: {
//             url: 'https://cdn.datatables.net/plug-ins/2.1.3/i18n/es-ES.json',
//         }
//     });
// });

new DataTable('#tb_pdf', {
    scrollX: true,
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json",
        
    },
    columnDefs: [
        {orderable: false, targets:[3]}
    ],
});

new DataTable('#tb_usuers', {
    scrollX: true,
    language: {
        url: 'https://cdn.datatables.net/plug-ins/2.1.3/i18n/es-ES.json',
        
    },
    columnDefs: [
        {orderable: false, targets:[2]}
    ],
});