@extends('layouts.app_profile')
@section('title') Configuraciones @endsection
@section('page_active') Settings @endsection 


@section('content')
<section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="{{ asset('profile/img/'.Auth::user()->pic_profile) }}" alt="Profile" class="rounded-circle">
            <h2>{{ Auth::user()->name }} {{ Auth::user()->last_name }}</h2>
            <h3>Tu Nivel Actual: 
             <b>
              @switch(Auth::user()->level)
                  @case(0)
                  Cuenta Gratis
                  @break
                  @case(1)
                  Light
                  @break
                  @case(2)
                  Thermal
                  @break
                  @case(3)
                  Chemical
                  @break
                  @case(4)
                  Motion
                  @break
                  @case(5) 
                  Nuclear
                  @break
                  @default
              @endswitch
             </b>
            </h3>
            <div class="social-links mt-2">
              <a @if(!Auth::user()->twitter) href="#" @else href="{{ Auth::user()->twitter }}" target="_blank" @endif class="twitter"><i class="bi bi-twitter"></i></a>
              <a @if(!Auth::user()->facebook) href="#" @else href="{{ Auth::user()->facebook }}" target="_blank" @endif class="facebook"><i class="bi bi-facebook"></i></a>
              <a @if(!Auth::user()->instagram) href="#" @else href="{{ Auth::user()->instagram }}" target="_blank" @endif class="instagram"><i class="bi bi-instagram"></i></a>
              <a @if(!Auth::user()->linkedin) href="#" @else href="{{ Auth::user()->linkedin }}" target="_blank" @endif class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Visión general</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar perfil</button>
              </li> 

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Cambia la contraseña</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">Sobre ti</h5>
                <p class="small fst-italic">{{ Auth::user()->about }}</p>

                <h5 class="card-title">Detalles del perfil</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Nombre completo</div>
                  <div class="col-lg-9 col-md-8">{{ Auth::user()->name }} {{ Auth::user()->last_name }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Compañía</div>
                  <div class="col-lg-9 col-md-8">{{ Auth::user()->company }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Trabajo</div>
                  <div class="col-lg-9 col-md-8">{{ Auth::user()->job }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">País</div>
                  <div class="col-lg-9 col-md-8">{{ Auth::user()->country }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Address</div>
                  <div class="col-lg-9 col-md-8">{{ Auth::user()->address }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Phone</div>
                  <div class="col-lg-9 col-md-8">{{ Auth::user()->phone }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">{{ Auth::user()->email }}</div>
                </div>

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                {!! Form::open(['route' => ['home.update', Auth::user()->id], 'method' => 'PUT', 'files' => true]) !!}
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Imagen de perfil</label>
                    <div class="col-md-8 col-lg-9 ec-preview">
                      <input type='file' name='pic_profile' id="imageUpload" class="ec-image-upload" accept=".png, .jpg, .jpeg" hidden />
                      <label for="imageUpload">
                        @if(Auth::user()->pic_profile)
                          <img src="{{ asset('profile/img/'.Auth::user()->pic_profile) }}" class="ec-image-preview" alt="Profile">
                        @else 
                        <img src="{{ asset('profile/img/user_profile.jpg') }}" class="ec-image-preview" alt="Profile">
                        @endif
                      </label>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nombre</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="fullName" type="text" class="form-control" id="fullName" value="{{ Auth::user()->name }}">
                    </div>
                  </div>
                  
                  <div class="row mb-3">
                    <label for="LastName" class="col-md-4 col-lg-3 col-form-label">Apellidos</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="LastName" type="text" class="form-control" id="LastName" value="{{ Auth::user()->last_name }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="about" class="col-md-4 col-lg-3 col-form-label">Sobre ti</label>
                    <div class="col-md-8 col-lg-9">
                      <textarea name="about" class="form-control" id="about" style="height: 100px">{{ Auth::user()->about }}</textarea>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="company" class="col-md-4 col-lg-3 col-form-label">Compañía</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="company" type="text" class="form-control" id="company" value="{{ Auth::user()->company }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Job" class="col-md-4 col-lg-3 col-form-label">Trabajo</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="job" type="text" class="form-control" id="Job" value="{{ Auth::user()->job }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Country" class="col-md-4 col-lg-3 col-form-label">País</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="country" type="text" class="form-control" id="Country" value="{{ Auth::user()->country }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Address" class="col-md-4 col-lg-3 col-form-label">Dirección</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="address" type="text" class="form-control" id="Address" value="{{ Auth::user()->address }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Teléfono</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="phone" type="text" class="form-control" id="Phone" value="{{ Auth::user()->phone }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="email" class="form-control" id="Email" value="{{ Auth::user()->email }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="twitter" type="text" class="form-control" id="Twitter" @if(!Auth::user()->twitter) value="https://twitter.com/" @else value="{{ Auth::user()->twitter }}" @endif>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="facebook" type="text" class="form-control" id="Facebook" @if(!Auth::user()->facebook) value="https://facebook.com/" @else value="{{ Auth::user()->facebook }}" @endif>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="instagram" type="text" class="form-control" id="Instagram" @if(!Auth::user()->instagram) value="https://instagram.com/" @else value="{{ Auth::user()->instagram }}" @endif>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="linkedin" type="text" class="form-control" id="Linkedin" @if(!Auth::user()->linkedin) value="https://linkedin.com/" @else value="{{ Auth::user()->linkedin }}" @endif>
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div> 

              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                {!! Form::open(['route' => ['home.update', Auth::user()->id], 'method' => 'PUT', 'files' => true]) !!}
                  <input type="hidden" name="page_settings" value="1">
                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Contraseña actual</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password" type="password" class="form-control" id="currentPassword" value="{{ Auth::user()->shw_password}}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nueva contraseña</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="newpassword" type="password" class="form-control" id="newPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-ingrese nueva contraseña</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Cambia la contraseña</button>
                  </div>
                </form><!-- End Change Password Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
</section>
@endsection