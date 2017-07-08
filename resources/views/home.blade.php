@extends('layouts.app')

@section('content')
        <div class="col-md-12">


                  <section class="content-header row">
                    <!-- You can dynamically generate breadcrumbs here -->
                    <div class="col-md-10">
                      <ol class="breadcrumb">
                        <li class="active"><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                      </ol>
                    </div>
                    <div class="col-md-2 page-action text-right">
                      <a href="{{ route('bills.create') }}" class="btn btn-primary btn-sm"> purchase </a>
                      <a href="{{ route('invoices.create') }}" class="btn btn-info btn-sm"> sell </a>
                    </div>
                  </section>

            {{-- Items --}}
            <div class="col-xs-4 col-md-2 col-lg-2 col-sm-4">
              <a href="{{ route('items.index') }}" class="">
              <div class="caption text-center thumbnail"><span class="badge pull-right">{{ \App\Item::all()->count() }}</span><br>
                <h5><i class="fa fa-cubes fa-3x" aria-hidden="true"></i></h5>
                <hr>
                <h5><b>Items</b></h5>
              </div>
            </a>
            </div>
            {{-- Suppliers --}}
            <div class="col-xs-4 col-md-2 col-lg-2 col-sm-4">
              <a href="{{ route('suppliers.index') }}" class="">
              <div class="caption text-center thumbnail"><span class="badge pull-right">{{ \App\Supplier::all()->count() }}</span><br>
                <h5><i class="fa fa-truck fa-3x" aria-hidden="true"></i></h5>
                <hr>
                <h5><b>Suppliers</b></h5>
              </div>
            </a>
            </div>
            {{-- Bills --}}
            <div class="col-xs-4 col-md-2 col-lg-2 col-sm-4">
              <a href="{{ route('bills.index') }}" class="">
              <div class="caption text-center thumbnail"><span class="badge pull-right">{{ \App\Bill::all()->count() }}</span><br>
                <h5><i class="fa fa-file-text-o fa-3x" aria-hidden="true"></i></h5>
                <hr>
                <h5><b>Bills</b></h5>
              </div>
            </a>
            </div>
            {{-- Customers --}}
            <div class="col-xs-4 col-md-2 col-lg-2 col-sm-4">
              <a href="{{ route('customers.index') }}" class="">
              <div class="caption text-center thumbnail"><span class="badge pull-right">{{ \App\Customer::all()->count() }}</span><br>
                <h5><i class="fa fa-user fa-3x" aria-hidden="true"></i></h5>
                <hr>
                <h5><b>Customers</b></h5>
              </div>
            </a>
            </div>
            {{-- Invoic2s--}}
            <div class="col-xs-4 col-md-2 col-lg-2 col-sm-4">
              <a href="{{ route('invoices.index') }}" class="">
              <div class="caption text-center thumbnail"><span class="badge pull-right">{{ \App\Invoice::all()->count() }}</span><br>
                <h5><i class="fa fa-file-text fa-3x" aria-hidden="true"></i></h5>
                <hr>
                <h5><b>Invoices</b></h5>
              </div>
            </a>
            </div>
            {{-- Expenses --}}
            <div class="col-xs-4 col-md-2 col-lg-2 col-sm-4">
              <a href="{{ route('expenses.index') }}" class="">
              <div class="caption text-center thumbnail"><br>
                <h5><i class="fa fa-money fa-3x" aria-hidden="true"></i></h5>
                <hr>
                <h5><b>Expenses</b></h5>
              </div>
            </a>
            </div>
    </div>
    <div class="col-md-12">
      <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-6 col-sm-12">
          <div class="caption text-center thumbnail">
            {!! $chart_income->render() !!}
          </div>
        </div>

        <div class="col-xs-12 col-md-6 col-lg-6 col-sm-12">
          <div class="caption text-center thumbnail">
            {!! $chart_item->render() !!}
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-6 col-sm-12">
          <div class="caption text-center thumbnail">
            {!! $chart_expense->render() !!}
          </div>
        </div>

        <div class="col-xs-12 col-md-6 col-lg-6 col-sm-12">
          <div class="caption text-center thumbnail">
            {!! $chart_customer->render() !!}
          </div>
        </div>

      </div>

    </div>
@push('scripts')

@endpush
@endsection
