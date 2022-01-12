<div>
    <div>
        <input type="text" wire:model="searchValue"/>
        <select
        id="centers"
        wire:model="center_id"
        >
        @foreach ($centers as $center)
            <option value="{{$center->id}}">{{$center->name}}</option>
        @endforeach
        </select>
    </div>
    <table class="table-auto w-screen">
        <thead>
          <tr>
            <th align="center">#</th>
            <th align="center">Trans ID</th>
            <th align="center">Full Name</th>
            <th align="center">Phone</th>
            <th align="center">Governorate</th>
            <th align="center">Center</th>
            <th align="center">Sector</th>
            <th align="center">status</th>
            <th align="center">Update</th>
          </tr>
        </thead>
        <tbody>
         @foreach ($data as $key=>$item)
             <tr>
                 <td align="center">
                     {{$key+1}}
                 </td>
                 <td align="center">
                    {{$item->trans_id}}
                </td>
                <td align="center">
                    {{$item->fullname}}
                </td>
                <td align="center">
                    {{$item->phone}}
                </td>
                <td align="center">
                    {{$item->governorate->name}}
                </td>
                <td align="center">
                    {{$item->center->name}}
                </td>
                <td align="center">
                    {{$item->sector->name}}
                </td>
                <td align="center">
                   <span
                   style="background-color:orange;"
                   >
                    {{$item->status->name}}
                   </span>
                </td>
                <td align="center">
                    <button>Update</button>
                 </td>
             </tr>
         @endforeach
        </tbody>
      </table>
</div>
