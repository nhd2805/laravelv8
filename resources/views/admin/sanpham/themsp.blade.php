@extends('admin.layout.index')
@section('Content')
<h3 style="text-align: center;">THÊM SẢN PHẨM</h3>
@if(count($errors)>0)
<div class="alert alert-danger">
  @foreach($errors->all() as $err)
  {{$err}}<br>
  @endforeach
</div>
@endif

@if(session('thongbao'))
   <div class="alert alert-success">
    {{session('thongbao')}}
   </div>
   @endif
<form action="themsanpham" method="POST">
  @csrf
  <table style="margin-left: 50px;margin-bottom: 5px;">
  <tr><td>Tên sản phẩm: <input type="text" name="ten" class="form-control"></td></tr>
  <td></td>
  <tr><td>Giá: <input type="text" name="gia" class="form-control"></td></tr>
  <td></td>
  <tr><td>Số lượng: <input type="text" name="soluong" class="form-control" min=1></tdSố></tr>
    <td></td>
  <tr><td>ID_Loại sản phẩm:</td><td><select name="id_loaisanpham" class="form-control">@foreach($lsp as $n)<option value="{{$n->id}}">{{$n->ten}}</option>@endforeach</select></td></tr>
  <td></td>
  <tr><td><input type="submit" value="Lưu" class="btn btn-success"></td></tr>
  </table>
</form>
@endsection