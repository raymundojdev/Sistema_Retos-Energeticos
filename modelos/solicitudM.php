<?php

require_once "ConexionBD.php";

class SolicitudM extends ConexionBD
{

    static public function VerSolicitudM($tablaBD, $item, $valor)
    {
        $idsuario = $_SESSION["id"];

        if ($item != null) {
            /* -------------------------------------------------------------------------- */
            /*                          crearemos la variable pdo                         */
            /* -------------------------------------------------------------------------- */

            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $item = :$item AND status =1 ");

            $pdo->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            /* -------------------------------------------------------------------------- */
            /*          //variable pdo para que se nos ejecute la consulta SELECT         */
            /* -------------------------------------------------------------------------- */
            $pdo->execute();
            /* -------------------------------------------------------------------------- */
            /*    //retornamos el pdo con un fetchAll() para mostrar todos los usuarios   */
            /* -------------------------------------------------------------------------- */
            return $pdo->fetchAll();
            /* -------------------------------------------------------------------------- */
            /*                       //Cerramos la conexion de la BD                      */
            /* -------------------------------------------------------------------------- */
            $pdo->close();
        } else {
            /* -------------------------------------------------------------------------- */
            /*                          crearemos la variable pdo                         */
            /* -------------------------------------------------------------------------- */

            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE status = 1 AND id_usuario = $idsuario ");


            /* -------------------------------------------------------------------------- */
            /*          //variable pdo para que se nos ejecute la consulta SELECT         */
            /* -------------------------------------------------------------------------- */
            $pdo->execute();
            /* -------------------------------------------------------------------------- */
            /*    //retornamos el pdo con un fetchAll() para mostrar todos los usuarios   */
            /* -------------------------------------------------------------------------- */
            return $pdo->fetchAll();
            /* -------------------------------------------------------------------------- */
            /*                       //Cerramos la conexion de la BD                      */
            /* -------------------------------------------------------------------------- */
            $pdo->close();
        }
    }




    static public function VistaManagerM($tablaBD, $item, $valor)
    {
        $idsuario = $_SESSION["id"];

        if ($item != null) {
            /* -------------------------------------------------------------------------- */
            /*                          crearemos la variable pdo                         */
            /* -------------------------------------------------------------------------- */

            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM vista_solicitud_general WHERE $item = :$item ");

            $pdo->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            /* -------------------------------------------------------------------------- */
            /*          //variable pdo para que se nos ejecute la consulta SELECT         */
            /* -------------------------------------------------------------------------- */
            $pdo->execute();
            /* -------------------------------------------------------------------------- */
            /*    //retornamos el pdo con un fetchAll() para mostrar todos los usuarios   */
            /* -------------------------------------------------------------------------- */
            return $pdo->fetchAll();
            /* -------------------------------------------------------------------------- */
            /*                       //Cerramos la conexion de la BD                      */
            /* -------------------------------------------------------------------------- */
            $pdo->close();
        } else {
            /* -------------------------------------------------------------------------- */
            /*                          crearemos la variable pdo                         */
            /* -------------------------------------------------------------------------- */

            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM vista_solicitud_general WHERE status = 1  AND firma_superv = $idsuario");


            /* -------------------------------------------------------------------------- */
            /*          //variable pdo para que se nos ejecute la consulta SELECT         */
            /* -------------------------------------------------------------------------- */
            $pdo->execute();
            /* -------------------------------------------------------------------------- */
            /*    //retornamos el pdo con un fetchAll() para mostrar todos los usuarios   */
            /* -------------------------------------------------------------------------- */
            return $pdo->fetchAll();
            /* -------------------------------------------------------------------------- */
            /*                       //Cerramos la conexion de la BD                      */
            /* -------------------------------------------------------------------------- */
            $pdo->close();
        }
    }


    /* -------------------------------------------------------------------------- */
    /*                            CONSULTA TRAER DATOS                            */
    /* -------------------------------------------------------------------------- */
    static public function VistaSolicitudM($tablaBD, $item2, $valor2)
    {


        if ($item2 != null) {


            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $item2 = :$item2 AND status=1");

            $pdo->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);

            $pdo->execute();

            return $pdo->fetch();
        } else {


            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE status = 1");

            $pdo->execute();

            return $pdo->fetchAll();
        }

        $pdo->close();
        $pdo = null;
    }

    /* -------------------------------------------------------------------------- */
    /*                        insert de datos de solicitud                        */
    /* -------------------------------------------------------------------------- */

    static public function AgregarSolicitudM($tablaBD, $datosC)
    {

        date_default_timezone_set('America/Mexico_City');
        $fecha = date('Y-m-d H:i:s');
        $fechatext = date('d/m/Y H:i:s', strtotime($fecha));
        $solicitante = $_SESSION['nombre'];
        $email = $_SESSION["correo"];
        $iniciales = $_SESSION["iniciales_firma"];
        $idsuario = $_SESSION["id"];
        // $Creofechayhora = $creo . ' ' . $fechatext;
        printf($email);
        print_r($datosC);

        //  
        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD 
        (id_provedor,atnproveedor_soli, lugarentr_solicitud,atn_lentrega,cp_lentrega,
        direccion_lentrega,telefono_lentrega,solicitante_lentrega,email_solicitante
        ,solicitante_soli,firma_superv,forma_env,incoterms,plazo_entr,id_cliente,
        proyecto_soli,seguro_inclu,oferta_suminis,condicion_especial,ref_suministrador,
        descripcion,cantidad,precio_unitario,tasa,total,subtotal_soli,taxes,
        pago_envio_soli,otros_soli,total_soli,moneda,cuadro_msoli,ofertaprove_soli,
        especificacion_tecsoli,status, estado,id_tipo_proceso,
        id_usuario) 

         
        VALUES 
        (:id_provedor,:atnproveedor_soli, :lugarentr_solicitud,:atn_lentrega,:cp_lentrega,
        :direccion_lentrega,:telefono_lentrega,'$solicitante','$email','$iniciales',:firma_superv,:forma_env,
        :incoterms,:plazo_entr,:id_cliente,
        :proyecto_soli,:seguro_inclu,:oferta_suminis,:condicion_especial,:ref_suministrador,
        :descripcion,:cantidad,:precio_unitario,:tasa,:total,:subtotal_soli,:taxes,
        :pago_envio_soli,:otros_soli,:total_soli,:moneda,:cuadro_msoli,:ofertaprove_soli,
        :especificacion_tecsoli,1, 1,1,$idsuario)");

        $pdo->bindParam(":id_provedor", $datosC["id_provedor"], PDO::PARAM_INT);
        $pdo->bindParam(":atnproveedor_soli", $datosC["atnproveedor_soli"], PDO::PARAM_STR);
        $pdo->bindParam(":lugarentr_solicitud", $datosC["lugarentr_solicitud"], PDO::PARAM_STR);
        $pdo->bindParam(":atn_lentrega", $datosC["atn_lentrega"], PDO::PARAM_STR);
        $pdo->bindParam(":cp_lentrega", $datosC["cp_lentrega"], PDO::PARAM_STR);
        $pdo->bindParam(":direccion_lentrega", $datosC["direccion_lentrega"], PDO::PARAM_STR);
        $pdo->bindParam(":telefono_lentrega", $datosC["telefono_lentrega"], PDO::PARAM_STR);

        $pdo->bindParam(":firma_superv", $datosC["firma_superv"], PDO::PARAM_STR);
        $pdo->bindParam(":forma_env", $datosC["forma_env"], PDO::PARAM_STR);
        $pdo->bindParam(":incoterms", $datosC["incoterms"], PDO::PARAM_STR);
        $pdo->bindParam(":plazo_entr", $datosC["plazo_entr"], PDO::PARAM_STR);
        $pdo->bindParam(":id_cliente", $datosC["id_cliente"], PDO::PARAM_STR);
        $pdo->bindParam(":proyecto_soli", $datosC["proyecto_soli"], PDO::PARAM_STR);
        $pdo->bindParam(":seguro_inclu", $datosC["seguro_inclu"], PDO::PARAM_STR);
        $pdo->bindParam(":oferta_suminis", $datosC["oferta_suminis"], PDO::PARAM_STR);
        $pdo->bindParam(":condicion_especial", $datosC["condicion_especial"], PDO::PARAM_STR);
        $pdo->bindParam(":ref_suministrador", $datosC["ref_suministrador"], PDO::PARAM_STR);
        $pdo->bindParam(":descripcion", $datosC["descripcion"], PDO::PARAM_STR);
        $pdo->bindParam(":cantidad", $datosC["cantidad"], PDO::PARAM_STR);
        $pdo->bindParam(":precio_unitario", $datosC["precio_unitario"], PDO::PARAM_STR);
        $pdo->bindParam(":tasa", $datosC["tasa"], PDO::PARAM_STR);
        $pdo->bindParam(":total", $datosC["total"], PDO::PARAM_STR);
        $pdo->bindParam(":subtotal_soli", $datosC["subtotal_soli"], PDO::PARAM_STR);
        $pdo->bindParam(":taxes", $datosC["taxes"], PDO::PARAM_STR);
        $pdo->bindParam(":pago_envio_soli", $datosC["pago_envio_soli"], PDO::PARAM_STR);
        $pdo->bindParam(":otros_soli", $datosC["otros_soli"], PDO::PARAM_STR);
        $pdo->bindParam(":total_soli", $datosC["total_soli"], PDO::PARAM_STR);
        $pdo->bindParam(":moneda", $datosC["moneda"], PDO::PARAM_STR);
        $pdo->bindParam(":cuadro_msoli", $datosC["cuadro_msoli"], PDO::PARAM_STR);
        $pdo->bindParam(":ofertaprove_soli", $datosC["ofertaprove_soli"], PDO::PARAM_STR);
        $pdo->bindParam(":especificacion_tecsoli", $datosC["especificacion_tecsoli"], PDO::PARAM_STR);



        if ($pdo->execute()) {
            return true;
        } else {
            return false;
        }

        $pdo->close();
        $pdo = null;
    }
    /* --------------------------------------------------------------------------*/
    /*                             Actualizar datos solicitud                    */
    /* --------------------------------------------------------------------------*/
    static public function ActualizarARSolicitudM($tablaBD, $datosC, $comentario)
    {

        if (isset($comentario) && !empty($comentario)) {
            $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET comentarios = :comentarios, 
             estado = 3  WHERE id = :id");

            $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
            $pdo->bindParam(":comentarios", $datosC["comentarios"], PDO::PARAM_STR);
           
            // $pdo->bindParam(":estado", 2, PDO::PARAM_STR);


            if ($pdo->execute()) {
                return "ok";
                /* -------------------------------------------------------------------------- */
                /*                 si no se cumple que nos retorne como falso                 */
                /* -------------------------------------------------------------------------- */
            } else {
                return "error";
            }

            /* -------------------------------------------------------------------------- */
            /*                          Cerramos conexion de pdo                          */
            /* -------------------------------------------------------------------------- */
            $pdo->close();
            $pdo = null;

        } else 
        
        {

            $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET comentarios = :comentarios, 
             estado = 2, id_tipo_proceso= 2  WHERE id = :id");

            $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
            $pdo->bindParam(":comentarios", $datosC["comentarios"], PDO::PARAM_STR);
           
           


            if ($pdo->execute()) {
                return true;
                /* -------------------------------------------------------------------------- */
                /*                 si no se cumple que nos retorne como falso                 */
                /* -------------------------------------------------------------------------- */
            } else {
                return false;
            }

            /* -------------------------------------------------------------------------- */
            /*                          Cerramos conexion de pdo                          */
            /* -------------------------------------------------------------------------- */
            $pdo->close();
            $pdo = null;
           }
        }
    }

