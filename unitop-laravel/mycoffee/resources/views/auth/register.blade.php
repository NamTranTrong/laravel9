@extends('layouts.app')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@section('content')
<section class="vh-100" style="background-color:#FFF7E6;">
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center" style="padding:80px 0">
        <div class="col col-xl-7">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-12 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
                  <form method="POST">
                    @csrf 
                    <h2 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Đăng kí</h2>
  
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example17">Email</label>
                      <input placeholder="email34@gmail.com" type="email" id="form2Example17" name="email" class="form-control form-control-lg" />
                    </div>
  
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example27">Mật khẩu</label>
                      <input placeholder="*******" type="password" id="form2Example27" name="password" class="form-control form-control-lg" />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example27">Số điện thoại</label>
                        <input placeholder="+84" type="phone" name="phone" id="form2Example27" class="form-control form-control-lg" />
                      </div>
                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" style="background-color: #f0d394;" type="button">Đăng kí</button>
                    </div>
                    <a class="small text-muted" href="#!">Bạn đã có tài khoản</a>
                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="#!"
                        style="color: #393f81;">Đăng nhập</a></p>
                    <a href="#!" class="small text-muted">Terms of use.</a>
                    <a href="#!" class="small text-muted">Privacy policy</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@stop
