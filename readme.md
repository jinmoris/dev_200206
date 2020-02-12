## 다운 및 클론 하시면 실행이 안될수 있습니다.
laravel 공부 중인 프로젝트입니다.

## sweet-alert  설치
composer require realrashid/sweet-alert

* 마스터 블레이드 레이아웃에 @include('sweetalert::alert') 넣는다
* php artisan vendor:publish --provider="RealRashid\SweetAlert\SweetAlertServiceProvider"
* 컨트롤러에 삽입:
* use RealRashid\SweetAlert\Facades\Alert;
* 넣은 위치에 소스를 삽입한다. (예, Alert::success('저장', '저장이 완료 되었습니다.');)
* 레이아웃:
<pre><code>
 Alert::alert('저장', '저장이 완료 되었습니다.');
 Alert::success('저장', '저장이 완료 되었습니다.');
 Alert::info('저장', '저장이 완료 되었습니다.');
 Alert::error('저장', '저장이 완료 되었습니다.');
 Alert::question('저장', '저장이 완료 되었습니다.');
 Alert::image('Image Title!','Image Description','Image URL','Image Width','Image Height');
 Alert::html('Html Title', 'Html Code', 'Type');
 Alert::toast('Toast Message', 'Toast Type');
 </code></pre>

* 예제:
▶패스워드변경완료 경고창 설정
<pre><code>
\vendor\laravel\framework\src\Illuminate\Auth\Notifications\ResetPassword.php
or
/vendor/laravel/framework/src/Illuminate/Foundation/Auth/ResetsPasswords.php
</code></pre>

 <pre><code>
 protected function resetPassword($user, $password)
    {
        $user->password = Hash::make($password);
 
        $user->setRememberToken(Str::random(60));
 
        $user->save();
 
        event(new PasswordReset($user));
        Alert::success('비밀번호 변경 완료', '');
        $this->guard()->login($user);
    }
</code></pre>

▶패스워드 재설정 이메일 보내고 경고창 설정
<pre><code>
\vendor\laravel\framework\src\Illuminate\Auth\Notifications\SendsPasswordResetEmails.php
or
/vendor/laravel/framework/src/Illuminate/Foundation/Auth/SendsPasswordResetEmails.php
</code></pre>
<pre><code>
public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);
 
        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $this->credentials($request)
        );
         Alert::success('이메일 전송 완료', '재설정 이메일을 확인해 주세요.');
        return $response == Password::RESET_LINK_SENT
                    ? $this->sendResetLinkResponse($request, $response)
                    : $this->sendResetLinkFailedResponse($request, $response);
    }
</code></pre>
