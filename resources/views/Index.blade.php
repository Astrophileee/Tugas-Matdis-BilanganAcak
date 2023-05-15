<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('style.css')}}">
  </head>
<body>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
          <img src="/img/logo2.png" class="img-circle m-2"style="width: 30px">
          <span class="brand-text font-weight-light"><b>LCG</b></span>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/dashboard" class="nav-link">Home</a>
      </li>
    </ul>
</nav>
  <!-- /.navbar -->
  @if(session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
@endif
    <section class="content mt-5">
      <div class="container">
          <div class="card" style="width: 1000px; height: 200px;" >
            <div class="card-body">
              <h5 class="card-title"><b>Pembangkit Bilangan Acak Semu</b></h5>
              <p>Bilangan acak (random) banyak digunakan di dalam kriptografi Misalnya untuk pembangkitan parameter kunci pada algoritma kunci-publik,pembangkitan initialization vector (IV) pada algoritma kunci-simetri, dan sebagainya</p>
              <p>Tidak ada komputasi yang benar-benar menghasilkan deret bilangan acak secara sempurna. Bilangan acak yang dihasilkan dengan rumus rumus matematika adalah bilangan acak semu (pseudo), karena pembangkitan bilangannya dapat diulang kembali. Pembangkit deret bilangan acak semacam itu disebut <b>pseudo-random number generator(PRNG)</b> </p>
            </div>
          </div>
          <div class="card mt-5" style="width: 1000px; height: 400px;">
            <div class="card-body">
              <h5 class="card-title"><b>Linear Congruential Generator (LCG)</b></h5>
              <p>Pembangkit bilangan acak kongruen-lanjar (linearcongruential generator atau LCG ) adalah PRNG yang berbentuk: X<sub>n</sub> = (aX<sub>n–1</sub>  + b) mod m</p>
              <p>X<sub>n</sub> = bilangan acak ke-n dari deretnya</p>
              <p>X<sub>n – 1</sub> = bilangan acak sebelumnya</p>
              <p>a = faktor pengali</p>
              <p>b = increment</p>
              <p>m = modulus</p>
              <p>Kunci pembangkit adalah X<sub>0</sub> yang disebut seed (nilai awal)</p>
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                COBA PROGRAM LCG
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">LCG</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="{{route('dashboard.store')}}"  enctype="multipart/form-data">
                        @csrf
                          <div class="mb-3">
                            <label class="form-label">Masukan X<sub>0</sub> (nilai awal)</label>
                            @error('nilaiAwal')
                                <div class="text-danger">
                                  {{ $message }}
                                </div>
                              @enderror
                            <input type="number" class="form-control" name="nilaiAwal" id="nilaiAwal">
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Masukan a (faktor pengali)</label>
                            @error('a')
                                <div class="text-danger">
                                  {{ $message }}
                                </div>
                              @enderror
                            <input type="number" class="form-control" name="a" id="a">
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Masukan b (increment)</label>
                              @error('b')
                                <div class="text-danger">
                                  {{ $message }}
                                </div>
                              @enderror
                            <input type="number" class="form-control" name="b" id="b">
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Masukan m (modulus)</label>
                            @error('m')
                                <div class="text-danger">
                                  {{ $message }}
                                </div>
                              @enderror
                            <input type="number" class="form-control" name="m" id="m">
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Masukan Masukkan jumlah bilangan acak yang ingin dihasilkan:</label>
                            @error('n')
                                <div class="text-danger">
                                  {{ $message }}
                                </div>
                              @enderror
                            <input type="number" class="form-control" name="n" id="n">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>