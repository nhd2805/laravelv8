@extends('admin.layout.index')
@section('Content')
<h3 style="text-align: center;">THÊM SINH VIÊN</h3>
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
<form action="themsinhvien" method="POST">
  @csrf
  <table style="margin-left: 50px;margin-bottom: 5px;">
    <tr><td>Mã Sinh Viên: <input type="text" name="masv" class="form-control"></td></tr>
    <tr><td>Họ Tên: <input type="text" name="hoten" class="form-control"></td></tr>
    <td></td>
    <tr><td>Ngày Sinh: <input type="date" name="ngaysinh" class="form-control"></td></tr>
    <td></td>
    <tr><td>Giới Tính: <input type="text" name="gioitinh" class="form-control" min=1></tdSố></tr>
      <td></td>
      <tr><td>Ngành:</td><td><select name="id_nganh" class="form-control">@foreach($a as $n)<option value="{{$n->id}}">{{$n->tennganh}}</option>@endforeach</select></td></tr>
      <td></td>
      <tr><td><input type="submit" value="Lưu" class="btn btn-success"></td></tr>
    </table>
  </form>
  @endsection