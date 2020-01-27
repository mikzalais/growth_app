/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import '../css/app.css';
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap-table/dist/bootstrap-table.min.css'

const $ = require('jquery');
require('bootstrap');
require('bootstrap-table');

// require('es.object.values');

$(function() {

  $("#product-form").on("submit", function (e) {
    e.preventDefault();

    var product_name = $('#form_product_product_name').val();
    var product_id = $('#form_product_product_id').val();
    var product_manager = $('#form_product_product_manager').val();
    var sales_start_data = $('#form_product_sales_start_data').val();
    var data = {
      'product_name': product_name,
      'product_id': product_id,
      'product_manager': product_manager,
      'sales_start_data': sales_start_data,
    };

    $.post("/data/store", data)
      .done(function (data) {
        console.log(data.status);
        if (data.status == 'success') {
          alert('Product was saved');
        }
        else {
          alert('Error saving product');
        }
      });
  });

  var pathname = window.location.pathname;
  console.log(pathname);
  if (pathname == '/sales') {
    $.getJSON( "/data/load", function( loaded_data ) {

      var loaded_columns = Object.values(loaded_data.column);

      var columns = [];
      columns[0] = {
        'field' : loaded_columns[0].field,
        'title' : loaded_columns[0].header,
        'sortable' : true
      };
      columns[1] = {
        'field' : loaded_columns[1].field,
        'title' : loaded_columns[1].header,
        'sortable' : true
      };
      columns[2] = {
        'field' : loaded_columns[2].subHeaders[0].field,
        'title' : loaded_columns[2].subHeaders[0].header,
        'sortable' : true
      };
      columns[3] = {
        'field' : loaded_columns[2].subHeaders[1].field,
        'title' : loaded_columns[2].subHeaders[1].header,
        'sortable' : true
      };
      columns[4] = {
        'field' : loaded_columns[2].subHeaders[2].field,
        'title' : loaded_columns[2].subHeaders[2].header,
        'sortable' : true
      };
      columns[5] = {
        'field' : loaded_columns[2].subHeaders[3].field,
        'title' : loaded_columns[2].subHeaders[3].header,
        'sortable' : true
      };
      columns[6] = {
        'field' : 'totalSales',
        'title' : loaded_columns[3].header,
        'sortable' : true
      };
      console.log(columns);

      var data = Object.values(loaded_data.data);
      console.log(data);

      for (let [key, value] of Object.entries(data)) {
        data[key].totalSales = data[key].salesQ1 + data[key].salesQ2 + data[key].salesQ3 + data[key].salesQ4;
      }

      var sales_table = {
        columns,
        data
      };

      $('#table').bootstrapTable(sales_table);

    });
  }

});

