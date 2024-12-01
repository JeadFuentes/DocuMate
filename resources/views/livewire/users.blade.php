<div class="container-sm">
    <div class="container my-4">
        <div class="row">
          <div class="col-sm">
            <button type="button" class="btn btn-primary w-50" wire:click="addNew">New user</button>
          </div>
          <div class="col-sm">
            <input id="searchTxt" class="form-control mb-3" type="text" placeholder="search">
          </div>
        </div>
    </div>
    <table class="ml-3 table table-striped table-hover" style="width: 100%">
      <thead class="text-center">
        <tr>
          <th style="cursor: pointer" wire:click="sortingBy('id')" scope="col">ID &ensp; @include('partials.sort-icon',['field'=>'id'])</th>
          <th style="cursor: pointer" wire:click="sortingBy('name')" scope="col">Name &ensp; @include('partials.sort-icon',['field'=>'name'])</th>
          <th style="cursor: pointer" wire:click="sortingBy('address')" scope="col">Address &ensp; @include('partials.sort-icon',['field'=>'address'])</th>
          <th style="cursor: pointer" wire:click="sortingBy('usertype')" scope="col">Usertype &ensp; @include('partials.sort-icon',['field'=>'usertype'])</th>
          <th style="cursor: pointer" wire:click="sortingBy('email')" scope="col">Username &ensp; @include('partials.sort-icon',['field'=>'email'])</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody class="table-group-divider text-center">
          @if (Auth::user()->usertype == 'Administrator')
              @foreach ($userLists as $user)
              <tr>
                  <th scope="row">{{$user['id']}}</th>
                  <td>{{$user['name']}}</td>
                  <td>{{$user['address']}}</td>
                  <td>{{$user['usertype']}}</td>
                  <td>{{$user['email']}}</td>
                  <td>
                      <button wire:click="openEdit({{$user['id']}})" type="button" class="btn btn-sm btn-success">Edit</button>
                      <button wire:click="openResetPassword({{$user['id']}})" type="button" class="btn btn-sm btn-success">Reset Password</button>
                      <!--<button wire:click="openDelete({{$user['id']}})" type="button" class="btn btn-sm btn-danger">Delete</button>-->
                  </td>
              </tr>
              @endforeach
          @else
              @foreach ($userLists as $user)
                  @if (Auth::user()->id == $user['id'])
                  <tr>
                      <th scope="row">{{$user['id']}}</th>
                      <td>{{$user['name']}}</td>
                      <td>{{$user['address']}}</td>
                      <td>{{$user['usertype']}}</td>
                      <td>{{$user['email']}}</td>
                      <td>
                          <button wire:click="openEdit({{$user['id']}})" type="button" class="btn btn-sm btn-success">Edit</button>
                          <button wire:click="openResetPassword({{$user['id']}})" type="button" class="btn btn-sm btn-success">Change Password</button>
                          <!--<button wire:click="openDelete({{$user['id']}})" type="button" class="btn btn-sm btn-danger">Delete</button>-->
                      </td>
                  </tr>
                  @endif
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
            {{$userLists->links()}}
        </div>
    </div>
    <!--modals-->  
  <!--edit modal-->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="editModalLabel">EDIT USER</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form wire:submit="updateUser">
              <div>
                <x-input-label for="name" class="form-label" :value="__('Name')" />
                <x-text-input wire:model="name" id="name" class="form-control" type="text" name="name" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
    
            <!-- Birthday -->
            <div class="mt-4 text-black">
                <x-input-label for="birthday" class="form-label" :value="__('Birthday')" />
                <x-text-input wire:model="birthday" id="birthday" class="form-control" type="date" name="birthday" required autofocus autocomplete="birthday" />
                <x-input-error :messages="$errors->get('birthday')" class="mt-2" />
            </div>
    
            <!-- Sex -->
            <div class="mt-4 text-black">
                <x-input-label for="sex" class="form-label" :value="__('Sex')" />
                <div class="block mt-1 w-full">
                    <select wire:model="sex" class="form-control">
                        <option value="none" selected>None</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <x-input-error :messages="$errors->get('sex')" class="mt-2" />
                </div>
            </div>
    
            <!-- Address -->
            <div class="mt-4 text-black">
                <x-input-label for="address" class="form-label" :value="__('Address')" />
                <x-text-input wire:model="address" id="address" class="form-control" type="text" name="address" required autofocus autocomplete="address" />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>
    
            <!-- Usertype -->
            <div class="mt-4 text-black">
                <x-input-label for="usertype" class="form-label" :value="__('User Type')" />
                <div class="block mt-1 w-full">
                    <select wire:model="usertype" class="form-control">
                        <option value="none" selected>None</option>
                        @if (Auth::user())
                            @if (Auth::user()->usertype == "Administrator")
                                <option value="Customer">Customer</option>
                                <option value="Staff">Staff</option>
                                <option value="Admistrator">Administrator</option>
                            @else
                                <option value="Customer">Customer</option>
                            @endif
                         @else
                            <option value="Customer">Customer</option>
                        @endif
                    </select>
                    <x-input-error :messages="$errors->get('usertype')" class="mt-2" />
                </div>
            </div>
    
            <!-- Email Address -->
            <div class="mt-4 text-black">
                <x-input-label for="email" class="form-label" :value="__('Email')" />
                <x-text-input wire:model="email" id="email" class="form-control" type="email" name="email" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
                <div class="mt-5">
        
                    <div class="flex items-center gap-4">
                        <x-primary-button class="btn btn-primary">{{ __('Save') }}</x-primary-button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

  <!--Reset Password-->
  <div class="modal fade" id="resetPassword" tabindex="-1" aria-labelledby="resetModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="resetModalLabel">RESET USER PASSWORD</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form wire:submit="resetPassword">
                <div>
                    <x-input-label for="update_password_password" class="form-label" :value="__('New Password')" />
                    <x-text-input wire:model="password" id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
        
                <div>
                    <x-input-label for="update_password_password_confirmation" class="form-label" :value="__('Confirm Password')" />
                    <x-text-input wire:model="password_confirmation" id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
        
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="btn btn-primary">
                        {{ __('Reset Password') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>


    <!--end div-->
</div>
@script
 <script>
    $(document).ready(function(){
      $('#searchTxt').on('keyup',function(){
        @this.search = $(this).val();
        @this.call('perPages');
      })
    });
    $wire.on('showEditModal', () => {
      $('#editModal').modal('show');
    });
    $wire.on('showDeleteModal', () => {
      $('#deleteModal').modal('show');
    });
    $wire.on('openResetPassword', () => {
      $('#resetPassword').modal('show');
    });
 </script>
@endscript
