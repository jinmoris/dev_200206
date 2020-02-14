@extends('layouts/adminLayout/admin_design')

@section('contents')
<div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{url('/admin/view-category')}}" class="current">카테고리 리스트</a> </div>
      <h1>카테고리</h1>
    </div>
    <div class="container-fluid">
      <hr>

      @if(Session::has('flash_message_error'))
      <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>	
              <strong>{!! session('flash_message_error') !!}</strong>
      </div>
      @endif
      @if(Session::has('flash_message_success'))
      <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>	
              <strong>{!! session('flash_message_success') !!}</strong>
      </div>
      @endif

      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <h5>카테고리 리스트</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>카테고리명</th>
                    <th>URL</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    
                @foreach ($categories as $category)
                <tr class="gradeX">
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->url}}</td>
                    <td class="center"><a href="#" class="btn btn-primary btn-mini">수정</a> <a href="#" class="btn btn-danger btn-mini">삭제</a></td>
                  </tr>
                @endforeach
                 
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection