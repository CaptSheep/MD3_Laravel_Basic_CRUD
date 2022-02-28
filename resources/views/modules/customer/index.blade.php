<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table border="1" style="text-align: center">
    <a href="{{route('createForm')}}">Create Customers</a>
    <thead>
    <tr>
        <th>ID</th>
        <th>Customer Name</th>
        <th colspan="4">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($customers as $key=> $customer)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$customer->name}}</td>
            <td><a href="{{route('show',$customer->id)}}">Customer Detail</a></td>
            <td><a href="{{route('edit',$customer->id)}}">Edit Customers</a></td>
{{--            <td><a href="{{route('update',$customer->id)}}">upd Customers</a></td>--}}
            <td><a onclick="return confirm('Are you sure?')" href="{{route('destroy',$customer->id)}}">Delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
