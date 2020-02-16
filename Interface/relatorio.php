<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INTERFACE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    
    <section>
 
    <img src="https://4.bp.blogspot.com/-m1WwbPYUV0U/VdHSD1q6fFI/AAAAAAAACCw/esmMxWGi58g/s1600/prodeb.jpg" alt="prodeb" width="100px" heigth="100px">
                
      
 
        
                        <?php 
                        $host = "localhost";
                        $usuario = "root";
                        $senha = "";
                        $bd = "controle";
                        $mysqli = new mysqli($host, $usuario, $senha, $bd);
                        $consulta = "select * from interface LIMIT 10";
                        
                        $con = $mysqli->query($consulta) or die($mysqli->error);
                        ?>
                           <table class="table table-striped">
                           <thead class="thead-dark">
                                <tr>
                                    <th>Codigo</th>
                                    <th>Tipo</th>
                                    <th>Horario</th>
                                </tr>
                            </thead>
                        <?php
                        while ($dado = $con->fetch_array()) { ?>
                            

                                <tr>
                                <td><?php echo $dado["codigo"]; ?></td>
                                <td><?php echo $dado["tipo"]; ?></td>
                                <td><?php echo $dado["horas"]; ?></td>
                                </tr>
                            
                        <?php }
                        ?>
                        </table>
        
    </section>
    <footer>
        <h2>&copy; Prodeb</h2>
    </footer>
</body>
</html>

