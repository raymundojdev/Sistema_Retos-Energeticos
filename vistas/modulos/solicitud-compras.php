<?php

// if( $_SESSION["rol"] == "Empleado"
// || $_SESSION["rol"] == "Manager" || $_SESSION["rol"] = "Director"
// || $_SESSION["rol"] == "Compras"){

//     echo '<script>

//     window.location = "inicio";
//     </script>';

//     return;

//   }
?>

<!--start wrapper-->
<div class="wrapper">
    <!-- start page content wrapper-->
    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content" style="margin-bottom: -3%;">

            <!--start breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Gestor solicitud de compras </div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0 align-items-center">
                            <li class="breadcrumb-item"><a href="inicio"><ion-icon name="home-outline"></ion-icon></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Consulta Solicitud de compra</li>
                        </ol>

                    </nav>

                </div>
                <!-- <div class="ms-auto">
              <div class="btn-group">
                <button type="button" class="btn btn-outline-primary">Settings</button>
                <button type="button" class="btn btn-outline-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                  <a c
                  lass="dropdown-item" href="javascript:;">Another action</a>
                  <a class="dropdown-item" href="javascript:;">Something else here</a>
                  <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                </div>
              </div>
            </div> -->
            </div>
            <!--end breadcrumb-->
            <div class="btn-group" role="group" aria-label="Basic example">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0 align-items-center">

                        <!-- <li class="breadcrumb-item active" aria-current="page"><button type="button" class="btn btn-info px-5" style="color: #fff;" data-bs-toggle="modal" data-bs-target="#solicitudCom"><i class="fadeIn animated bx bx-user-plus"></i>Solicitud de compra</button></li> -->
                        <li class="breadcrumb-item active" aria-current="page"><button type="button" class="btn btn-info px-5" style="color: #fff;" data-bs-toggle="modal" data-bs-target="#solicitudCom2"><i class="fadeIn animated bx bx-user-plus"></i>Solicitud de compra</button></li>

                    </ol>
                </nav>
            </div>
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3"></div>

            </div>

        </div>

        <!-- start page content-->
        <div class="page-content" style="padding: 0.5rem; margin-bottom: -3%;">

            <!--start breadcrumb-->

            <!--end breadcrumb-->

            <hr />
            <h6 class="mb-0 text-uppercase"></h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                    <th>Fecha</th>
                                    <th>Solicitante</th>
                                    <th>Suministrador</th>
                                    <th>Total</th>
                            </thead>
                            <tbody>
                                <!-- -------------------------------------------------------------------------- -->
                                <!--                      Vista de datos de tabla solicitud                     -->
                                <!-- -------------------------------------------------------------------------- -->
                                <?php
                                $item2 = null;
                                $valor2 = null;


                                $item = null;
                                $valor = null;
                                $verS = SolicitudC::VerSolicitudC($item, $valor);
                                ?>
                                <?php
                                /* -------------------------------------------------------------------------- */
                                /*abrimos un foreach con la variable respuesta traiga un echo con lo que tenemos
                                  como registros en la tabla                                                  */
                                /* -------------------------------------------------------------------------- */

                                foreach ($verS as $key => $value) {
                                    echo '
                                    </tr>';
                                ?>
                                    <tr>
                                        <td><?php
                                            if ($value['estado'] == 1) {
                                                echo ' <button class="btn btn-secondary btn-block" type="submit">En proceso</button>';
                                            }
                                            if ($value['estado'] == 2) {
                                                echo ' <button class="btn btn-success btn-block" type="submit">Aprobada</button>';
                                            }
                                            if ($value['estado'] == 3) {
                                                echo ' <button class="btn btn-danger btn-block" type="submit">Rechazada</button>';
                                            }

                                            ?></td>

                                        <td>
                                            <div class="btn-group">
                                                <!-- <button type="button" class="btn btn-warning"><i class="fadeIn animated bx bx-edit-alt"></i></button> -->
                                                <button class="btn btn-danger " title="Eliminar solicitud"><i class="fadeIn animated bx bx-trash-alt"></i></button>
                                                <button class="btn btn-secondary " title="PDF"><i class="bi bi-file-earmark-pdf"></i></button>
                                            </div>
                                        </td>
                                        <td><?php echo $value["fecha"] ?></td>
                                        <td><?php echo $value["solicitante_lentrega"] ?></td>
                                        <td><?php echo $value["nombre_prov"] ?></td>
                                        <td><?php echo $value["total_soli"] ?></td>




                                    </tr> <?php } ?>

                            </tbody>

                        </table>
                        <!-- -------------------------------------------------------------------------- -->
                        <!--                     Final vista de datos de tabla solicitud                -->
                        <!-- -------------------------------------------------------------------------- -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end page content-->
    </div>

    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top"><ion-icon name="arrow-up-outline"></ion-icon></a>
    <!--End Back To Top Button-->

    <!--start overlay-->
    <div class="overlay nav-toggle-icon"></div>
    <!--end overlay-->

</div>
<!-- -------------------------------------------------------------------------- -->
<!--                            ejemplo de comentario                           -->
<!-- -------------------------------------------------------------------------- -->

<!-- -------------------------------------------------------------------------- -->
<!--                           Modal  Solicitud                                 -->
<!-- -------------------------------------------------------------------------- -->



<!-- ---------------------------------------------------------------------------->
<!--                       Modal crear solicitud de compra                     -->
<!-- ---------------------------------------------------------------------------->
<div class="modal fade" id="solicitudCom2" tabindex="-1" aria-hidden="true" style="background-color: #fff;">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Solicitud de compra</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-right: 1%"></button>
            </div>
            <div class="row" style="background-color:#fff;">
                <div class="col-xl-7 mx-auto">

                    <hr />
                    <div class="card">
                        <div class="card-body">
                            <div class="p-4 border rounded">
                                <form id="solicitante" class="row g-3 needs-validation " method="post" enctype="multipart/form-data">
                                    <!-- style="background-color: #1b4e88;color: #fff;
                                     padding-bottom: 2%; text-align:center;" -->
                                    <h6 class="mb-0 text-uppercase">VENDOR / SUMINISTRADOR</h6>
                                    <div class="col-md-6">
                                        <label for="validationDefault01" class="form-label">Nombre</label>

                                        <select class="form-select" value="" name="proveedorN" id="proveedorN" required>
                                            <option value="" name="" id="proveedorN">...</option>
                                            <?php
                                            $item = null;
                                            $valor = null;

                                            $suminis = ProveedoresC::VerCombProveedoresC($item, $valor);
                                            foreach ($suminis as $key => $value) {
                                                echo '<option value="' . $value["id"] . '" >' . $value["nombre_prov"] . '</option>';
                                            }

                                            ?>

                                        </select>


                                    </div>

                                    <div class="col-md-6">
                                        <label for="validationDefaul05" class="form-label">ATN</label>
                                        <input type="text" class="form-control" name="atnSN" id="validationDefault0" required>

                                    </div>


                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-5 mx-auto">

                    <hr />
                    <div class="card">
                        <div class="card-body">
                            <div class="p-4 border rounded">
                                <div class="row g-3 needs-validation" novalidate>
                                    <!-- style="background-color: #1b4e88;color: #fff;
                                            padding-bottom: 4%; text-align:center;" -->
                                    <h6 class="mb-0 text-uppercase">SHIP TO /LUGAR DE ENTREGA</h6>
                                    <div class="col-md-4">
                                        <label for="validationDefault01" class="form-label">Lugar/entrega</label>
                                        <input type="text" class="form-control" name="entregaLN" id="validationDefaul01" value="RETOS ENERGETICOS SA DE CV">

                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationDefault02" class="form-label">ATN</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="atnLN" id="validationDefaul03" value="" required>

                                        </div>
                                        <!-- <select class="form-select" name="atnN" id="" required>
                                        <option value="" name="">Seleciona ATN</option>
                                            <?php
                                            // $item = null;
                                            // $valor = null;

                                            // $manager = UsuariosC::VerManagerC($item, $valor);
                                            // foreach ($manager as $key => $value) {
                                            //     echo '<option value="' . $value["nombre"] . '">' . $value["nombre"] . '</option>';
                                            // }
                                            ?>


                                        </select> -->
                                        <!-- <input type="text" class="form-control" id="validationDefaul02" value="" required> -->

                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationDefault01" class="form-label">CP</label>
                                        <input type="text" class="form-control" name="cpLN" id="validationDefaul03" value="91919, VERACRUZ VER, MEXICO" required>

                                    </div>

                                    <div class="col-md-8">
                                        <label for="validationDefaul03" class="form-label">Dirección</label>
                                        <input type="text" class="form-control" name="direccionLN" id="validationDefault04" value="JUAN GRIJALVA #610" required>

                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationDefault03" class="form-label">Teléfono</label>
                                        <input type="text" class="form-control" name="telefonoLN" id="validationDefault05" value="+52 1 229 937 1727" required>

                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationDefault2" class="form-label">Solicitante</label>
                                        <input type="text" class="form-control" name="solicitanteLN" id="validationDefault2" value="<?php echo $_SESSION["nombre"]; ?>" disabled>

                                    </div>

                                    <div class="col-md-6">
                                        <label for="validationDefault08" class="form-label">Email</label>
                                        <input type="text" class="form-control" name="emailLN" id="validationDefault08" value='<?php echo $_SESSION["correo"]; ?>' disabled>

                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xl-12 mx-auto">
                    <hr />
                    <div class="card">
                        <div class="card-body">
                            <div class="p-4 border rounded">
                                <div class="row g-3 needs-validation" novalidate>


                                    <div class="col-md-2">
                                        <label for="validationDefault01" class="form-label">Requisitioner / Solicitante</label>
                                        <input type="text" class="form-control" name="solicitanteSN" id="validationDefault01" value="<?php echo $_SESSION["iniciales_firma"]; ?>" required disabled>

                                    </div>
                                    <div class="col-md-3">
                                        <label for="validationDefault02" class="form-label">Request by/ Firma de Autorizador</label>
                                        <select class="form-select" value="" name="firmasupN" id="" required>
                                            <option value="" name="">...</option>
                                            <?php
                                            $item = null;
                                            $valor = null;

                                            $suminis = UsuariosC::VerManagerC($item, $valor);
                                            foreach ($suminis as $key => $value) {
                                                echo '<option value="' . $value["id"] . '" >' . $value["nombre"] . '</option>';
                                            }
                                            //
                                            ?>
                                            <!-- // <option value="" name="monedaN">...</option>
                                            // <option value="MXN">MXN</option> -->
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="validationDefault03" class="form-label">Ship via / Forma de envio</label>
                                        <input type="text" class="form-control" name="formaenvN" id="validationDefault03" value="" required>

                                    </div>
                                    <div class="col-md-2">
                                        <label for="validationDefault04" class="form-label">Incoterms</label>
                                        <input type="text" class="form-control" name="incotermsN" id="validationDefault04" value="" required>

                                    </div>
                                    <div class="col-md-3">
                                        <label for="validationDefault05" class="form-label">Lead Time/ Plazo de entrega</label>
                                        <input type="text" class="form-control" name="plazoentregaN" id="validationDefault05" required>

                                    </div>


                                    <br>
                                    <br>
                                    <br>


                                    <div class="col-md-2">
                                        <label for="validationDefault06" class="form-label">Client/ Cliente</label>
                                        <select class="form-select" value="" name="clienteN" id="" required>
                                            <option value="" name="">...</option>
                                            <?php
                                            $item = null;
                                            $valor = null;

                                            $clientes = ClientesC::MostrarClientesC($item, $valor);
                                            foreach ($clientes as $key => $value) {
                                                echo '<option value="' . $value["id"] . '" >' . $value["nombrecomercial_cli"] . '</option>';
                                            }
                                            //
                                            ?>

                                        </select>

                                    </div>





                                    <div class="col-md-2">
                                        <label for="validationDefault06" class="form-label">Project / Proyecto</label>
                                        <input type="text" class="form-control" name="proyectoN" id="validationDefault06" value="" required>

                                    </div>
                                    <div class="col-md-3">
                                        <label for="validationDefault08" class="form-label">Insurance included/ Seguro incluido</label>
                                        <select  class="form-select" name="seguroincluN" id="validationDefault08" required>
                                            <option selected disabled value="">...</option>
                                            <option>Sí</option>
                                            <option>No</option>

                                        </select>

                                    </div>
                                    <div class="col-md-3">
                                        <label for="validationDefault09" class="form-label">Vendor offer / Oferta suministrador</label>
                                        <input type="text" class="form-control" name="ofertasumN" id="validationDefault09">

                                    </div>
                                    <div class="col-md-2">
                                        <label for="validationDefault10" class="form-label"> Condiciones Especiales</label>
                                        <input type="text" class="form-control" name="condicionesespN" id="validationDefault10" required>

                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xl-12 mx-auto">

                    <hr />
                    <div class="card" style="margin-top: -3%;">
                        <div class="card-body">
                            <div class="p-4 border rounded">
                                <div class="row g-3 needs-validation" novalidate>
                                    <div class="table-responsive inputSummary">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>

                                                    <th style="width:13%;">Referencia</th>
                                                    <th style="width: 35%;">Descripción</th>
                                                    <th style="width:10%;">Cantidad</th>
                                                    <th>Precio unitario</th>
                                                    <th>Tasa</th>
                                                    <th>Tasa %</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="solicitanteN[]" required>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" rows="1" cols="1" name="descripN[]"></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  required> -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="text" class="form-control" name="cantN[]" id="cantN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="precuniN[]" id="precuniN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="tasaporN[]" id="tasaporN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="tasaN[]" id="tasaN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="totalesN[]" id="totalesN[]" oninput="calcularS()" value="">

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="solicitanteN[]">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" rows="1" cols="1" name="descripN[]"></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="number" class="form-control" name="cantN[]" id="cantN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="precuniN[]" id="precuniN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="tasaporN[]" id="tasaporN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="tasaN[]" id="tasaN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="totalesN[]" id="totalesN[]" oninput="calcularS()" value="">

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="solicitanteN[]">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <textarea class="form-control" rows="1" cols="1" name="descripN[]"></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="number" class="form-control" name="cantN[]" id="cantN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="precuniN[]" id="precuniN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="tasaporN[]" id="tasaporN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="tasaN[]" id="tasaN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="totalesN[]" id="totalesN[]" oninput="calcularS()" value="">

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="solicitanteN[]">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" rows="1" cols="1" name="descripN[]"></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="number" class="form-control" name="cantN[]" id="cantN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="precuniN[]" id="precuniN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="tasaporN[]" id="tasaporN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="tasaN[]" id="tasaN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="totalesN[]" id="totalesN[]" oninput="calcularS()" value="">

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="solicitanteN[]">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" rows="1" cols="1" name="descripN[]"></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="number" class="form-control" name="cantN[]" id="cantN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="precuniN[]" id="precuniN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="tasaporN[]" id="tasaporN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="tasaN[]" id="tasaN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="totalesN[]" id="totalesN[]" oninput="calcularS()" value="">

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="solicitanteN[]">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" rows="1" cols="1" name="descripN[]"></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="number" class="form-control" name="cantN[]" id="cantN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="precuniN[]" id="precuniN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="tasaporN[]" id="tasaporN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="tasaN[]" id="tasaN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="totalesN[]" id="totalesN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="solicitanteN[]">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" rows="1" cols="1" name="descripN[]"></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="number" class="form-control" name="cantN[]" id="cantN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="precuniN[]" id="precuniN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="tasaporN[]" id="tasaporN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="tasaN[]" id="tasaN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="totalesN[]" id="totalesN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="solicitanteN[]">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" rows="1" cols="1" name="descripN[]"></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="number" class="form-control" name="cantN[]" id="cantN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="precuniN[]" id="precuniN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="tasaporN[]" id="tasaporN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="tasaN[]" id="tasaN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="totalesN[]" id="totalesN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="solicitanteN[]">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" rows="1" cols="1" name="descripN[]"></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="number" class="form-control" name="cantN[]" id="cantN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="precuniN[]" id="precuniN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="tasaporN[]" id="tasaporN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="tasaN[]" id="tasaN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="totalesN[]" id="totalesN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="solicitanteN[]">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" rows="1" cols="1" name="descripN[]"></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="number" class="form-control" name="cantN[]" id="cantN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="precuniN[]" id="precuniN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="tasaporN[]" id="tasaporN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="tasaN[]" id="tasaN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="totalesN[]" id="totalesN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="solicitanteN[]">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <textarea class="form-control" rows="1" cols="1" name="descripN[]"></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="number" class="form-control" name="cantN[]" id="cantN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="precuniN[]" id="precuniN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="tasaporN[]" id="tasaporN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="tasaN[]" id="tasaN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="totalesN[]" id="totalesN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="solicitanteN[]">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <textarea class="form-control" rows="1" cols="1" name="descripN[]"></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="number" class="form-control" name="cantN[]" id="cantN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="precuniN[]" id="precuniN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="tasaporN[]" id="tasaporN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="tasaN[]" id="tasaN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="totalesN[]" id="totalesN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="solicitanteN[]">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <textarea class="form-control" rows="1" cols="1" name="descripN[]"></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="number" class="form-control" name="cantN[]" id="cantN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="precuniN[]" id="precuniN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="tasaporN[]" id="tasaporN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="tasaN[]" id="tasaN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="totalesN[]" id="totalesN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!--removeInput para eliminar filas de solicitud  boton danger                  -->
                                                    <!-- -------------------------------------------------------------------------- -->
                                                    <!-- <input type="" name="inputSummary" value="1"> -->
                                                    <!-- <td><button class="btn btn-danger" onclick="removeInput(0,'inputSummary')" title="Eliminar fila"><i class="lni lni-trash"></i></button></td> -->
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="solicitanteN[]">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <textarea class="form-control" rows="1" cols="1" name="descripN[]"></textarea>
                                                            <!-- <input type="text" class="form-control" name="descripN[]"  > -->

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-10">

                                                            <input type="number" class="form-control" name="cantN[]" id="cantN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="precuniN[]" id="precuniN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="tasaporN[]" id="tasaporN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="tasaN[]" id="tasaN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">

                                                            <input type="number" class="form-control" name="totalesN[]" id="totalesN[]" oninput="calcularS()">

                                                        </div>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>


                                </div>
                                <!-- -------------------------------------------------------------------------- -->
                                <!-- addInput agrega filas a tabla de prouctos                                  -->
                                <!-- -------------------------------------------------------------------------- -->

                                <!-- <button type="button" class="btn btn-warning" style="margin-left: 0.5%;" title="Agregar fila" onclick="addInput(this,'inputSummary')"><i class="lni lni-plus"></i></button>
                                <label for="" class="form-label" style="color:#c2c2c2;">&ensp;Agregar solo filas necesarias</label> -->

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-12 col-xl-12 col-sm-12 col-md-12  mx-auto">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="my-3 border-top"></div>
                        <h6 class="mb-0">Subtotal: <span class="float-end"><input type="text" class="form-control" style="position: relative; margin-top: -5%" name="subtotalN" id="subtotalN" oninput="calcularS()" required></span></h5>

                            <div class="my-3 border-top"></div>
                            <h6 class="mb-0">Taxes: <span class="float-end"><input type="text" class="form-control" style="position: relative; margin-top: -5%" name="taxesN" id="taxesN" oninput="calcularS()" required></span></h5>
                                <div class="my-3 border-top"></div>
                                <h6 class="mb-0">Shipping: <span class="float-end"><input type="text" class="form-control" style="position: relative; margin-top: -5%" name="shippinglN" id="shippinglN" oninput="calcularS()" value="" required></span></h5>
                                    <div class="my-3 border-top"></div>
                                    <h6 class="mb-0">Otros: <span class="float-end"><input type="text" class="form-control" style="position: relative; margin-top: -5%" name="otrosN"  id="otrosN" oninput="calcularS()" value="" required></span></h5>
                                        <div class="my-3 border-top"></div>
                                        <h6 class="mb-0">Total: <span class="float-end"><input type="text" class="form-control" style="position: relative; margin-top: -5%" name="totalN" id="totalN" oninput="calcularS()" required></span></h5>

                                            <div class="my-3 border-top"></div>
                                            <h6 class="mb-0">Moneda: <span class="float-end">
                                                    <input type="text" class="form-control" style="position: relative; margin-top: -5%" name="monedaN" value="" required>
                    </div>
                </div>
                <br>
                <hr>

            </div>

            <div class="card radius-10">
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-3 g-3">

                        <div class="card-body">
                            <div class="d-flex align-items-center gap-3">
                                <div class="widget-icon-2 bg-light-success text-success">
                                    <i class="lni lni-archive"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="mb-0">Cuadro de mando</p>
                                    <br>
                                    <input type="file" class="form-control" name="cuadro_msoliN" id="cuadro_msoliN" aria-label="file example">
                                    <br>
                                    <div class="form-check mb-3">

                                        <input type="checkbox" name="novalido1" id="novalido1" value="Option 1">
                                        <label class="form-check-label">No valido</label>


                                    </div>
                                    <div class="progress my-0" style="height: 6px;">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-3">
                                <div class="widget-icon-2 bg-light-success text-success">
                                    <i class="lni lni-archive"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="mb-0">Oferta de proveedor</p>
                                    <br>
                                    <input type="file" class="form-control" id="ofertaprovN" name="ofertaprovN" aria-label="file example">
                                    <div class="form-check mb-3">
                                        <!-- id="validationFormCheck1" -->
                                        <br>
                                        <input type="checkbox" name="novalido2" id="novalido2" value="Option 1">
                                        <label class="form-check-label">No valido</label>

                                    </div>
                                    <?php

                                    ?>

                                    <div class="progress my-0" style="height: 6px;">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-3">
                                <div class="widget-icon-2 bg-light-success text-success">
                                    <i class="lni lni-archive"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="mb-0">Especificación tecnica</p>
                                    <br>
                                    <input type="file" class="form-control" name="especiftecN" id="especiftecN" aria-label="file example">
                                    <div class="form-check mb-3">
                                        <br>
                                        <input type="checkbox" name="novalido3" id="novalido3" value="Option 1">

                                        <label class="form-check-label">No valido</label>

                                    </div>
                                    <!-- <h4 class="mb-2 text-success">$85K</h4> -->
                                    <div class="progress my-0" style="height: 6px;">

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!--end row-->
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Crear solicitud</button>
            <br>

            <?php

            $crearSoli = new SolicitudC();
            $crearSoli->CrearSolicitudC();

            ?>

            </form>

        </div>
    </div>
</div>


</div>

<!-- -------------------------------------------------------------------------- -->
<!--                          Final guardar modal  Solicitud                    -->
<!-- -------------------------------------------------------------------------- -->





</div>

<!-- -------------------------------------------------------------------------- -->
<!--                          Final guardar modal  Solicitud                    -->
<!-- -------------------------------------------------------------------------- -->




</div>
<!--end wrapper-->

<?php
$borrarU = new UsuariosC();
$borrarU->BorrarUsuariosC();

?>

