
@extends('layouts.app')

@section('content')


    
    <h2>Url List</h2> 
    <a href="{{ route('urls.create') }}">
        <button class="btn" >Add Url</button>
    </a>
      
    
    <table>
      <tr>
        <th>Url Name</th>
        <th>Short Link</th>
        <th>Original Link</th>
        <th>Click Count</th>
        <th>Action</th>
      </tr>
        @foreach($urls as $url)
            <tr>
                <td>{{ $url->name }}</td>
                <td><a style="color:red;" href="{{ url($url->short_url) }}" target="_blank">{{ url($url->short_url) }}</a></td>
                <td>{{ $url->long_url }}</td>
                <td>{{ $url->click_count }}</td>
                <td>
                    <a href="{{ route('urls.edit', $url) }}"><button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to Edit this url?');">Edit</button></a>
                    <form action="{{ route('urls.destroy', $url->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this url?');">Delete</button>
                    </form>
                </td>
            </tr>

        @endforeach
    </table>

@endsection
