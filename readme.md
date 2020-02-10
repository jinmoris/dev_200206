## 다운 및 클론 하시면 실행이 안될수 있습니다.
laravel 공부 중인 프로젝트입니다.

## sweet-alert 의존성 설치
composer require realrashid/sweet-alert

- 1) 마스터 블레이드 레이아웃에 @include('sweetalert::alert') 넣는다
- 2) php artisan vendor:publish --provider="RealRashid\SweetAlert\SweetAlertServiceProvider"
- 3) 컨트롤러에 삽입:
 - use RealRashid\SweetAlert\Facades\Alert;
 - 넣은 위치에 소스를 삽입한다. (예, Alert::success('저장', '저장이 완료 되었습니다.');)
- 4) 레이아웃:
 Alert::alert('저장', '저장이 완료 되었습니다.');
 Alert::success('저장', '저장이 완료 되었습니다.');
 Alert::info('저장', '저장이 완료 되었습니다.');
 Alert::error('저장', '저장이 완료 되었습니다.');
 Alert::question('저장', '저장이 완료 되었습니다.');
 Alert::image('Image Title!','Image Description','Image URL','Image Width','Image Height');
 Alert::html('Html Title', 'Html Code', 'Type');
 Alert::toast('Toast Message', 'Toast Type');
- 5) 예제:
▶패스워드변경완료 경고창 설정
\vendor\laravel\framework\src\Illuminate\Auth\Notifications\ResetPassword.php
or
/vendor/laravel/framework/src/Illuminate/Foundation/Auth/ResetsPasswords.php
 
 protected function resetPassword($user, $password)
    {
        $user->password = Hash::make($password);
 
        $user->setRememberToken(Str::random(60));
 
        $user->save();
 
        event(new PasswordReset($user));
        Alert::success('비밀번호 변경 완료', '');
        $this->guard()->login($user);
    }

▶패스워드 재설정 이메일 보내고 경고창 설정
\vendor\laravel\framework\src\Illuminate\Auth\Notifications\SendsPasswordResetEmails.php
or
/vendor/laravel/framework/src/Illuminate/Foundation/Auth/SendsPasswordResetEmails.php

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



<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of any modern web application framework, making it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 1100 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for helping fund on-going Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell):

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
