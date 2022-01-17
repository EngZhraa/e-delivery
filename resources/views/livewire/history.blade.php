<div>
    {{-- Be like water. --}}
    <p>Transaction ID is: {{$trans->trans_id}}</p>
    <p>Fullname: {{$trans->fullname}}</p>
    <p>Current Status: {{$trans->status->name}}</p>
    <p>History:</p>
    <table class="table-auto">
        <thead>
          <tr>
            <th>#</th>
            <th>Statu</th>
            <th>Reason/Note</th>
            <th>User</th>
            <th>Datetime</th>
          </tr>
        </thead>
        <tbody>
         @foreach ($trans->history as $k=>$h)
         <tr>
            <td>{{$k+1}}</td>
            <td>{{$h->status->name}}</td>
            <td>{{$h->reason}}</td>
            <td>{{$h->user->username}}</td>
            <td>{{$h->created_at}}</td>
          </tr>
         @endforeach
          
        </tbody>
      </table>

      <div>
          @foreach ($trans->attachments as $item)
              <img src="{{ asset('storage/app/images/'.$item->name) }}"/>
          @endforeach
      </div>
</div>
