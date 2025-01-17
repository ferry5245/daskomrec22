<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Explore the Jungle with Daskom</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/assets/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/assets/favicon/favicon-16x16.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/navbar-ex-admin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/footer.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin-main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/about.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/form-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/list.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Electrolize&family=Fira+Code:wght@400&display=swap" rel="stylesheet">   
</head>
<body style="background-color: #2c4d16" id="list-section">
  <!-- Modal -->
  
  <div class="modal fade" id="CaasInput" tabindex="-1" aria-labelledby="CaasInputLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-background">
        <div class="p-4 text-center">
            <span class="text-center rec-title">Buat Akun CaAs</span>
        </div>
        <div class="modal-body  text-center">
            <form method="POST" action="\AddCaas">
                @csrf
            <div class="pt-2 pb-2">
                <input autocomplete="off" class="uppercase text-center text-area-fill" type="text" name="nama" placeholder="Nama Lengkap CaAs" required>
            </div>
            <div class="pt-2 pb-2">
                <input autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="text-center text-area-fill" type="text" name="nim" placeholder="NIM" maxlength="10" required>
            </div>
            <div class="pt-2 pb-2">
                <input autocomplete="off" class="text-center text-area-fill" type="email" name="email" placeholder="Email" required>
            </div>
            <div>
                <label for="isLolos">
                    <input class="form-check-input" style="padding: 2px" type="radio" name="isLolos" value="0" id="isLolos" required> Tidak Lolos
                    <input class="form-check-input" style="padding: 2px" type="radio" name="isLolos" value="1" id="isLolos" required> Lolos
                </label>
            </div>
            <div class="pt-2">
                <label for="urut_tahap">Tahap:</label>
                <select class="form-select-costum" id="urut_tahap" name="urut_tahap" required>
                @foreach($namatahap as $a)
                  <option name="urut_tahap" value="{{$a->id}}">{{$a->nama}}</option>
                @endforeach
                </select> 
            </div>
            
        </div>
        <div class="modal-footer d-flex justify-content-center">
            <button type="button" class="button-cancel" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="button-submit">Buat Akun</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@include('layouts/navbarAdminBack')
@section('navbackadmin')
@endsection

<section id="list-section">
<div class="container pb-5">
    <div class="pt-5 d-flex justify-content-center">
        <div class="checker-box">
          <div class="text-center text-nim-head">
            <span>Data Calon Asisten Daskom Choose You 2021</span>
          </div>
          @if($countcaas!=0)
          <div class="text-center pt-3 pb-3">
            <div class="d-flex justify-content-center">
              
                <form action="/CariNIM" method="GET">
                  @csrf
                <div class="row">
                <div class="col-lg">
                <div><input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" autocomplete="off" class="form-style-find" type="text" id="find" name="find" alt="find" placeholder="Cari NIM..." maxlength="10"></div>
                </div>
                <div class="col-lg">
                <div class="sbmt-btn-margin"><button type="submit" class="button-submit-find">CARI</button></div>
                </div>
              </div>
                </form>
              
            </div>
          </div>
          @else
          @endif
          <div class="text-center p-2 box-count-caas" style="margin-top:0px">
            <span class="text-count-caas" style="color:rgb(49, 49, 49);">Total CaAs : {{$countcaas}}</span>
          </div>
          <div class="text-center p-2 box-count-caas" style="background-color: #2cad27;">
            <span class="text-count-caas" style="color:rgb(30, 31, 30);">Total Lolos : {{$countcaaslolos}}</span>
          </div>
          <div class="text-center p-2 box-count-caas" style="background-color: #f53838">
            <span class="text-count-caas" style="color:rgb(230, 225, 225);">Total Tidak Lolos : {{$countcaasnotlolos}}</span>
          </div>
          @error('nim')
                <div class="text-center pt-1">
                  <span class="text-center" style="color: red;font-weight:600;font-size:30px">NIM sudah ada atau kurang dari 10 karakter</span>
                </div> 
          @enderror
        </div>
      </div>
    <div class="p-3">
        <div class="card-body">
            <div class="d-flex justify-content-center pb-4">
              <div class="d-flex text-center">
                <div>
                    <button type="button" class="button-submit-find" data-bs-toggle="modal" data-bs-target="#CaasInput">Input Akun CaAs</button>
                </div>
                @if($countcaas!=0)
                <div class="ms-2">
                <a href="/CaasAccount"><button type="button" class="button-submit-find">
                Refresh 
                </button></a>
                </div>
              </div>
                @else
                @endif
            </div>
          </div>
            @if($countcaas!=0)
            
            <table class="table table-bordered table-hover table-striped text-center align-middle">
                <thead>
                    <tr>
                        <th style="color:black;font-weight:700;background-color:#f1b442" class="mobile-hide">No.</th>
                        <th style="color:black;font-weight:700;background-color:#f1b442" class="mobile-hide">Nama</th>
                        <th style="color:black;font-weight:700;background-color:#f1b442">NIM</th>
                        <th style="color:black;font-weight:700;background-color:#f1b442" class="mobile-hide">Email</th>
                        <th style="color:black;font-weight:700;background-color:#f1b442">Status</th>
                        <th style="color:black;font-weight:700;background-color:#f1b442">Tahap</th>
                        <th style="color:black;font-weight:700;background-color:#f1b442">OPSI</th>
                    </tr>
                </thead>
                <?php $no = 1; ?>
                <tbody>
                    @foreach($caas as $p)
                    <tr>
                      <td class="mobile-hide table-caas">{{ $no++ }}</td>
                        <td class="uppercase mobile-hide table-caas">{{ $p->nama }}</td>
                        <td class="table-caas">{{ $p->nim }}</td>
                        <td class="mobile-hide table-caas">{{ $p->email }}</td>
                        @if($p->isLolos==1)
                        <td style="color:rgb(20, 182, 20);font-weight:700;background-color:#f1b442">Lolos</td>
                        @else
                        <td style="color:red;font-weight:700;background-color:#f1b442">Tidak Lolos</td>
                        @endif
                        <td style="color:black;font-weight:700;background-color:#f1b442">
                        @if($p->urut_tahap==1)
                        {{ $namatahap->find(1)->nama }}
                        @elseif($p->urut_tahap==2)
                        {{ $namatahap->find(2)->nama }}
                        @elseif($p->urut_tahap==3)
                        {{ $namatahap->find(3)->nama }}
                        @elseif($p->urut_tahap==4)
                        {{ $namatahap->find(4)->nama }}
                        @elseif($p->urut_tahap==5)
                        {{ $namatahap->find(5)->nama }}
                        @elseif($p->urut_tahap==6)
                        {{ $namatahap->find(6)->nama }}
                        @elseif($p->urut_tahap==7)
                        {{ $namatahap->find(7)->nama }}
                        @else
                        @endif
                        </td>
                        <td class="table-caas">
                            <a href="/EditCaasAccount/{{ $p->datacaas_id }}"><button style="font-size: 1rem" class="button-submit-find">Edit</button></a>
                            <a href="/delcaasconfirm/{{ $p->datacaas_id }}" ><button class="button-cancel">Hapus</button></a>             
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
            <div class="">{{ $caas->links('pagination::pagination') }}</div>
            </div>
            @else
            <div>
            <div class="text-center text-nim-head">
                <span>Belum ada Data Caas yang diinput</span>
              </div>
        </div>
        @endif
</div>
</section>
</body>
</html>