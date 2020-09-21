<?php

require_once 'DAOConexion.php';

include '../Modelos/Estanterias.php';

include '../Modelos/EstanteriasBackup.php';


include '../Modelos/InfoException.php';

include '../Modelos/EstanteriasException.php';

include '../Modelos/Cajas.php';

include '../Modelos/CajaBackup.php';

include '../Modelos/Pasillo.php';

include '../Modelos/CajasException.php';

include '../Modelos/AlmacenException.php';

include '../Modelos/PasilloException.php';


class DAOOperaciones{
    
    function login($user, $pass){
        global $conexion;
        
        $sql = "SELECT * FROM root WHERE user = ? AND pass = PASSWORD(?) ";
        
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ss", $user, $pass);
        if($stmt->execute()){
               $result=$stmt->get_result();
            if ($result->num_rows == 1){
                return true;
            }else{
                $mensaje = 'Credenciales Incorrectas.';
                $codigo = 001;
                $site = "DAOOperaciones:Login";
                throw new LoginException($mensaje,$codigo,$site);
            } 
        }else{
                $mensaje = $stmt->error;
                $codigo = $stmt->errno;
                $site = "DAOOperaciones:Login";
                throw new LoginException($mensaje,$codigo,$site);
        }     
    } 
    
    function infoLogin(){
        global $conexion;
        
        $sql = "SELECT empresa, codigo, nombre, direccion, localidad, responsable FROM conf";
      
        $result = $conexion->query($sql);
        
        if ($result->num_rows > 0){
            $Array=$result->fetch_assoc();
            return $Array;
        }else{
            $mensaje = $result -> error;
            $codigo = $result -> errno;
            $site = "DAOOperaciones:InfoLogin";
            throw new InfoException($mensaje,$codigo,$site);
        }
    }
    
        function insertarEstanteria($estanteria){
        global $conexion;
        
        $nLejas=$estanteria->getNLejas();
        $nPosi=$estanteria->getNPosi();
        $codigo=$estanteria->getCodigo();
        $material=$estanteria->getMaterial();
        $pasillo=$estanteria->getPasillo();
        $fecha=$estanteria->getFechaAlta();
        $nLejasOcupadas=0;
        
        
        $sql = $conexion->prepare ("INSERT INTO estanterias VALUES(null,?,?,?,?,?,?,?)");
      
        $sql->bind_param("iiissss",$nLejas,$nPosi,$nLejasOcupadas,$codigo,$material,$fecha,$pasillo);
        
        $conexion->autocommit(false);
        
        $sql->execute();     
        if ($sql->affected_rows == 1){
        $nLejasOcupadas=0;
        
        }else{
            $conexion->rollback();
            $conexion->autocommit(true);
            $mensaje = $sql -> error;
            $code = $sql -> errno;
            $site = "DAOOperaciones:insertarEstanteria():INSERT ESTANTERIA";
            throw new EstanteriasException($mensaje,$code,$site);
        }
        
        $sql2 = "UPDATE pasillo SET huecosOcupados = huecosOcupados +1 WHERE id = '$pasillo'";
        
            $result=$conexion->query($sql2);
            
        if($result == 1){
            $conexion->commit();
            $conexion->autocommit(true);
            
        }else{$conexion->rollback();
           $conexion->autocommit(true);
           $mensaje = $conexion -> error;
           $code = $conexion -> errno;
           $site = "DAOOperaciones:insertarEstanteria():UPDATE PASILLO";
           throw new PasilloException($mensaje,$code,$site);
       }        
    }     
   
    function listarEstanterias(){
        
        global $conexion;
       
        $sql = ("
                  SELECT e.id, e.n_lejas, e.n_posi,
                       e.n_lejasOcupadas, e.codigo,
                       e.material, e.fecha_alta, 
                       p.letra as pasillo 
                FROM estanterias e 
                JOIN pasillo p
                ON p.id = e.id_pasillo
                ORDER BY p.letra,e.n_posi;
            ");
        
        $result = $conexion->query($sql);
        
           if($result->num_rows > 0){
           $obj=$result->fetch_assoc();
           $estanteria =  new Estanterias($obj['n_lejas'],$obj['n_posi'],$obj['codigo'],$obj['material'],$obj['pasillo'],$obj['n_lejasOcupadas'],$obj['fecha_alta']);
           $estanteria->setId($obj['id']);
           while($obj){
               $ArrayObjects[]=$estanteria;
               $obj=$result->fetch_assoc();
           $estanteria =  new Estanterias($obj['n_lejas'],$obj['n_posi'],$obj['codigo'],$obj['material'],$obj['pasillo'],$obj['n_lejasOcupadas'],$obj['fecha_alta']);
           $estanteria->setId($obj['id']);
           }
           return $ArrayObjects;
            }else{
               $mensaje = $sql -> error;
               $code = $sql -> errno;
               $site = "DAOOperaciones:listarEstanterias()";
               throw new EstanteriasException($mensaje,$code,$site);
            }
    }
    
     function listarCajas(){
        
        global $conexion;
       
        $sql = ("SELECT id, codigo, material, contenido, color, alto, ancho, profundidad, fecha_alta FROM cajas ORDER BY codigo");
        
        $result = $conexion->query($sql);
        
           if($result->num_rows > 0){
           $obj=$result->fetch_assoc();
           $caja =  new Cajas($obj['codigo'],$obj['material'],$obj['contenido'],$obj['color'],$obj['alto'],$obj['ancho'],$obj['profundidad'],$obj['fecha_alta']);
           $caja->setId($obj['id']);
           while($obj){
               $ArrayObjects[]=$caja;
               $obj=$result->fetch_assoc();
           $caja =  new Cajas($obj['codigo'],$obj['material'],$obj['contenido'],$obj['color'],$obj['alto'],$obj['ancho'],$obj['profundidad'],$obj['fecha_alta']);
           $caja->setId($obj['id']);
           }
           return $ArrayObjects;
            }else{
               $mensaje = $sql -> error;
               $code = $sql -> errno;
               $site = "DAOOperaciones:listarCajas()";
               throw new CajasException($mensaje,$code,$site);
            }
}

     function listarCajasTodas(){
        
        global $conexion;
        
        $sql2 = ("SELECT * FROM cajasbackup");
        
        $result2 = $conexion->query($sql2);
        
           if($result2->num_rows > 0){
           $obj2=$result2->fetch_assoc();
           $cajaBackup =  new CajaBackup($obj2['codigo'],$obj2['material'],$obj2['contenido'],$obj2['color'],$obj2['alto'],$obj2['ancho'],$obj2['profundidad'],$obj2['fecha_alta'],$obj2['id_estanteria'],$obj2['leja'],$obj2['fecha_salida']);
           $cajaBackup->setId($obj2['id']);
           while($obj2){
               $ArrayObjects[]=$cajaBackup;
               $obj2=$result2->fetch_assoc();
           $cajaBackup =  new CajaBackup($obj2['codigo'],$obj2['material'],$obj2['contenido'],$obj2['color'],$obj2['alto'],$obj2['ancho'],$obj2['profundidad'],$obj2['fecha_alta'],$obj2['id_estanteria'],$obj2['leja'],$obj2['fecha_salida']);
           $cajaBackup->setId($obj2['id']);
           }
 
           return $ArrayObjects;
            }else{
               $mensaje = $sql2 -> error;
               $code = $sql2 -> errno;
               $site = "DAOOperaciones:listarCajasTodas()";
               throw new CajasException($mensaje,$code,$site);
            }
    }
    
    
    function insertarCaja($caja,$leja,$estanteria){
        global $conexion;
        
        $codigo=$caja->getCodigo();
        $material=$caja->getMaterial();
        $contenido=$caja->getContenido();
        $alto=$caja->getAlto();
        $ancho=$caja->getAncho();
        $profundidad=$caja->getProfundidad();
        $color=$caja->getColor();
        $fecha=$caja->getFecha_alta();
        
       $sql = $conexion->prepare("INSERT INTO cajas VALUES(null,?,?,?,?,?,?,?,?)");
        
       $sql->bind_param('ssssiiis',$codigo,$material,$contenido,$color,$alto,$ancho,$profundidad,$fecha);
       
       $conexion->autocommit(false);
       
       $sql->execute();
       
       if($sql->affected_rows == 1){
           $idCaja=$sql->insert_id;
       }else{
           $conexion->autocommit(true);
           $mensaje = $sql -> error;
           $code = $sql -> errno;
           $site = "DAOOperaciones:insertarCaja():INSERT CAJA";
           throw new CajasException($mensaje,$code,$site);
       }
        
       $idEstanteria = $estanteria;
       
       $idLeja = $leja;
       
       $sql2 = ("INSERT INTO ocupacion VALUES(null,$idCaja,$idEstanteria,$idLeja)");
       
       $result = $conexion->query($sql2);
       
        if(!$result == 1){
           $conexion->rollback();
           $conexion->autocommit(true);
           $mensaje = $sql -> error;
           $code = $sql -> errno;
           $site = "DAOOperaciones:insertarCaja():INSERT OCUPACION";
           throw new CajasException($mensaje,$code,$site); 
       }
       
       $sql3 = ("UPDATE estanterias SET n_lejasOcupadas = n_lejasOcupadas +1 WHERE id = '$idEstanteria'");
       
       $conexion->query($sql3);
       
        if($conexion->affected_rows == 1){
            $conexion->commit();
            $conexion->autocommit(true);
        }else{
           $conexion->rollback();
           $conexion->autocommit(true);
           $mensaje = $sql -> error;
           $code = $sql -> errno;
           $site = "DAOOperaciones:insertarCaja():UPDATE ESTANTERIA";
           throw new EstanteriasException($mensaje,$code,$site);
       }       
    } 
    
      function lejasTotal($id){
        global $conexion;
        $sql = $conexion->prepare("SELECT n_lejas FROM estanterias WHERE id=?");
        
        $sql->bind_param('i',$id);
        
        if ($sql->execute()){
            $result=$sql->get_result();
            return $result->fetch_assoc()['n_lejas'];
        }else{
            $mensaje = $sql -> error;
            $code = $sql -> errno;
            $site = "DAOOperaciones:lejasTotal()";
             throw new EstanteriasException($mensaje,$code,$site);
        }
    }
    
     function lejasOcupadas($id){
        global $conexion;
        $arrayOcupadas = [];
        $sql = $conexion->prepare("SELECT n_leja FROM ocupacion WHERE id_estanterias=?");
        $newId = $id;
        $sql->bind_param("i",$newId);  
        if ($sql->execute()){
            $result=$sql->get_result();
            while($data = $result->fetch_assoc()){
                $arrayOcupadas[] = $data['n_leja'];
            }return $arrayOcupadas;
        }else{
            $mensaje = $sql -> error;
            $code = $sql -> errno;
            $site = "DAOOperaciones:lejasOcupadas";
            throw new EstanteriasException($mensaje,$code,$site);
        }            
    }
    
    function lejasDisponibles($id){
        
        $total = self::lejasTotal($id);
        $ocupadas = self::lejasOcupadas($id);
        $libres=[];
        $cont=1;
        
        while($cont <= $total){
            if(!in_array($cont, $ocupadas)){
                $libres[]=$cont;
            }
            $cont++;
        }return $libres;   
    }
    
    function listarInventario(){
        
        global $conexion;
       
        $sql = ("SELECT e.id AS esID, e.n_lejas AS esLejas, 
        e.n_posi AS esPosi, e.n_lejasOcupadas AS esLejasOcupadas, 
        e.codigo AS esCodigo, e.material AS esMaterial, p.letra AS esPasillo,
        e.fecha_alta AS esFechaAlta, c.id AS caID, c.codigo AS caCodigo, 
        c.material AS caMaterial, c.contenido AS caContenido, c.color AS caColor, 
        c.alto AS caAlto, c.ancho AS caAncho, c.profundidad AS caProfundidad, 
        c.fecha_alta AS caFechaAlta, o.n_leja AS caLeja 
            FROM estanterias e
            LEFT JOIN ocupacion o
            ON o.id_estanterias=e.id
            LEFT JOIN cajas c
            ON o.id_cajas=c.id
            LEFT JOIN pasillo p
            ON p.id=e.id_pasillo
		  ORDER BY esPasillo, esPosi");
      
      
       $result = $conexion->query($sql);

        if ($result->num_rows > 0){
           $obj=$result->fetch_object();
           while($obj){
               $ArrayObjects[]=$obj;
               $obj=$result->fetch_object();
           } 
           return $ArrayObjects;
        }else{
            $mensaje = $sql -> error;
            $code = $sql -> errno;
            $site = "DAOOperaciones:listarInventario";
            throw new AlmacenException($mensaje,$code,$site);
        }
    }
    
    function buscarPasillo(){
        global $conexion;
        
        $sql = "SELECT * FROM pasillo";
        
        $result = $conexion->query($sql);
        
        if ($result->num_rows > 1){
            $datos = [];
            while($arrayPasillos = $result->fetch_assoc()){
                $Pasillo = new Pasillo($arrayPasillos['letra'],$arrayPasillos['huecosOcupados']);
                $Pasillo->setId($arrayPasillos['id']);
                $datos[] = $Pasillo;
            }
           return $datos;      
        }else{
            $mensaje = $sql -> error;
            $code = $sql -> errno;
            $site = "DAOOperaciones:buscarPasillo()";
            throw new AlmacenException($mensaje,$code,$site);
        }
    }
    
    function huecosTotales(){
        global $conexion;
        $sql = ("SELECT huecosPasillo FROM conf");      
        $result=$conexion->query($sql); 
        if($result->num_rows == 1){
              $huecosTotales=$result->fetch_assoc();
              return $huecosTotales;
        }else{
            $mensaje = $sql -> error;
            $code = $sql -> errno;
            $site = "DAOOperaciones:huecosTotales()";
             throw new EstanteriasException($mensaje,$code,$site);
        }
    }
    
    function huecosOcupados($id){
        global $conexion;
        $arrayOcupados = [];
        $sql = $conexion->prepare("SELECT n_posi as Posicion FROM estanterias WHERE id_pasillo = ?");
        
        $newId = $id;
        $sql->bind_param("i",$newId);
        
        if ($sql->execute()){
            $result=$sql->get_result();
            while($data = $result->fetch_assoc()){
                $arrayOcupados[] = $data['Posicion'];
            }return $arrayOcupados;
        }else{
            $mensaje = $sql -> error;
            $code = $sql -> errno;
            $site = "DAOOperaciones:huecosOcupados()";
            throw new EstanteriasException($mensaje,$code,$site);
        }        
    }
    
    function huecosDisponibles($id){
        
        $total = self::huecosTotales();
        $ocupadas = self::huecosOcupados($id);
        $libres=[];
        $cont=1;
        
        while($cont <= $total['huecosPasillo']){
            if(!in_array($cont, $ocupadas)){
                $libres[]=$cont;
            }
            $cont++;
        }return $libres;   
    }
    
   function comprobarCodigoCaja($codigo){
       
      global $conexion;
      
      $newCodigo = $codigo;
      
      $sql=$conexion->prepare("SELECT c.*, o.id_estanterias, o.n_leja FROM cajas c, ocupacion o WHERE c.codigo = ? AND c.id = o.id_cajas");
    
      $sql->bind_param("s",$newCodigo);

      if ($sql->execute()){       
        $result=$sql->get_result();
        $ArrayCajaBackup = $result->fetch_assoc();
            }else{
          $mensaje = $conexion -> error;
          $code = $conexion -> errno;
          $site = "DAOOperaciones:comprobarCodigoCaja():SELECT CAJA";
          throw new CajasBackupException($mensaje,$code,$site);
        }
        
       $idEstan=$ArrayCajaBackup['id_estanterias'];
       
       $sql2 = "SELECT codigo FROM estanterias WHERE id = '$idEstan'";
       $result=$conexion->query($sql2);
       if($result == 1){
        $data=$result->fetch_assoc();
        $ArrayCajaBackup['codigoEstan']=$data['codigo'];
        return $ArrayCajaBackup;
          }else{
        $mensaje = $conexion -> error;
        $code = $conexion -> errno;
        $site = "DAOOperaciones:comprobarCodigoCaja():SELECT CODIGO ESTANTERIA";
        throw new CajasBackupException($mensaje,$code,$site); 
      }  
   }
   
   function deleteCaja($idOldCaja){
       global $conexion;
       $sql = "DELETE FROM cajas WHERE id = $idOldCaja";
       $result = $conexion->query($sql);
       if($result == 0){
        $mensaje = $conexion -> error;
        $code = $conexion -> errno;
        $site = "DAOOperaciones:deleteCaja()";
        throw new CajasBackupException($mensaje,$code,$site); 
       }
   }
   
   function cajasExiste($codigo){
       
       $cajas = self::listarCajas();
       $cont=0;
       
       foreach($cajas as $data){
           if ($data->getCodigo() == $codigo){
               $cont++;
           }
       }
           if ($cont == 0){
            $mensaje = "La caja no existe.";
            $code = "002";
            $site = "DAOOperaciones:cajasExiste()";
            throw new CajasException($mensaje,$code,$site);
           }
   }
   
   function listarCajasBackup(){
       
       global $conexion;
       
        $sql = ("SELECT * FROM cajasbackup ORDER BY codigo");
        
        $result = $conexion->query($sql);
        
           if($result->num_rows > 0){
           $obj=$result->fetch_assoc();
           $caja =  new Cajas($obj['codigo'],$obj['material'],$obj['contenido'],$obj['color'],$obj['alto'],$obj['ancho'],$obj['profundidad'],$obj['fecha_alta']);
           $caja->setId($obj['id']);
           while($obj){
               $ArrayObjects[]=$caja;
               $obj=$result->fetch_assoc();
           $caja =  new Cajas($obj['codigo'],$obj['material'],$obj['contenido'],$obj['color'],$obj['alto'],$obj['ancho'],$obj['profundidad'],$obj['fecha_alta']);
           $caja->setId($obj['id']);
           }
           return $ArrayObjects;
            }else if ($result->num_rows == 0){
                return false;
            }else{
               $mensaje = $sql -> error;
               $code = $sql -> errno;
               $site = "DAOOperaciones:listarCajasBackup()";
               throw new CajasException($mensaje,$code,$site);
            }
        }

   
    function cajasExisteTodos($codigo){

      $cajas = self::listarCajas();
      $cont=0;

      foreach($cajas as $data){
          if ($data->getCodigo() == $codigo){
              $cont++;
          }
          if ($cont == 0){
           $mensaje = "La caja no existe.";
           $code = "002";
           $site = "DAOOperaciones:cajasExiste()";
           throw new CajasException($mensaje,$code,$site);
          }
      }
    }
    
    function buscarCaja($codigo){
        global $conexion;
        
        $sql =  "SELECT * FROM cajasbackup WHERE codigo = '$codigo'";
        
        $result = $conexion-> query($sql);
        
        if ($result == 1){
              $obj2=$result->fetch_assoc();
             $cajaBackup =  new CajaBackup($obj2['codigo'],$obj2['material'],$obj2['contenido'],$obj2['color'],$obj2['alto'],$obj2['ancho'],$obj2['profundidad'],$obj2['fecha_alta'],$obj2['id_estanteria'],$obj2['leja'],$obj2['fecha_salida']);
             return $cajaBackup;
        }else{
            $mensaje = $conexion -> error;
            $code = $conexion -> errno;
            $site = "DAOOperaciones:comprobarCodigoCaja():SELECT BUSCAR CAJA";
            throw new CajasBackupException($mensaje,$code,$site); 
        }
    }
    
   function triggerDevolucion($leja,$estanteria,$codigoCaja){
       global $conexion;
       //$sqlDrop = "DROP TRIGGER devolucion;";
            //$conexion->query($sqlDrop);
       $sql = "CREATE OR REPLACE TRIGGER devolucion "
               . "AFTER INSERT ON cajas "
               . "FOR EACH ROW "
               . "BEGIN "
               . "IF ('$codigoCaja' = NEW.codigo) THEN "
               . "UPDATE estanterias SET n_lejasOcupadas = n_lejasOcupadas + 1 WHERE id = $estanteria; "
               . "INSERT INTO ocupacion VALUES(NULL,new.id,$estanteria,$leja); "
               . "DELETE FROM cajasbackup WHERE codigo = new.codigo; "
               . "END IF; "
               . "END;";
               
        $result = $conexion->query($sql);
        if($result == 0){
            $mensaje = $conexion -> error;
            $code = $conexion -> errno;
            $site = "DAOOperaciones:devolverCajas():TRIGGER DEVOLUCION";
            throw new CajasException($mensaje,$code,$site); 
        }
   }
   
       function insertarCajaSolo($caja){
        global $conexion;
        
        $codigo=$caja->getCodigo();
        $material=$caja->getMaterial();
        $contenido=$caja->getContenido();
        $alto=$caja->getAlto();
        $ancho=$caja->getAncho();
        $profundidad=$caja->getProfundidad();
        $color=$caja->getColor();
        $fecha=$caja->getFecha_alta();
        
       $sql = $conexion->prepare("INSERT INTO cajas VALUES(null,?,?,?,?,?,?,?,?)");
        
       $sql->bind_param('ssssiiis',$codigo,$material,$contenido,$color,$alto,$ancho,$profundidad,$fecha);
       
       $sql->execute();
       
       if($sql->affected_rows == 1){
       }else{
           $mensaje = $sql -> error;
           $code = $sql -> errno;
           $site = "DAOOperaciones:insertarCajaSolo()";
           throw new CajasException($mensaje,$code,$site);
       }
     }
     
     function eliminarEstanteria($codigo,$motivo){
         
        global $conexion;
        
        $fecha = date("Y-m-d");
        
        $sqlEstanteria = "SELECT * FROM estanterias WHERE codigo = '$codigo'";
                
        $result = $conexion->query($sqlEstanteria);
        
        if ($result -> num_rows >0){
               $conexion-> autocommit(false);
               $obj2 = $result->fetch_assoc();
               $estanteria = new EstanteriasBackup($obj2['n_lejas'],$obj2['n_posi'],$obj2['codigo'],$obj2['material'],$obj2['id_pasillo'],$obj2['n_lejasOcupadas'],$obj2['fecha_alta'],$fecha,$motivo);
        }else{
           $conexion->autocommit(true);
           $mensaje = $conexion -> error;
           $code = $conexion -> errno;
           $site = "DAOOperaciones:eliminarEstanteria()::Busqueda";
           throw new EstanteriasException($mensaje,$code,$site);
       }
        
        $sql ="DELETE FROM estanterias WHERE codigo = '$codigo'"; 
        
            $conexion-> query($sql);
            
        if ($conexion -> affected_rows != 0){
        }else{
           $conexion->autocommit(true);
           $mensaje = $conexion -> error;
           $code = $conexion -> errno;
           $site = "DAOOperaciones:eliminarEstanteria()::Borrado";
           throw new EstanteriasException($mensaje,$code,$site);
       }
       
       $letra = $estanteria->getPasillo();
       
       $sql2 = "UPDATE pasillo SET huecosOcupados = huecoOcupados - 1 WHERE id = '$letra'";
       
           $result3 = $conexion-> query($sql2);
            
         if ($conexion -> affected_rows != 0){
        }else{
           $conexion->autocommit(true);
           $mensaje = $conexion -> error;
           $code = $conexion -> errno;
           $site = "DAOOperaciones:eliminarEstanteria()::UPDATE";
           throw new EstanteriasException($mensaje,$code,$site);
       }
       
       $param1 = $estanteria->getNLejas();
        $param2 = $estanteria->getNPosi();
        $param3 =  $estanteria->getCodigo();
         $param4 = $estanteria->getMaterial();
        $param5 =  $estanteria->getFechaAlta();
        $param6 =  $estanteria->getPasillo();
        
       $sql3 = "INSERT INTO estanteriasbackup VALUES (null,$param1,$param2,$param3,$param4,$param5,$param6,$fecha,$motivo)";
       
         $conexion-> query($sql3);
            
         if ($conexion -> affected_rows != 0){
             $conexion->autocommit(true);
             $conexion->commit();
        }else{
           $conexion->autocommit(true);
           $mensaje = $conexion -> error;
           $code = $conexion -> errno;
           $site = "DAOOperaciones:eliminarEstanteria()::INSERT";
           throw new EstanteriasException($mensaje,$code,$site);
       }
     }
     
}