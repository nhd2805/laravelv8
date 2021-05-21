@extends('admin.layout.index')
@section('Content')
<h3 style="text-align: center;">SỬA SINH VIÊN</h3>
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
    <tr><td>Mã Sinh Viên: <input type="text" name="masv" value="{{$sp->masv}}" class="form-control" readonly></td></tr>
    <tr><td>Họ Tên: <input type="text" name="hoten" class="form-control" value="{{$sp->hoten}}"></td></tr>
    <td></td>
    <tr><td>Ngày Sinh: <input type="date" name="ngaysinh" class="form-control" value="{{$sp->ngaysinh}}"></td></tr>
    <td></td>
    <tr><td>Giới Tính: <input type="text" name="gioitinh" class="form-control" value="{{$sp->gioitinh}}"></tdSố></tr>
      <td></td>
    <tr><td>ID_Loại sản phẩm:</td><td><select name="id_nganh" class="form-control">@foreach($a as $n)
      @if($n->id==$sp->id_nganh)
       <option value="{{$n->id}}" selected="selected">
      @else
       <option value="{{$n->id}}">
      @endif
       {{$n->tennganh}}
      </option></option>
    @endforeach</select>
  </td></tr>
  <td></td>
  <tr><td><input type="submit" value="Lưu" class="btn btn-success"></td></tr>
  </table>
</form>
@endsection