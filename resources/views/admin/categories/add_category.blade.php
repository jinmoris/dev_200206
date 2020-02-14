@extends('layouts.adminLayout.admin_design')
@section('contents')
<div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">카테고리등록</a> </div>
      <h1>카테고리등록</h1>
    </div>
    <div class="container-fluid"><hr>

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
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>카테고리등록</h5>
            </div>
            <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{url('/admin/add-category')}}" name="add_category" id="add_category" novalidate="novalidate">
                @csrf
                <div class="control-group">
                  <label class="control-label">카테고리명</label>
                  <div class="controls">
                    <input type="text" name="name" id="name">
                  </div>
                </div>            
                <div class="control-group">
                  <label class="control-label">카테고리설명</label>
                  <div class="controls">
                    <textarea name="description" id="description"></textarea>
                  </div>
                </div>               
                <div class="control-group">
                  <label class="control-label">URL</label>
                  <div class="controls">
                    <input type="text" name="url" id="url">
                  </div>
                </div>
                <div class="form-actions">
                  <input type="submit" value="등록" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      
    </div>
  </div>
@endsection
