@include('templates.header')

<br>

<main class="container row">
    @include('templates.kelas.sidebar')

    <h2 id="list-materi">Kelas {{$class->kelas->nama}}</h2>
    <p>{{$class->kelas->deskripsi}}</p>
    <h4 id="list-materi">List Materi</h4>

    <div class="col s9">
      <ul class="collapsible expandable" id="class-course">
        @foreach($materi as $data)
        <li>
          <div class="collapsible-header">{{$data->materi->nama}}</div>
          <div class="collapsible-body">
            Foto Materi {{$loop->index+1}}<p><img src="/{{$data->materi->foto}}" style="width:250px"></p>
            Video Materi {{$loop->index+1}}
            <p>
              <video width="320" height="240" controls>
                <source src="/{{$data->materi->video}}" type="video/mp4">
              Your browser does not support the video tag.
              </video>
            </p>
            <p>
              @if($data->status == 0)
                {{ Form::open(['url' => '/kelas/selesaimateri']) }}
                {{ Form::hidden('id_kelas_pelajar', $data->id_kelas_pelajar) }}
                {{ Form::hidden('id_materi', $data->id_materi) }}
                  <button class="btn light-blue accent-2 waves-light waves-effect" type="submit">Selesai</button>
                {{ Form::close() }}
              @else
                <a class="btn light-blue accent-2 waves-light waves-effect" type="submit" disabled>Terselesaikan</a>
              @endif
            </p>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
</main>

@include('templates.footer')

<script type="text/javascript">
  var elem = document.querySelector('.collapsible.expandable');
  var instance = M.Collapsible.init(elem, {
    accordion: false
  });
</script>
