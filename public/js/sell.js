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
    var tr = '<tr><td>'+
    '<input list="item"  required="true" name="item[]" class="form-control border-input item">'+
    '<datalist id="item" name="item">'+
      '@foreach ($items as $item)'+
      '<option  value="{{$item->name}}">'+
      '@endforeach'+
    '</datalist>'+
    '<td><select class="form-control item_packages" id="item_packages" name="item_package_id[]"></select></td>'+
    '<td><input class="form-control price" type="number" disabled name="price[]" value=""></td>'+
    '<td><input class="form-control quantity"  type="number" name="quantity[]" value=""></td>' +
    '<td><input class="form-control amount" disabled type="number" name="amount[]" value=""></td>' +
    '<td><a href="#" class="remove btn btn-xs btn-danger">delete</a></td></tr>';
    $('.body').append(tr);
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
  var trFirst = $('.body tr:first'); trFirst.find('.remove').hide();

// ===================+++++++++++++++++++++++++++++++++++++++++++++===========================++++++++++========
  //get item_packages by item if chnge item
  $('.body').delegate('.item','change',function(){
    var tr = $(this).parent().parent(); var item_id = tr.find('.item').val();
    tr.find('.item_packages').children().remove(); tr.find('.quantity').val(1);

    // get_item_price_item
    $.ajax({type: 'get', url: '/get_item_price_item', dataType:'JSON', data: {id: item_id}, success: function (data){
      tr.find('.price').val(data);
      tr.find('.amount').val(data);
      totalamount()
    }});//end ajax get_item_price

    // send ajax get_item_packages_item
    $.ajax({type: 'get', url: '/get_item_packages_item', dataType:'JSON', data: {id: item_id}, success: function (data){
          for (var i = 0; i < data.length; i++) {
            tr.find('.item_packages').prepend('<option id="' + data[i].id + '"  value="' + data[i].id + '">' + data[i].name + '</option>');
            if (data[i].id = 1) { tr.find('.item_packages').attr("selected","true"); }
          };}});//end ajax get_items_customer
  });//end change .item
// ++++++++++++++++++++++++++++++++++++++++++++++++===================================+++++++++++++++++++++===============
  //get item_packages by item if chnge item
  $('.body').delegate('.item_packages','change',function(){
      var tr = $(this).parent().parent();
      var item_package_id = tr.find('.item_packages').val();

      // get_item_price
      $.ajax({type: 'get', url: '/get_item_price', dataType:'JSON', data: {id: item_package_id}, success: function (data){
        tr.find('.price').val(data);
        tr.find('.amount').val(data);
        totalamount()
      }});//end ajax get_item_price


  });//end change .item_packages
// ++++++++++++++++++++++++++++++++++++++++++++++++===================================+++++++++++++++++++++===============
  $('.body').delegate('.quantity','keyup',function(){
    var tr = $(this).parent().parent();
    var quantity = tr.find('.quantity').val()-0;
    var price = tr.find('.price').val()-0;
    var total = quantity * price;
    tr.find('.amount').val(total);
    totalamount()
  });
});//end function
