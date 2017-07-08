<br>
<div class="list-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
  <a href="{{ url('suppliers/'.$item->supplier->id) }}" class="list-group-item">Supplier:  [<b>{{ $item->supplier->name }}</b>]<span class="badge"><i class="glyphicon glyphicon-new-window"></i></span></a>
  <a href="#" class="list-group-item"><span class="badge">{{ $item->quantity }}</span>Quantity in stock</a>
  <a href="#" class="list-group-item">Price:  <span class="pull-right">(<b>{{ $item->price }}</b>)SDG</span></a>
  <a href="#" class="list-group-item">Categorie: <span class="pull-right">[<b>{{ $item->item_categorie->name }}</b>]<i class="glyphicon glyphicon-bookmark"></i></span></a>
  <a href="#" class="list-group-item">Attribute: <span class="pull-right">[<b>{{ $item->item_attribute->name }}</b>]<i class="glyphicon glyphicon-tag"></i></span></a>
  <a href="#" class="list-group-item">Expiry date: <span class="pull-right">[<b>00-00-0000</b>]<i class="glyphicon glyphicon-ban-circle"></i></span></a>
</div>
