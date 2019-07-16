<div id="editCoins" class="modal" style="max-width: 700px;margin-top:50px;">
    <section class="content-header">
        <h1><text id="tittleCoins"></text> Monedas</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-car"></i>Monedas</a></li>
            <li class="active"><text id="tittleCoinsHr"></text></li>
        </ol>
    </section>   
    
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border"><h3 class="box-title">Datos Generales De Moneda</h3></div>
                    <div>
                        <input type="hidden" name="Coinsid" id="Coinsid">
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="form-group col-md-4">
                                    <label for="placa">Nombre<label style="color:red">*</label></label>
                                    <input type="text" class="form-control mayusc" name="Coinsdescription" id="Coinsdescription" placeholder="Ingresar nombre" required>
                                </div>
    
                                <div class="form-group col-md-4">
                                    <label for="placa">Abreviación<label style="color:red">*</label></label>
                                    <input type="text" class="form-control mayusc" name="Coinsabreviation" id="Coinsabreviation" placeholder="Ingresar Abreviación" required>
                                </div>
                                        
                                <div class="form-group col-md-4">
                                    <label for="placa">Símbolo <label style="color:red">*</label></label>
                                    <input type="text" class="form-control mayusc" name="Coinssymbol" id="Coinssymbol" placeholder="Ingresar símbolo" required>
                                </div>
                            </div> 
                            
                            <div class="col-md-12">
                                <div class="form-group col-md-4">
                                    <label for="categoria">Estatus<label style="color:red">*</label></label>
                                    <select class="form-control mayusc" name="Coinsstatus" id="Coinsstatus" required></select>   
                                </div>
                            </div> 
                        </div>
      
                        <div class="box-footer">
                            <label style="color:red">(*) Todos los campos son requeridos.</label>
                              
                            <center>
                                <button type="submit" class="btn btn-primary" id='btn-coins' value="edit" onclick="javascript:void(0);">Editar</button>
                                <button type="reset" class="btn btn-default" onclick="getClearCoins()">Cerrar</button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>