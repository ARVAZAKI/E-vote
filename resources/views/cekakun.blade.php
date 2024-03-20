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
      @if (Session::has('message'))
      <div class="alert alert-success w-40">{{Session::get('message')}}</div>
    @endif
    @if (Session::has('warning'))
    <div class="alert alert-danger w-40">{{Session::get('warning')}}</div>
  @endif
      <div class="wrapper">
        <form action="/cekakun" method="post">
          @csrf
          <h1>Cek Akun</h1>
          <p>Masukan Email</p>
          <div class="input-box text-center">
            <input type="email" placeholder="Email" name="email" id="email" required />
          </div>
          <button type="submit" class="btn">Cek</button>
        </form>
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
  </body>
</html>
