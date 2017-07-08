$.ajaxSetup({
  headers: {
    'X-CSRF-Token':  '{{ csrf_token() }}'
    }
});
//totalamount
function totalamount(){
	var t =0;
	$('.amount').each(function(i,e)
	{
		var amt = $(this).val()-0;
		t +=amt;
	});
	$('.total').html(t);
}
//add row
$(document).on('click', '.add-new', function () {
    var item = $('.item').html();

    var tr = '<tr><td><select class="form-control item" name="item_id[]">'+item+'</select></td>' +
    '<td><select class="form-control item_packages" id="item_packages" name="item_package_id[]"></select></td>' +
    '<td><input class="form-control quantity" type="number" name="quantity[]" value=""></td>' +
    '<td><input class="form-control amount" type="number" name="amount[]" value=""></td>' +
    '<td><input class="form-control" type="date" name="expir_date[]"></td>' +
    '<td><a href="#" class="remove btn btn-xs btn-danger">delete</a></td></tr>';
    $('.body').append(tr);
    // $('.items').
    // alert(tr);
    // tableBody.append(tr);
    return false;
});
// remove row
$(document).on('click', '.remove', function () {
    var row = $(this).parentsUntil('tr').parent();
    row.remove();
    totalamount();
    return false;
});
//
$(function(){
  //hide remove row 1
  var trFirst = $('.body tr:first');
  trFirst.find('.remove').hide();
  //get items by supplier if chnge supplier
  $('.supplier').change(function(){
    var supplier = $('.supplier').val();
    $('.item').children().remove();
    $('.item_packages').children().remove();
    // send ajax supplier
    $.ajax({
        type: 'get',
        url: '/get_items_supplier',
        dataType:'JSON',
        data: {name: supplier},
        success: function (data){
          for (var i = 0; i < data.length; i++) {
            $('.item').prepend('<option id="' + data[i].id + '" class"item" value="' + data[i].id + '">' + data[i].name + '</option>');
          };
          $('.item').prepend('<option disabled selected>select</option>');
        }
    });//end ajax get_items_supplier
  });//end change .supplier
  //get item_packages by item if chnge item
  $('.body').delegate('.item','change',function(){
    var tr = $(this).parent().parent();
    var item_id = tr.find('.item').val();
    tr.find('.item_packages').children().remove();
    // send ajax item_id
    $.ajax({
        type: 'get',
        url: '/get_item_packages_item',
        dataType:'JSON',
        data: {id: item_id},
        success: function (data){
          for (var i = 0; i < data.length; i++) {
            tr.find('.item_packages').prepend('<option id="' + data[i].id + '" class"item" value="' + data[i].id + '">' + data[i].name + '</option>');
          };
          tr.find('.item_packages').prepend('<option disabled selected>select</option>');
        }
    });//end ajax get_items_supplier
  });//end change .item
  //change .quantity .amount
  $('.body').delegate('.quantity,.amount','keyup',function(){
    var tr = $(this).parent().parent();
    var quantity = tr.find('.quantity').val()-0;
    var amount = tr.find('.amount').val()-0;
    var total = quantity * amount;
    totalamount()
  });

});//end function
