@include('templates.header')

<br>

<main class="container row">
    @include('templates.profile.sidebar')

    <section class="col s9">
        <div class="row">
          <table>
            <thead>
              <tr>
                  <th>Pelajar</th>
                  <th>Pengajar</th>
                  <th>Kelas</th>
                  <th>Status</th>
                  <th>Bukti Pembayaran</th>
                  <th></th>
                  <th>Action</th>
              </tr>
            </thead>

            <tbody>
              @foreach($user_kelas as $kelas)
                <tr>
                  <td>{{$kelas->pengguna->nama}}</td>
                  <td>{{$kelas->kelas->instructor->nama}}</td>
                  <td>{{$kelas->kelas->nama}}</td>
                  <td>{{$kelas->status == 0 ? 'Belum Ada' : ($kelas->status == 1 ? 'Menunggu Konfirmasi' : ($kelas->status == 2 ? 'Berhasil dikonfirmasi' : 'Konfirmasi Ditolak'))}}</td>
                  <td>@if($kelas->bukti) <img src="/{{$kelas->bukti->file}}" style="width:130px"> @else Belum Ada @endif</td>
                  {{ Form::open(['url' => '/profil/konfirmbuktipembayaran']) }}
                  {{ Form::hidden('id_kelas_pelajar', $kelas->id_kelas_pelajar, ['id' => 'email', 'required' => true]) }}
                  <td>
                    <p>
                      <label>
                        <input name="konfirmasi" type="radio" checked value="setuju" />
                        <span>Konfirmasi</span>
                      </label>
                    </p>
                    <p>
                      <label>
                        <input name="konfirmasi" type="radio" value="tolak" />
                        <span>Tolak</span>
                      </label>
                    </p>
                  </td>
                  <td>
                    <button type="submit" class="waves-effect waves-light btn btn-small" {{$kelas->status != 1 ? 'disabled=true' : ''}}>Kirim</button>
                  </td>
                  {{ Form::close() }}
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </section>
</main>

@include('templates.footer')
