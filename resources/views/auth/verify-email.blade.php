

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.2" />
    <title>LOGIN E-VOTE</title>
    <link rel="icon" href="/assets/photo/KPU PNG.png" type="image/png">

    <!-- LINKED -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href={{asset("/assets/css/home.css")}} />
    <!-- LINKED -->
  </head>
  <body>
   
    <section class="loginform">
        @if (session('terkirim'))
        <div class="alert alert-success" role="alert">
            {{ __('Verifikasi Email telah terkirim...') }}
        </div>
    @endif
@if (session('resent'))
    <div class="alert alert-success" role="alert">
        {{ __('Verifikasi email terbaru telah terkirim...') }}
    </div>
@endif
      <div class="wrapper">
          @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{$error}}</li>
                  @endforeach
                </ul>
              </div>
          @endif
          @if (Auth::user() && !Auth::user()->hasVerifiedEmail())
                <form method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-warning mt-5">Resend Verification Email</button>
                </form>           
                @endif
        <img src="/assets/photo/KPU PNG.png" alt="logokpuupn" />
      </div>
    </section>

    <!-- Footer Section -->

    <section class="footer">
      <footer>
        <div class="container">
          <p class="copyright">
            Copyright ©2024 | All Rights Reserved <br />
            Designed By @DigiCraft.ID
          </p>
        </div>
      </footer>
    </section>
    <script src="/assets/js/AlertPass.js"></script>
  </body>
</html>
