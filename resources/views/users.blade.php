    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                        <table><tr><td>id</td><td>name</td><td>role</td><td>email</td><td>company_name</td><td>registered_on</td><td>last_login</td></tr>
                        @foreach($results as $result)
                                <tr>
                                    <td>{{$result->id}}</td>
                                    <td><h1>{{$result->name}}</h1></td>
                                    <td>{{$result->role}}</td>
                                    <td>{{$result->email}}</td>
                                    <td>{{$result->company_name}}</td>
                                    <td>{{$result->registered_on}}</td>
                                    <td>{{$result->last_login}}</td>
                                </tr>
                        @endforeach
                        </table>
            </div>
        </div>
    </div>



