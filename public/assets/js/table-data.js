/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************************!*\
  !*** ./resources/assets/js/table-data.js ***!
  \*******************************************/
$(function (e) {
  //______Basic Data Table
  $('#basic-datatable').DataTable({
    language: {
      searchPlaceholder: 'Search...',
      sSearch: ''
    }
  }); //______Input fields Data Table

  $('#input-fields').DataTable({
    language: {
      searchPlaceholder: 'Search...',
      sSearch: ''
    }
  }); //______Basic Data Table

  $('#responsive-datatable').DataTable({
    order: [[0, 'desc']], // Specifies the first column (index 0) in descending order

    responsive: true,
    language: {
      searchPlaceholder: 'Search...',
      sSearch: ''
    }
  }); //______File-Export Data Table

  var table = $('#file-datatable').DataTable({
    order: [[0, 'desc']], // Ensure the correct column index is used
    columnDefs: [
        { type: 'num', targets: 0 } // Set column 0 to be treated as numeric data
    ],
    buttons: ['copy', 'excel', 'pdf', 'colvis'],
    responsive: true,
    language: {
        searchPlaceholder: 'Search...',
        sSearch: ''
    }
});


  table.buttons().container().appendTo('#file-datatable_wrapper .col-md-6:eq(0)'); //______Delete Data Table

  var table = $('#delete-datatable').DataTable({
    language: {
      searchPlaceholder: 'Search...',
      sSearch: ''
    }
  });
  $('#delete-datatable tbody').on('click', 'tr', function () {
    if ($(this).hasClass('selected')) {
      $(this).removeClass('selected');
    } else {
      table.$('tr.selected').removeClass('selected');
      $(this).addClass('selected');
    }
  });
  $('#button').click(function () {
    table.row('.selected').remove().draw(false);
  }); //______Select2 

  $('.select2').select2({
    minimumResultsForSearch: Infinity,
    width: "auto"
  });
});
/******/ })()
;