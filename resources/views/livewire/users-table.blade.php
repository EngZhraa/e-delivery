<!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                      <!-- Modal toggle -->
                      @can('users-create')
                      <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="new-user-modal">
                        New
                      </button>
                      @endcan
        @can('users-list')
        <table class="min-w-full w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  #
                </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Full Name
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Username
              </th>
              {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Status
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Role
              </th> --}}
              @can('users-update')
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Edit</span>
              </th>
              @endcan
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
              
            @foreach ($users as $key=>$user)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{$key+1}}</div>
                 
                </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10">
                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">
                      {{$user->fullname}}
                    </div>
                    {{-- <div class="text-sm text-gray-500">
                      fadi@example.com
                    </div> --}}
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">  {{$user->username}}</div>
                
              </td>
              {{-- <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  Active
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                Admin
              </td> --}}
             @can('users-update')
             <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
            </td>
             @endcan
            </tr>
            @endforeach

            <!-- More people... -->
          </tbody>
        </table>

        @endcan
  
  <!-- Main modal -->
  <div  id="new-user-modal" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center h-modal md:h-full md:inset-0">
      <div class="relative px-4 w-full max-w-md h-full md:h-auto">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <div class="flex justify-end p-2">
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="new-user-modal">
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                  </button>
              </div>
                   <!-- Validation Errors -->
        <form class="px-6 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" wire:submit.prevent="create">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="fullname" :value="__('Fullname')" />

                <x-input wire:model.defer="fullname" id="fullname" class="block mt-1 w-full" type="text" name="fullname" :value="old('fullname')" required autofocus />
                @error('fullname') <span class="error">{{ $message }}</span> @enderror

            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="username" :value="__('Username')" />

                <x-input wire:model.defer="username" id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required />
                @error('username') <span class="error">{{ $message }}</span> @enderror
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input wire:model.defer="password" id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                @error('password') <span class="error">{{ $message }}</span> @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input wire:model.defer="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
                @error('password_confirmation') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="flex items-center justify-end mt-4">
                
                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
                {{-- <input type="submit" text="Submit"/> --}}
            </div>
              </form>
          </div>
      </div>
  </div>
        </div>
      </div>
    </div>
  </div>