
<div class="container mt-5">
  <div class="row mb-4">
      <div class="col-md-6 m-auto">
      <div class="card">
      <h4 class="card-title text-center mt-3">Crear Nueva Categoria</h4>
        <div class="card-body">
            
            <form action="<?=base_url?>categoria/save" method="POST">
              

                <div class="form-outline mb-4">
                  <input type="text" id="form1Example2" class="form-control" name="nombre" required />
                  <label class="form-label" for="form1Example2">Nombre</label>
                </div>
              

              
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block m-auto SubmitButton" id='SubmitButton' value="guardar">Guardar</button>
                  </div>
                </div>
              </form>
        </div>
    </div>
      </div>
  </div>
</div>