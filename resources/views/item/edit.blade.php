<div id="editItems" class="modal" style="max-width: 700px;margin-top:50px;">
        <section class="content-header">
            <h1><text id="tittleItems"></text> Rubros</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-car"></i>Rubros</a></li>
                <li class="active"><text id="tittleItemsHr"></text></li>
            </ol>
        </section>   
        
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border"><h3 class="box-title">Datos Generales Rubros</h3></div>
                        <div>
                            <input type="hidden" name="Itemsid" id="Itemsid">
                            <div class="box-body">
                                <div class="col-md-12">
                                    <div class="form-group col-md-4">
                                        <label for="categoria">Rubro<label style="color:red">*</label></label>
                                        <select class="form-control mayusc" name="Itemsidrubro" id="Itemsidrubro" required></select>   
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label for="placa">Sub Rubro<label style="color:red">*</label></label>
                                        <input type="text" class="form-control mayusc" name="Itemsdescription" id="Itemsdescription" placeholder="Ingresar sub Rubro" required>
                                    </div>
        
                                    <div class="form-group col-md-4">
                                        <label for="placa">Abreviación<label style="color:red">*</label></label>
                                        <input type="text" class="form-control mayusc" name="Itemsabreviation" id="Itemsabreviation" placeholder="Ingresar abreviación" required>
                                    </div>
                                </div> 
                                
                                <div class="col-md-12">
                                    <div class="form-group col-md-4">
                                        <label for="categoria">Moneda<label style="color:red">*</label></label>
                                        <select class="form-control mayusc" name="Itemsidcoins" id="Itemsidcoins" required></select>   
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="categoria">Precio<label style="color:red">*</label></label>
                                        <input type="text" class="form-control mayusc" name="Itemsprice" id="Itemsprice" placeholder="Ingresar precio" required>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="categoria">Estatus<label style="color:red">*</label></label>
                                        <select class="form-control mayusc" name="Itemsstatus" id="Itemsstatus" required></select>   
                                    </div>
                                </div> 
                            </div>
          
                            <div class="box-footer">
                                <label style="color:red">(*) Todos los campos son requeridos.</label>
                                  
                                <center>
                                    <button type="submit" class="btn btn-primary" id='btn-items' value="edit" onclick="javascript:void(0);">Editar</button>
                                    <button type="reset" class="btn btn-default" onclick="getClearItems()">Cerrar</button>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>