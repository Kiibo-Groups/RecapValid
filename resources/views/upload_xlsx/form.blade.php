<!-- Start Content-->
<div class="card">   
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="municipio" class="form-label">Municipio</label>
                <input type="text" name="municipio" id="municipio" class="form-control" value="{{ $data->municipio }}" @if (!$data->id) required="required" @endif>
            </div> 

            <div class="col-md-6 mb-3">
                <label for="colonia" class="form-label">Colonia</label>
                <input type="text" name="colonia" id="colonia" class="form-control" value="{{ $data->colonia }}" @if (!$data->id) required="required" @endif>
            </div>
            
            <div class="col-md-6 mb-3">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" name="marca" id="marca" class="form-control" value="{{ $data->marca }}" @if (!$data->id) required="required" @endif>
            </div> 

            <div class="col-md-6 mb-3">
                <label for="linea" class="form-label">Linea</label>
                <input type="text" name="linea" id="linea" class="form-control" value="{{ $data->linea }}" @if (!$data->id) required="required" @endif>
            </div> 

            <div class="col-md-6 mb-3">
                <label for="tipo" class="form-label">Tipo</label>
                <input type="text" name="tipo" id="tipo" class="form-control" value="{{ $data->tipo }}" @if (!$data->id) required="required" @endif>
            </div> 

            <div class="col-md-6 mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="year" name="modelo" id="modelo" class="form-control" value="{{ $data->modelo }}" @if (!$data->id) required="required" @endif>
            </div> 

            <div class="col-md-6 mb-3">
                <label for="type_person" class="form-label">Tipo Persona</label>
                <select class="form-select" name="type_person" id="type_person" @if (!$data->id) required="required" @endif>
                    <option selected>Selecciona...</option>
                    <option value="Fisica" @if($data->type_person == "Fisica") selected @endif >Fisica</option>
                    <option value="Moral" @if($data->type_person == "Moral") selected @endif >Moral</option> 
                </select>
            </div> 

            <div class="col-md-6 mb-3">
                <label for="sexo" class="form-label">Sexo</label>
                <select class="form-select" name="sexo" id="sexo" @if (!$data->id) required="required" @endif>
                    <option selected>Selecciona...</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Masculino">Masculino</option> 
                </select>
            </div> 

            <div class="col-md-6 mb-3">
                <label for="puertas" class="form-label">Puertas</label>
                <input type="text" name="puertas" id="puertas" class="form-control" value="{{ $data->puertas }}" @if (!$data->id) required="required" @endif>
            </div> 

            <div class="col-md-6 mb-3">
                <label for="vin" class="form-label">VIN</label>
                <input type="text" name="vin" id="vin" class="form-control" value="{{ $data->vin }}" @if (!$data->id) required="required" @endif>
            </div> 

            <div class="col-md-6 mb-3">
                <label for="placa" class="form-label">PLACA</label>
                <input type="text" name="placa" id="placa" class="form-control" value="{{ $data->placa }}" @if (!$data->id) required="required" @endif>
            </div> 

            <div class="col-md-6 mb-3">
                <label for="color" class="form-label">Color</label>
                <input type="text" name="color" id="color" class="form-control" value="{{ $data->color }}" @if (!$data->id) required="required" @endif>
            </div> 

            <div class="col-md-6 mb-3">
                <label for="procedencia" class="form-label">Procedencia</label>
                <select class="form-select" name="procedencia" id="procedencia" @if (!$data->id) required="required" @endif>
                    <option selected>Selecciona...</option>
                    <option value="Estatal">Estatal</option> 
                    <option value="IMP Usado Pick VP A1" @if($data->procedencia == "IMP Usado Pick VP A1") selected @endif>IMP Usado Pick VP A1</option> 
                    <option value="Importado Discapacit" @if($data->procedencia == "Importado Discapacit") selected @endif>Importado Discapacit</option> 
                    <option value="Importados Nuevos" @if($data->procedencia == "Importados Nuevos") selected @endif>Importados Nuevos</option> 
                    <option value="Importados Usados" @if($data->procedencia == "Importados Usados") selected @endif>Importados Usados</option> 
                    <option value="Inscritos" @if($data->procedencia == "Inscritos") selected @endif>Inscritos</option> 
                    <option value="Otro Estado" @if($data->procedencia == "Otro Estado") selected @endif>Otro Estado</option> 
                    <option value="Regularizado" @if($data->procedencia == "Regularizado") selected @endif>Regularizado</option> 
                </select>
            </div> 

            <div class="col-md-6 mb-3">
                <label for="servicio" class="form-label">Servicio</label>
                <select class="form-select" name="servicio" id="servicio" @if (!$data->id) required="required" @endif>
                    <option selected>Selecciona...</option>
                    <option value="Auto antiguo" @if($data->servicio == "Auto antiguo") selected @endif>Auto antiguo</option> 
                    <option value="Discapacitado" @if($data->servicio == "Discapacitado") selected @endif>Discapacitado</option> 
                    <option value="Oficial administrativo" @if($data->servicio == "Oficial administrativo") selected @endif>Oficial administrativo</option> 
                    <option value="Oficial Servicios Publicos" @if($data->servicio == "Oficial Servicios Publicos") selected @endif>Oficial Servicios Publicos</option> 
                    <option value="Particular" @if($data->servicio == "Particular") selected @endif>Particular</option> 
                    <option value="Placas de demostracion" @if($data->servicio == "Placas de demostracion") selected @endif>Placas de demostracion</option> 
                    <option value="S.P.E" @if($data->servicio == "S.P.E") selected @endif>S.P.E</option> 
                </select>
            </div> 

            <div class="col-md-6 mb-3">
                <label for="adeudo" class="form-label">Adeudo</label> 
                <select class="form-select" name="adeudo" id="adeudo" @if (!$data->id) required="required" @endif>
                    <option selected>Selecciona...</option>
                    <option value="DEBE" @if($data->adeudo == "DEBE") selected @endif>DEBE</option>
                    <option value="PAGADO" @if($data->adeudo == "PAGADO") selected @endif>PAGADO</option> 
                </select>
            </div> 

            <div class="col-md-6 mb-3">
                <label for="propietarios" class="form-label">Propietarios</label>
                <input type="number" name="propietarios" id="propietarios" class="form-control" value="{{ $data->propietarios }}" @if (!$data->id) required="required" @endif>
            </div> 
        </div>
 
    </div>

    <div class="mt-5" style="justify-items: end;display: grid;padding:20px;">
        <button type="submit" class="btn btn-primary mb-2 btn-pill">
            @if(!$data->id)
            Agregar
            @else 
            Actualizar
            @endif
        </button>
    </div>
</div>