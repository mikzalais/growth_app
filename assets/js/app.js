/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import '../css/app.css';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';

const $ = require('jquery');

$("form").on("submit", function(e) {
  e.preventDefault();

  var product_name = $('#form_product_product_name').val();
  var product_id = $('#form_product_product_id').val();
  var product_manager = $('#form_product_product_manager').val();
  var sales_start_data = $('#form_product_sales_start_data').val();
  var data = {
    'product_name' : product_name,
    'product_id' : product_id,
    'product_manager' : product_manager,
    'sales_start_data' : sales_start_data,
  };

  $.post("/data/store", data)
    .done(function(data) {
      console.log(data.status);
      if (data.status == 'success') {
        alert('Product was saved');
      } else {
        alert('Error saving product');
      }
    });
});
