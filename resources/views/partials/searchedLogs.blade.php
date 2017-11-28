<div style="margin-left: 60%; position: relative;">
                    @if(\Auth::user()->admin)
                        {!! Form::submit('ORDER ASC',['style'=>'color:green;', 'onclick'=>'asc()']) !!}
                        {!! Form::submit('ORDER DESC',['style'=>'color:green;', 'onclick'=>'desc()']) !!}
                    @endif
                    </div>
                    <table style="border-collapse: collapse; width: 100%;">
                      <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Date and Time</th>
                        <th>IP</th>
                      </tr>
                      @foreach($logs->reverse() as $log)
                      @php
                        $user=\App\User::find($log->user);
                      @endphp
                        <tr>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>{{ \Carbon\Carbon::parse($log->time)->diffForHumans() }}</td>
                          <td>{{ $log->ip }}</td>
                        </tr>
                      @endforeach
                    </table>