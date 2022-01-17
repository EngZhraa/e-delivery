<div>
    <div class="flex flex-row flex-wrap justify-between	">
        <div class="my-2 ml-2">
            <input class="rounded border-slate-200" type="text" wire:model="searchValue"/>
            <select
            class="rounded border-slate-200"
            id="centers"
            wire:model="center_id"
            >
            @foreach ($centers as $center)
                <option value="{{$center->id}}">{{$center->name}}</option>
            @endforeach
            </select>
        </div>
        <div class="flex flex-row my-2 ml-2">
            
            @if($selectedTrans)
            <p>{{$selectedTrans['trans_id']}}</p>
            <form class="flex flex-row items-center	" wire:submit.prevent="submit">
                <textarea class="rounded border-slate-200" type="text" wire:model="reason"></textarea>
                <select
                class="rounded border-slate-200"
                wire:model="new_status_id"
                >
                @foreach ($status as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
                </select>
                <input type="file"  wire:model="files" required multiple/>
                <input class="rounded border-slate-200 bg-green-200 p-2" type="submit" text="Update"/>
            </form>
            @endif
        </div>
    </div>
    <table class="w-[calc(100vw-285px)] table-auto m-2">
        <thead class="bg-slate-500 text-white">
          <tr>
            <th align="center" class="py-2">#</th>
            <th align="center" class="py-2">Trans ID</th>
            <th align="center" class="py-2">Full Name</th>
            <th align="center" class="py-2">Phone</th>
            <th align="center" class="py-2">Governorate</th>
            <th align="center" class="py-2">Center</th>
            <th align="center" class="py-2">Sector</th>
            <th align="center" class="py-2">status</th>
            <th align="center" class="py-2">Update</th>
          </tr>
        </thead>
        <tbody>
         @foreach ($data as $key=>$item)
             <tr >
                 <td align="center" class="py-2">
                     {{$key+1}}
                 </td>
                 <td align="center" class="cursor-pointer py-2" wire:click="goToHistory({{$item}})">
                    {{$item->trans_id}}
                </td>
                <td align="center" class="py-2">
                    {{$item->fullname}}
                </td>
                <td align="center" class="py-2">
                    {{$item->phone}}
                </td>
                <td align="center" class="py-2">
                    {{$item->governorate->name}}
                </td>
                <td align="center" class="py-2">
                    {{$item->center->name}}
                </td>
                <td align="center" class="py-2">
                    {{$item->sector->name}}
                </td>
                <td align="center" class="py-2">
                   <span
                  class="
                  @if($item->status->name == 'pending')
                    bg-orange-300
                  @else
                  bg-green-300
                  @endif
                  "
                   >
                    {{$item->status->name}}
                   </span>
                </td>
                <td align="center" class="py-2">
                    <button wire:click="update({{$item}})" class="bg-slate-400	text-white p-1">Update</button>
                 </td>
             </tr>
         @endforeach
        </tbody>
      </table>
      {{$data->links()}}
</div>
