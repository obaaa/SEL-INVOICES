$.ajaxSetup({
  headers: {
    'X-CSRF-Token':  '{{ csrf_token() }}'
    }
});
//
$(document).on('click', '.paymentModal,.showModal', function () {
  //
  $('.showModalLabelTable').children().remove();

  var tr = $(this).parent().parent();
  //
  var invoice_id = tr.find('.invoice_id').val();
  var customer = tr.find('.customer').html();
  var invoice_no = tr.find('.invoice_no').html();
  var total_amount = tr.find('.total_amount').html();
  var amount_remain = tr.find('.amount_remain').html();
  var amount_recipient = tr.find('.amount_recipient').html();
  var user = tr.find('.user').val();
  var note = tr.find('.note').val();
  var value = tr.find('.value').val();
  var entry_date = tr.find('.entry_date').html();
  // console.log(value);
  $.ajax({
      type: 'get',
      url: '/get_item_invoice_invoice',
      dataType:'JSON',
      data: {invoice_id:   invoice_id},
      success: function (data){
        for (var i = 0; i < data.length; i++) {
          $('.showModalLabelTable').prepend('<tr>'+
                          '<td>'+data[i].item_name+'</td>'+
                          '<td>'+data[i].item_package+'</td>'+
                          '<td>'+data[i].quantity+'</td>'+
                          '<td>'+data[i].amount+'</td>'+
                          '<td>'+data[i].expir_date+'</td>'+
                          '</tr>');
        };
      }
  });
  // var value = eval(value)
  $('.invoice_id').val(invoice_id);
  $('.customerModal').html(customer);
  $('.invoice_idModal').html(invoice_id);
  $('.tootalModal').html(total_amount);
  $('.amount_remainModal').html(amount_remain);
  $('.amount_recipieModal').html(amount_recipient);
  $('.userModal').html(user);
  $('.noteModal').html(note);
  $('.entry_date').html(entry_date);
  //
  return false;
});
//
// $(document).on('click', '.buttonModal', function () {
//   var paymentModal = $('.paymentModal').val()-0;
//   $.ajax({
//       type: 'get',
//       url: '/payment_bill',
//       dataType:'JSON',
//       data: {name: paymentModal},
//       success: function (data){
//
//       }
//   });
// });

//
//
//
//
//
//
//
//
//
//
// //totalamount
// function totalamount(){
// 	var t =0;
// 	$('.amount').each(function(i,e)
// 	{
// 		var amt = $(this).val()-0;
// 		t +=amt;
// 	});
// 	$('.total').html(t);
// }
// //add row
// $(document).on('click', '.add-new', function () {
//     var item = $('.item').html();
//
//     var tr = '<tr><td><select class="form-control item" name="item_id[]">'+item+'</select></td>' +
//     '<td><select class="form-control item_packages" id="item_packages" name="item_package_id[]"></select></td>' +
//     '<td><input class="form-control quantity" type="number" name="quantity[]" value=""></td>' +
//     '<td><input class="form-control amount" type="number" name="amount[]" value=""></td>' +
//     '<td><input class="form-control" type="date" name="expir_date[]"></td>' +
//     '<td><a href="#" class="remove btn btn-xs btn-danger">delete</a></td></tr>';
//     $('.body').append(tr);
//     // $('.items').
//     // alert(tr);
//     // tableBody.append(tr);
//     return false;
// });
// // remove row
// $(document).on('click', '.remove', function () {
//     var row = $(this).parentsUntil('tr').parent();
//     row.remove();
//     totalamount();
//     return false;
// });
// //
// $(function(){
//   //hide remove row 1
//   var trFirst = $('.body tr:first');
//   trFirst.find('.remove').hide();
//   //get items by customer if chnge customer
//   $('.customer').change(function(){
//     var customer = $('.customer').val();
//     $('.item').children().remove();
//     $('.item_packages').children().remove();
//     // send ajax customer
//     $.ajax({
//         type: 'get',
//         url: '/get_items_customer',
//         dataType:'JSON',
//         data: {name: customer},
//         success: function (data){
//           for (var i = 0; i < data.length; i++) {
//             $('.item').prepend('<option id="' + data[i].id + '" class"item" value="' + data[i].id + '">' + data[i].name + '</option>');
//           };
//           $('.item').prepend('<option disabled selected>select</option>');
//         }
//     });//end ajax get_items_customer
//   });//end change .customer
//   //get item_packages by item if chnge item
//   $('.body').delegate('.item','change',function(){
//     var tr = $(this).parent().parent();
//     var item_id = tr.find('.item').val();
//     tr.find('.item_packages').children().remove();
//     // send ajax item_id
//     $.ajax({
//         type: 'get',
//         url: '/get_item_packages_item',
//         dataType:'JSON',
//         data: {id: item_id},
//         success: function (data){
//           for (var i = 0; i < data.length; i++) {
//             tr.find('.item_packages').prepend('<option id="' + data[i].id + '" class"item" value="' + data[i].id + '">' + data[i].name + '</option>');
//           };
//           tr.find('.item_packages').prepend('<option disabled selected>select</option>');
//         }
//     });//end ajax get_items_customer
//   });//end change .item
//   //change .quantity .amount
//   $('.body').delegate('.quantity,.amount','keyup',function(){
//     var tr = $(this).parent().parent();
//     var quantity = tr.find('.quantity').val()-0;
//     var amount = tr.find('.amount').val()-0;
//     var total = quantity * amount;
//     totalamount()
//   });
//
// });//end function
