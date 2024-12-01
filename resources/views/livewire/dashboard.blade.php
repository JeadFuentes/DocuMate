<div>
    <section style=" width:90%; margin-left: 10%">
        <h5 class="my-3">DocuMate | DASHBOARD</h3>
        <div class="content">
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card mb-3 h-100">
                        <div class="card-header bg-primary text-white"><b>Total Applications</b></div>
                        <div class="card-body bg-body-secondary">
                            <div class="container">
                                <div class="row">
                                  <div class="col-sm pt-4">
                                    <h2 class="card-title"><b>{{$this->totalApp}}</b></h2>
                                    <p class="card-text">Total applications processed.</p>
                                  </div>
                                  <div class="col-sm text-center">
                                    <h1 style="font-size: 8em"><i class="fa-solid fa-calculator"></i></h1>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3 h-100">
                        <div class="card-header text-white bg-warning"><b>Pending for Proccessing</b></div>
                        <div class="card-body bg-body-secondary">
                            <div class="container">
                                <div class="row">
                                  <div class="col-sm pt-4">
                                    <h2 class="card-title"><b>{{$this->pendingApp}}</b></h2>
                                    <p class="card-text">Applications awaiting approval.</p>
                                  </div>
                                  <div class="col-sm text-center">
                                    <h1 style="font-size: 8em"><i class="fa-solid fa-clock-rotate-left"></i></i></h1>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb- h-100">
                        <div class="card-header text-white bg-success"><b>For Payment Applications</b></div>
                        <div class="card-body bg-body-secondary">
                            <div class="container">
                                <div class="row">
                                  <div class="col-sm pt-4">
                                    <h2 class="card-title"><b>{{$this->paymentApp}}</b></h5>
                                    <p class="card-text">Successfully processed but not Payed applications.</p>
                                  </div>
                                  <div class="col-sm text-center">
                                    <h1 style="font-size: 8em"><i class="fa-solid fa-clock-rotate-left"></i></i></h1>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <h4 class="mt-5">Applications</h4>
            <table class="table">
                <input id="searchTxt" class="form-control mb-3" type="text" placeholder="search">
                <thead>
                    <tr class="text-center">
                        <th style="cursor: pointer" wire:click="sortingBy('id')">ID &ensp; @include('partials.sort-icon',['field'=>'id'])</th>
                        <th style="cursor: pointer" wire:click="sortingBy('typeofapplication')">Type of Application &ensp; @include('partials.sort-icon',['field'=>'typeofapplication'])</th>
                        <th style="cursor: pointer" wire:click="sortingBy('typeofbussiness')">Type of Bussiness &ensp; @include('partials.sort-icon',['field'=>'typeofbussiness'])</th>
                        <th style="cursor: pointer" wire:click="sortingBy('tradename')">Trade Name &ensp; @include('partials.sort-icon',['field'=>'tradename'])</th>
                        <th style="cursor: pointer" wire:click="sortingBy('status')">Status &ensp; @include('partials.sort-icon',['field'=>'status'])</th>
                        <th>
                            @if (Auth::user()->usertype == 'Staff')
                            @else
                                Action
                            @endif
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($pendingApplication)
                        @foreach ($pendingApplication as $pendingApp)
                            <tr class="text-center">
                                <td>{{$pendingApp->id}}</td>
                                <td>{{$pendingApp->typeofapplication}}</td>
                                <td>{{$pendingApp->typeofbussiness}}</td>
                                <td>{{$pendingApp->tradename}}</td>
                                <td>{{$pendingApp->status}}</td>
                                <td>
                                    @if (Auth::user()->usertype == 'Staff')
                                    @else
                                        @if ($pendingApp->status == 'For Payment')
                                            <button wire:click="payApplication({{$pendingApp->id}})" type="button" class="btn btn-success btn-sm">Pay Now</button>
                                        @endif
                                        <button wire:click="deleteApplication({{$pendingApp->id}})" type="button" class="btn btn-danger btn-sm">Delete</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div class="row mt-2 mb-2">
                <div class="col">
                    <p class="d-inline px-3 text" style="font-size: 15px;">Per Page:</p>
                    <select wire:model="perPage" wire:change='perPages()' class="rounded d-inline px-3 w-8">
                        <option>2</option>
                        <option>5</option>
                        <option>10</option>
                        <option>15</option>
                        <option>20</option>
                        <option>25</option>
                    </select>
                </div>
                <div class="col">
                    {{$pendingApplication->links()}}
                </div>
            </div>
        </div>
    </section>
</div>
@script
<script>
    $(document).ready(function(){
      $('#searchTxt').on('keyup',function(){
        @this.search = $(this).val();
        @this.call('perPages');
      })
    });
</script>
@endscript