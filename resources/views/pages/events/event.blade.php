@extends('layouts.app')

@section('content')
 
  <section class="wrapper bg-light">
    <div class="container py-14 py-md-16">
      <div class="row gx-lg-8 gx-xl-12">
        <div class="col-lg-8">
          <div class="blog single">
            <div class="card">
              <figure class="overlay overlay-1 hover-scale rounded mb-5">
                <a>
                  <img src="{{ asset('assets/img/photos/'.$data->img) }}" style="height:100px;" alt="" />
                </a>
              </figure>

              <div class="card-body">
                <div class="classic-view">
                  <article class="post">
                    <div class="post-content mb-5">
                      <h2 class="h1 mb-4">{{$data->titulo}}</h2>
                      <?php echo html_entity_decode($data->descript) ?>
                    </div>
                    <!-- /.post-content --> 
                  </article>
                  <!-- /.post -->
                </div>
                <!-- /.classic-view --> 
                <hr />
                <div id="comments">
                  <h3 class="mb-6">{{$data->comments_count}} Commentarios</h3>
                  
                  @if($data->comments_count > 0)
                  <ol id="singlecomments" class="commentlist">
                    @foreach ($data->comments as $comments) 
                      <li class="comment">
                        <div class="comment-header d-md-flex align-items-center">
                          <div class="d-flex align-items-center">
                            <figure class="user-avatar"><img class="rounded-circle" alt="" src="{{ asset('profile/img/'.$comments->user['pic_profile']) }}" /></figure>
                            <div>
                              <h6 class="comment-author"><a href="#" class="link-dark">{{$comments->user['name']}} {{ $comments->user['last_name'] }}</a></h6>
                              <ul class="post-meta">
                                <li><i class="uil uil-calendar-alt"></i>{{ $comments->created_at->diffForHumans() }}</li>
                              </ul>
                              <!-- /.post-meta -->
                            </div>
                            <!-- /div -->
                          </div>
                          <!-- /div -->
                        </div>
                        <!-- /.comment-header -->
                        <p>{{$comments->comment}}</p>
                      </li>
                    @endforeach
                  </ol>
                  @endif
                </div>
                <!-- /#comments -->
                <hr />

                <h3 class="mb-3">¿Te gustaría compartir tus comentarios?</h3>
                <p class="mb-7">Su dirección de correo electrónico no será publicada. Los campos obligatorios están marcados *</p>
                {!! Form::model($data, ['url' => ['/event/comment',$data->id],'files' => true]) !!}
                  <div class="form-floating mb-4">
                    <textarea name="comment" class="form-control" placeholder="Ingresa tu comentario" style="height: 150px"></textarea>
                    <label>Commentario *</label>
                  </div>
                  <button type="submit" class="btn btn-primary rounded-pill mb-0">Comentar</button>
                </form>
                <!-- /.comment-form -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.blog -->
        </div>
        <!-- /column -->
        <aside class="col-lg-4 sidebar mt-11 mt-lg-6">
          <div class="widget">
            <nav class="nav social">
              @if($admin->twitter) <a href="{{ $admin->twitter }}" target="_blank"><i class="uil uil-twitter"></i></a>@endif
              @if($admin->fb) <a href="{{ $admin->fb }}" target="_blank"><i class="uil uil-facebook-f"></i></a> @endif
              @if($admin->insta) <a href="{{ $admin->insta }}" target="_blank"><i class="uil uil-instagram"></i></a>@endif
              @if($admin->youtube) <a href="{{ $admin->youtube }}" target="_blank"><i class="uil uil-youtube"></i></a>@endif
            </nav>
            <!-- /.social -->
          </div>
          <!-- /.widget -->
          <div class="widget">
            <h4 class="widget-title mb-3">Eventos similares</h4>
            <ul class="image-list">
              @foreach($similarEvents as $sim)
                <li>
                  <figure class="rounded"><a href="{{ url('event/'.$sim->id) }}"><img src="{{ asset('assets/img/photos/'.$sim->img) }}" alt="" /></a></figure>
                  <div class="post-content">
                    <h6 class="mb-2"> <a class="link-dark" href="{{url('event/'.$sim->id)}}">{{ substr($sim->titulo,0,23) }}...</a> </h6>
                    <ul class="post-meta">
                      <li class="post-date"><i class="uil uil-calendar-alt"></i><span>{{$sim->fecha}} | {{ $sim->hora }}</span></li>
                      <li class="post-comments"><a href="{{url('event/'.$sim->id)}}"><i class="uil uil-comment"></i>{{$sim->comments_count}}</a></li>
                    </ul>
                    <!-- /.post-meta -->
                  </div>
                </li>
              @endforeach
            </ul>
            <!-- /.image-list -->
          </div>
        </aside>
        <!-- /column .sidebar -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
  </section>
  <!-- /section -->

@endsection