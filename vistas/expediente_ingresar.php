<!DOCTYPE html>
<html lang="en">

<head>
    <title>Centro de Salud</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/expediente_ingreso.css">
    
</head>

<body>

    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="las la-clinic-medical"></span> <span>Centro de Salud San Diego</span></h2>
        </div>
        <br>
        <!--Secciones-del-tablero-->
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="index.php" class=""><span class="las la-home"></span>
                    <span>Tablero</span></a>
                </li>
                <li>
                    <a href="" class="active"><span class="las la-folder-open"></span>
                    <span>Expedientes</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-medkit"></span>
                    <span>Medicamentos</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-map"></span>
                    <span>Municipio</span>
                </a>
                </li>
                <li>
                    <a href=""><span class="las la-clinic-medical"></span>
                    <span>Puesto de salud</span>
                </a>
                </li>
                <li>
                    <a href=""><span class="las la-user-md"></span>
                    <span>Proveedor</span>
                </a>
                </li>
                <li>
                    <a href=""><span class="las la-clipboard"></span>
                    <span>Reportes</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-search"></span>
                    <span>Busqueda de expedientes</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-users"></span>
                    <span>Usuarios</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label> Tablero
            </h2>

            <div class="user-wrapper">
                <img src="../img/Avatar.png" width="40px" height="40px" alt="">
                <div>
                    <h4>Usuario</h4>
                    <small>Carlos Franco</small>
                </div>
            </div>
        </header>

        <main>
        <div class="recent-grid">
        <div class="projects">
            <div class="card">
                <div class="card-header">
                <h3>Datos del expediente</h3>   
                </div>

            <div class="card-body">
            <br>
            <form name="" id="" method="POST" action=""> 
            <p>
            <label for="">DPI</label>
            <input type="text" class="input__text" placeholder="Ingrese su dpi">
            </p>
           <p>
           <label for="">Nombre</label>
           <input type="text" class="input__text" placeholder="Ingresa su nombre">
           </p>
           <p>
           <label for="">Apellido</label>
           <input type="text" class="input__text" placeholder="Ingreso su apellido">
           </p>
        <p>
          <label for="">Fecha de nacimiento</label>
          <input type="date" class="input__text">
        </p>
        <p>
          <label for="">Telefono</label>
          <input type="tel" class="input__text" placeholder="Ingrese su número">
        </p>
        <p>
          <label for="">Correo</label>
          <input type="email" class="input__text" placeholder="Ingrese su correo">
        </p>
        <p>
          <label for="">Departamento</label>
          <select class="input__text" name="select">
          <option value="value1">Zacapa</option>
          </select>
        </p>
        <p>
          <label for="">Municipio</label>
          <select class="input__text" name="select">
          <option value="value1">San Diego</option>
          </select>
        </p>
        <p>
          <label for="">Dirección</label>
          <input type="text" class="input__text" placeholder="Ingrese su direccion">
        </p>
        <p>
          <label for="">No. Expediente</label>
          <input type="text" class="input__text" placeholder="1001">
        </p>
        <p>
        </p>    
        <p>
        </p>
        <br>
        <div class="btn__group">
				<a href="expediente.php" class="btn btn__danger">Regresar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
            </form>
            </div>
            </div>
            </div>
            </div>
            </div>
    </main>

    </body>

</html>