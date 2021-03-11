
<div class="container mt-5">
  <div class="row mb-4">
      <div class="col-md-6 m-auto">
      <div class="card">
      <h4 class="card-title text-center mt-3">Acceder</h4>
        <div class="card-body">
            
            <form action="<?=base_url?>usuario/loginUser" method="POST">
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" id="form1Example1" class="form-control" name='email' required />
                  <label class="form-label" for="form1Example1">Email</label>
                </div>
              
                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" id="form1Example2" class="form-control" name='password' required />
                  <label class="form-label" for="form1Example2">Contraseña</label>
                </div>
              
                <!-- 2 column grid layout for inline styling -->

              
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block m-auto SubmitButton" id='SubmitButton'>Enviar</button>
                <div class="col">
                    <!-- Simple link -->
                    <div class="d-flex justify-content-center">
                    <a href="<?=base_url?>usuario/registro" class="mt-3 text-weight-lights">Registrate</a>
                    </div>
                  </div>
                </div>
              </form>
        </div>
    </div>
      </div>
  </div>
</div>