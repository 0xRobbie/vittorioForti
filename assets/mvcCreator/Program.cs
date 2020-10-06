namespace Documentos
{
    using System;
    using System.IO;
    using System.Collections.Generic;

    class Test
    {
        public static void Main()
        {
            string path = @"C:\wamp64\www\assets\mvcCreator";
            
            string clase = "Claves";
            string elementos = "idClaves,usuario,password,idServicio,idUsuarios";
            string[] parametros = elementos.Split(',');
            string tipoArchivo = ".php";
                
            modelo(path, clase, parametros, tipoArchivo);
            controlador(path, clase, parametros, tipoArchivo);
            vista(path, clase, parametros, tipoArchivo);
            vistaFormulario(path, clase, parametros, tipoArchivo);
            //vistaActualizar(path, clase, parametros, tipoArchivo);
            
            Console.WriteLine("Routes.php: ");
            routes(clase);

        }

        public static void modelo(string path, string clase, string[] parametros,  string tipoArchivo)
        {
            string pathModel = path + clase.ToLower() + tipoArchivo;

            if (!File.Exists(pathModel))
            {
                using (StreamWriter sw = File.CreateText(pathModel))
                {
                    // Inicia la clase
                    sw.WriteLine("<?php ");
                    sw.WriteLine("    class {0} ", clase);
                    sw.WriteLine("    { ");
                    
                    // Parametros
                    foreach (var param in parametros)
                    {
                        sw.WriteLine("        private ${0}; ", param);
                    }

                    // Constructor
                        sw.WriteLine(" ");
                        sw.WriteLine("        public function __construct ( ");
                    foreach (var param in parametros)
                    {
                        sw.WriteLine("                                        ${0},  ", param);
                    }
                        sw.WriteLine("                                    ) // Borrar la ultima coma");
                        sw.WriteLine("        { ");

                    foreach (var param in parametros)
                    {
                        sw.WriteLine("            $this->{0} = ${0}; ", param);
                    }
                        sw.WriteLine("        } ");
                        sw.WriteLine(" ");
                    
                    
                    // Metodos
                    foreach (var param in parametros)
                    {
                        sw.WriteLine("        public function get{0}() {{ return $this->{0};}} ", param);
                        sw.WriteLine("        public function set{0}(${0}) {{$this->{0};}} ", param);
                    }
                        sw.WriteLine(" ");
                    

                    // VER
                        sw.WriteLine("        public static function ver{0}($id) ", clase);
                        sw.WriteLine("        { ");
                        sw.WriteLine("            $db = Db::getInstance(); ");
                        sw.WriteLine("            ${0} = [];          ", clase.ToLower());
                        sw.WriteLine("            $stmt = $db->prepare('  SELECT     ");
                        sw.WriteLine("                                    * ");
                        sw.WriteLine("                                    FROM  ");
                        sw.WriteLine("                                    {0} ", clase.ToLower());
                        sw.WriteLine("                                '); ");
                        sw.WriteLine("            $stmt->execute(); ");
                        sw.WriteLine("            $req = $stmt->setFetchMode(PDO::FETCH_ASSOC); ");
                        sw.WriteLine(" ");
                        sw.WriteLine("            foreach($stmt->fetchAll() as $select) { ");
                        sw.WriteLine("                ${0}[] = new {1}(  ", clase.ToLower(), clase);

                    foreach (var param in parametros)
                    {
                        sw.WriteLine("                                                        $select['{0}'],  ", param);
                    }

                        sw.WriteLine("                                                    ); // Borrar la ultima coma");
                        sw.WriteLine("            } ");
                        sw.WriteLine(" ");
                        sw.WriteLine("            return ${0}; ", clase.ToLower());
                        sw.WriteLine("        } ");
                        sw.WriteLine(" ");
                        
                    
                    
                    // CREAR
                    
                        sw.WriteLine("        public static function crear{0}(${1}) ", clase, clase.ToLower());
                        sw.WriteLine("        { ");
                        sw.WriteLine("            $db = Db::getInstance(); ");
                        sw.WriteLine("            $insert=$db->prepare('INSERT INTO ");
                        sw.WriteLine("                                  {0} (", clase.ToLower());
                    
                    foreach (var param in parametros)
                    {
                        sw.WriteLine("                                       {0}", param);
                    }
                        sw.WriteLine("                                  )");
                        sw.WriteLine("                                  VALUES ( ");

                    foreach (var param in parametros)
                    {
                        sw.WriteLine("                                       :{0}, ", param);

                    }
                    
                        sw.WriteLine("                                       ');  // Borrar la ultima coma");
                    
                    
                    foreach (var param in parametros)
                    {
                        sw.WriteLine("            $insert->bindValue('{0}', ${1}->get{0}()); ", param, clase.ToLower());
                    
                    }
                        sw.WriteLine("            $insert->execute(); ");
                        sw.WriteLine("        } ");
                        sw.WriteLine(" ");



                    // ACTUALIZAR

                        sw.WriteLine("        public static function actualizar{0}(${1}) ", clase, clase.ToLower());
                        sw.WriteLine("        { ");
                        sw.WriteLine("            $db = Db::getInstance(); ");
                        sw.WriteLine("            $update = $db->prepare('UPDATE  ");
                        sw.WriteLine("                                    {0}  ", clase.ToLower());
                        sw.WriteLine("                                    SET  ");

                    foreach (var param in parametros)
                    {
                        sw.WriteLine("                                    {0}=:{0}, ", param);
                    }
                        sw.WriteLine("                                    WHERE  // Borrar la ultima coma");
                        sw.WriteLine("                                    {0}=:{0}'); ", parametros[0]);
                        sw.WriteLine("         ");

                    foreach (var param in parametros)
                    {
                        sw.WriteLine("            $update->bindValue('{0}', ${1}->get{0}()); ", param, clase.ToLower());
                    
                    }
                        sw.WriteLine("            $update->execute(); ");
                        sw.WriteLine("        } ");
                        sw.WriteLine(" ");
                    

                        // BUSCAR

                        sw.WriteLine("        public static function searchBy{0}($id) ", parametros[0]);
                        sw.WriteLine("        { ");
                        sw.WriteLine("            $db = Db::getInstance(); ");
                        sw.WriteLine("            $stmt = $db->prepare('  SELECT  ");
                        sw.WriteLine("                                    *  ");
                        sw.WriteLine("                                    FROM  ");
                        sw.WriteLine("                                    {0}  ", clase.ToLower());
                        sw.WriteLine("                                    WHERE  ");
                        sw.WriteLine("                                    {0} = $id'); ", parametros[0]);
                        sw.WriteLine("            $stmt->execute(); ");
                        sw.WriteLine("            $select = $stmt->fetch(); ");
                        sw.WriteLine(" ");
                        sw.WriteLine("            return new {0}(   ", clase);

                    foreach (var param in parametros)
                    {
                        sw.WriteLine("                                        $select['{0}'],  ", param);
                    }
                        sw.WriteLine("                                    ); // Borrar la ultima coma");
                        sw.WriteLine("        } ");
                        sw.WriteLine(" ");


                        // BORRAR
                        sw.WriteLine("        public static function borrar{0}($id)  ", clase);
                        sw.WriteLine("        { ");
                        sw.WriteLine("            $db = Db::getInstance(); ");
                        sw.WriteLine("            $sql = ('DELETE FROM  ");
                        sw.WriteLine("                    {0}  ", clase.ToLower());
                        sw.WriteLine("                    WHERE  ");
                        sw.WriteLine("                    {0} = $id'); ", parametros[0]);
                        sw.WriteLine("            $db->exec($sql); ");
                        sw.WriteLine("        } ");
                        sw.WriteLine(" ");

                        // CIERRA CLASE
                        sw.WriteLine("    } ");
                        sw.WriteLine("?> ");



                }	
            }
        }

        public static void controlador(string path, string clase, string[] parametros, string tipoArchivo)
        {
            string pathController = path + clase.ToLower() + "_controller" + tipoArchivo;
            
            if (!File.Exists(pathController))
            {
                using (StreamWriter sw = File.CreateText(pathController))
                {
                    sw.WriteLine("<?php ");
                    sw.WriteLine("    class {0}Controller ", clase);
                    sw.WriteLine("    { ");
                    sw.WriteLine("        public function ver{0}() ", clase);
                    sw.WriteLine("        { ");
                    sw.WriteLine("            ${0} = {1}::ver{1}(); ", clase.ToLower(), clase);
                    sw.WriteLine("            include_once ('views/{0}/ver{1}.php'); ", clase.ToLower(), clase);
                    sw.WriteLine("        } ");
                    sw.WriteLine(" ");
                    sw.WriteLine("        public function formulario{0}() ", clase);
                    sw.WriteLine("        { ");
                    sw.WriteLine("            include_once ('views/{0}/formulario{1}.php'); ", clase.ToLower(), clase);
                    sw.WriteLine("        } ");
                    sw.WriteLine(" ");
                    sw.WriteLine("        public function crear{0}() ", clase);
                    sw.WriteLine("        { ");
                    
                    posts(pathController, clase, parametros, "isset");
                    sw.WriteLine("// Aqui va if isset");
                    
                    sw.WriteLine("                return call('acceso', 'error'); ");
                    sw.WriteLine(" ");

                    posts(pathController, clase, parametros, "newObject");
                    sw.WriteLine("// Aqui va nuevo objeto");
                    
                    sw.WriteLine("            {0}::crear{0}(${1}); ", clase, clase.ToLower());
                    sw.WriteLine("            $this->ver{0}(); ", clase);
                    sw.WriteLine("        } ");
                    sw.WriteLine(" ");
                    sw.WriteLine("        public function actualizar{0}() ", clase);
                    sw.WriteLine("        { ");
                    sw.WriteLine("            $id = $_GET['id{0}']; ", clase);
                    sw.WriteLine("            ${0} = {1}::searchById{1}($id); ", clase.ToLower(), clase);
                    sw.WriteLine("            require_once('views/{0}/actualizar{1}.php'); ", clase.ToLower(), clase);
                    sw.WriteLine("        } ");
                    sw.WriteLine(" ");
                    sw.WriteLine("        public function actualizar() ");
                    sw.WriteLine("        { ");
                    
                    // posts(pathController, clase, parametros, "newObject");
                    sw.WriteLine("// Aqui va nuevo objeto");
                    
                    sw.WriteLine("            {0}::actualizar{0}(${1}); ", clase, clase.ToLower());
                    sw.WriteLine("            $this->ver{0}(); ", clase);
                    sw.WriteLine("        } ");
                    sw.WriteLine(" ");
                    sw.WriteLine("        public function borrar{0}() ", clase);
                    sw.WriteLine("        { ");
                    sw.WriteLine("            if (!isset($_GET['id{0}'])) ", clase);
                    sw.WriteLine("               return call('acceso', 'error'); ");
                    sw.WriteLine("             ");
                    sw.WriteLine("            $post = {0}::borrar{0}($_GET['id{0}']); ", clase);
                    sw.WriteLine("            $this->ver{0}(); ", clase);
                    sw.WriteLine("        } ");
                    sw.WriteLine("    } ");
                    sw.WriteLine("?> ");
                }	
            }
        }

        public static void vista(string path, string clase, string[] parametros, string tipoArchivo)
        {
            string pathView = path + "ver" + clase + tipoArchivo;
            
            if (!File.Exists(pathView))
            {
                using (StreamWriter sw = File.CreateText(pathView))
                {   
                        sw.WriteLine( "<?php require_once './views/error.php'; comprobarAcceso(); ?> ");
                        sw.WriteLine( " ");
                        sw.WriteLine( "<div class=\"table text-center\"> ");
                        sw.WriteLine( "     ");
                        sw.WriteLine( "    <table class=\"table table-striped table-light\"> ");
                        sw.WriteLine( "        <thead> ");
                        sw.WriteLine( "            <tr> ");

                    foreach (var param in parametros)
                    {
                        sw.WriteLine( "                <th>{0}</th> ", param);
                    }

                        sw.WriteLine( "            </tr> ");
                        sw.WriteLine( "        </thead> ");
                        sw.WriteLine( " ");
                        sw.WriteLine( "        <tbody> ");
                        sw.WriteLine( "            <?php foreach(${0} as $ver) {{ ?> ", clase.ToLower());
                        sw.WriteLine( "                <tr> ");
                    
                    foreach (var param in parametros)
                    {
                        sw.WriteLine( "                    <td> <?php echo $ver['{0}'] ?> </td> ", param);
                    }

                        sw.WriteLine( "            <?php } ?> ");
                        sw.WriteLine( "                </tr> ");
                        sw.WriteLine( "        </tbody> ");
                        sw.WriteLine( "    </table> ");
                        sw.WriteLine( "</div> ");
                }	
            }
        }

        public static void vistaFormulario(string path, string clase, string[] parametros, string tipoArchivo)
        {
            string pathView = path + "formulario" + clase + tipoArchivo;
            
            if (!File.Exists(pathView))
            {
                using (StreamWriter sw = File.CreateText(pathView))
                {   
                    sw.WriteLine("<?php require_once './views/error.php'; comprobarAcceso(); ?>");
                    sw.WriteLine("");
                    sw.WriteLine("<div class=\"container\">");
                    sw.WriteLine("    <div class=\"row\">");
                    sw.WriteLine("        <div class=\"col-sm-6\">");
                    sw.WriteLine("");
                    sw.WriteLine("            <h2> Ingresar {0}</h2>", clase);
                    sw.WriteLine("            <br>");
                    sw.WriteLine("");
                    sw.WriteLine("            <form action=\"?controller={0}&&action=crear{1}\" method=\"POST\">", clase.ToLower(), clase);
                    sw.WriteLine("");

                    foreach (var param in parametros)
                    {
                        sw.WriteLine("                <div class=\"form-group row\">");
                        sw.WriteLine("                    <label class=\"col-3 col-form-label\" for=\"{0}\"> {0} </label>", param);
                        sw.WriteLine("                    <div class=\"col-9\">");
                        sw.WriteLine("                        <input class=\"form-control form-control-sm\" type=\"text\" name=\"{0}\" id=\"{0}\" placeholder=\"{0}\" required>", param);
                        sw.WriteLine("                    </div>");
                        sw.WriteLine("                </div>");
                        sw.WriteLine("");
                    }

                    sw.WriteLine("                <button type=\"submit\" class=\"btn btn-primary btn-block\"> Ingresar datos </button>");
                    sw.WriteLine("                <br><br>");
                    sw.WriteLine("");
                    sw.WriteLine("            </form>");
                    sw.WriteLine("        </div>");
                    sw.WriteLine("    </div>");
                    sw.WriteLine("</div>");
                }
            }
        }

        public static void routes(string clase)
        {
            Console.WriteLine("case '{0}':", clase.ToLower());
            Console.WriteLine("     include_once ('models/{0}.php');", clase.ToLower());
            Console.WriteLine("     $controller = new {0}Controller();", clase.ToLower());
            Console.WriteLine("break;");
            Console.WriteLine("'{0}' => ['ver{1}', 'crear{1}', 'actualizar{1}', 'actualizar', 'formulario{1}'],", clase.ToLower(), clase );
        }

        public static void posts(string path, string clase, string[] parametros, string tipo)
        {
                if(tipo == "isset")
                {
                    Console.WriteLine("ISSET:");
                    Console.WriteLine("            if (!isset( ");
                    foreach (var param in parametros)
                        {
                            Console.WriteLine("                       $_POST['{0}'], ", param);
                        }
                    Console.WriteLine("                      )) // Borrar la ultima coma del $_POST ");
                }
                
                if(tipo == "newObject")
                {
                    Console.WriteLine("NEW OBJECT:");
                    Console.WriteLine("            ${0} = new {1}(",clase.ToLower(), clase); 
                    foreach (var param in parametros)
                        {
                            Console.WriteLine("                              $_POST['{0}'], ", param); 
                        }
                    Console.WriteLine("            ); // Borrar la ultima coma del $_POST"); 
                }
        }
    }
}