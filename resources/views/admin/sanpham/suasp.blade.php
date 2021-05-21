@extends('admin.layout.index')
@section('Content')
<h3 style="text-align: center;">SỬA SẢN PHẨM</h3>
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
<form action="{{$sp->id}}" method="POST">
  @csrf
  <table style="margin-left: 50px;margin-bottom: 5px;">
    <tr><td>ID sản phẩm: <input type="text" name="id" value="{{$sp->id}}" class="form-control" readonly></td></tr>
    <tr><td>Tên sản phẩm: <input type="text" name="ten" class="form-control" value="{{$sp->ten}}"></td></tr>
    <td></td>
    <tr><td>Giá: <input type="text" name="gia" class="form-control" value="{{$sp->gia}}"></td></tr>
    <td></td>
    <tr><td>Số lượng: <input type="text" name="soluong" class="form-control" min=1 value="{{$sp->soluong}}"></tdSố></tr>
      <td></td>
    <tr><td>ID_Loại sản phẩm:</td><td><select name="id_loaisanpham" class="form-control">@foreach($lsp as $n)
      @if($n->id==$sp->id_loaisanpham)
       <option value="{{$n->id}}" selected="selected">
      @else
       <option value="{{$n->id}}">
      @endif
       {{$n->ten}}
      </option></option>
    @endforeach</select>
  </td></tr>
  <td></td>
  <tr><td><input type="submit" value="Lưu" class="btn btn-success"></td></tr>
  </table>
</form>
@endsection