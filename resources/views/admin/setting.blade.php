@extends('layouts.adminLayout.admin_design')
@section('contents')
 
<div id="content">
    <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ url('admin/setting') }}" class="current">Settings</a> </div>
      <h1>관리자 정보변경</h1>
    </div>
    <div class="container-fluid"><hr>     

        <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                <h5>Settings</h5>
              </div>
              <div class="widget-content nopadding">
                <form class="form-horizontal" method="post" action="#" name="password_validate" id="password_validate" novalidate="novalidate">
                    <div class="control-group">
                        <label class="control-label">현재 비밀번호</label>
                        <div class="controls">
                          <input type="password" name="current_pwd" id="current_pwd" />
                        </div>
                      </div>

                    <div class="control-group">
                    <label class="control-label">신규 비밀번호</label>
                    <div class="controls">
                      <input type="password" name="new_pwd" id="new_pwd" />
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">비밀번호 확인</label>
                    <div class="controls">
                      <input type="password" name="confirm_pwd" id="confirm_pwd" />
                    </div>
                  </div>
                  <div class="form-actions">
                    <input type="submit" value="변경" class="btn btn-success">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection