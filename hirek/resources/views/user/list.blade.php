@foreach ($users as $user)
    <form action="/api/users/{{$users->id}}" method="post">
    {{ csrf_field() }}
    {{method_field('Get')}}
    <div class="form-group">
        <input type="submit" value="{{$falhasznalo}}">
    </div>
    </form>
@endforeach

