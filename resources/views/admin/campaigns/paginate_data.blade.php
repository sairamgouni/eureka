
@foreach ($categories as $index => $category)



    <tr>
        <td>{{ $category->title }}</td>
        <td>{{ $category->about_user }}</td>
        <td>{{ ucfirst($category->status) }}</td>
        <td><a href="{{$category->getEditPath()}}" class="btn btn-success">Edit</a>
            <a href="javascript:void(0)" class="btn btn-primary" onClick="deleteCategory('{{$category->slug}}')">Delete</a>

        </td>
    </tr>

@endforeach
<tr>
    <td colspan="3" align="center">
        {{ $categories->links() }}
    </td>
</tr>
